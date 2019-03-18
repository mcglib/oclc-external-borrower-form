<?php
namespace App\Oclc;
use OCLC\Auth\WSKey;
use OCLC\Auth\AccessToken;
use OCLC\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Yaml;

class Borrower {
    /**
     * The invalid field.
     *
     * @var string
     */
    public $fname;
    public $lname;
    public $data = [];
    public $email;
    public $telephone_no;
    public $borrower_cat;
    public $city;
    public $address1;
    public $home_institution;
    public $address2;
    public $postal_code, $spouse_name;
	    
 

    private $id;
    private $barcode;
    private $circInfo = [];
    private $defaultType = 'home';
    private $status;
    private $serviceUrl = '.share.worldcat.org/idaas/scim/v2';
    private $authorizationHeader;
    
    private $eTag;
    private $borrowerCategory = 'McGill community borrower';
    private $homeBranch = 262754; // Maybe 262754
    private $institutionId;

    function __construct(array $request = []) {
	   // Set the variables
	    $this->data = $request;
	   
	   $this->fname = $request['fname'];
	   $this->lname = $request['lname'];
	   $this->email = $request['email'];
	   $this->borrower_cat = $request['borrower_cat'];
	   $this->telephone_no = $request['telephone_no'] ?? null;
	   $this->spouse_name = $request['spouse_name'] ?? null;
	   $this->home_institution = $request['home_institution'] ?? null;
	   $this->city = $request['city'] ?? null;
	   $this->address1 = $request['address1'] ?? null;
	   $this->address2 = $request['address2'] ?? null;
	   $this->postal_code = $request['postal_code'] ?? null;
	   
	   // generate a barcode
	   $this->barcode = $this->generateBarCode();
	   
	   // set the circulation data
	   $this->circInfo = $this->getCircInfo($request);

       	   $oclc_config = config('oclc.connections.development');
	   
	   $this->institutionId = $oclc_config['institution_id'];
	   
	   // set the addressif any
	   $this->addAddress($request);
    }
    public function create() {


      $url = 'https://' . $this->institutionId . $this->serviceUrl . '/Users/';
      $this->getAuth($url);

      // Send the request to create a record
      return $this->sendRequest($url, $this->getData());

      
    
    }

    public function getAuth($url) {
       $oclc_config = config('oclc.connections.development');
       $key = $oclc_config['api_key'];
       $secret = $oclc_config['api_secret'];
       $inst_id = $oclc_config['institution_id'];

       $services = array('SCIM');

       $user = new User($inst_id, $oclc_config['ppid'], $oclc_config['pdns']);

       $options = array('services' => $services);
       $wskey = new WSKey($key, $secret, $options);
       // provide the WSKEY
       $accessToken = $wskey->getAccessTokenWithClientCredentials($inst_id, $inst_id, $user);


       $this->setAuth($accessToken);

    }

    private function setAuth($token) {
    	$this->authorizationHeader = "Bearer ".$token->getValue();
    }

    private function sendRequest($url, $payload) {
	    $client = new Client(
            [
	           'curl' => []
	    ]);
	    $headers = array();
	    $headers['Authorization'] = $this->authorizationHeader;
	    $headers['User-Agent'] = 'McGill OCLC Client';
	    $headers['Content-Type'] = 'application/scim+json';
	    $payload = array (
		   'schemas' => array (
			 0 => 'urn:ietf:params:scim:schemas:core:2.0:User',
			 1 => 'urn:mace:oclc.org:eidm:schema:persona:correlationinfo:20180101',
			 2 => 'urn:mace:oclc.org:eidm:schema:persona:persona:20180305',
			 3 => 'urn:mace:oclc.org:eidm:schema:persona:wmscircpatroninfo:20180101',
			 4 => 'urn:mace:oclc.org:eidm:schema:persona:wsillinfo:20180101',
			 5 => 'urn:mace:oclc.org:eidm:schema:persona:additionalinfo:20180501'
		    ),
	  	   'name' => array (
			'familyName' => $this->familyName,
			'fname' => $this->fname,
			'middleName' => '',
			'honorificPrefix' => '',
			'honorificSuffix' => '',
		    ),
		    'addresses' => $this->getAddresses(),
	  	    'emails' => array (
			0 =>  array (
				'value' => $this->email,
				'type' => $this->defaultType,
				'primary' => true,
			),
	  	    ),
	  	    'urn:mace:oclc.org:eidm:schema:persona:wmscircpatroninfo:20180101' =>  array (
	    		'circulationInfo' => $this->getCircInfo()
          	    ),
	  	    'urn:mace:oclc.org:eidm:schema:persona:persona:20180305' =>  array (
			    'institutionId' => $this->institutionId,
	  	     ),
	    );
	    $body = ['headers' => $headers,
		     'json' => $payload
	     ];
            try {
	          $response = $client->request('POST', $url, $body);
	          echo $response->getBody(TRUE);
		  var_dump((string) $response->getBody(TRUE));die();
	    } catch (RequestException $error) {
		    $error->getResponse()->getStatusCode();
		    var_dump((string)$error->getResponse()->getBody());die();
	    }
    	
    }

    public function search() {
    
    }
    public function getBorrowerCategoryName($borrow_cat) {
	 $data = Yaml::parse(file_get_contents(base_path().'/borrowing_categories.yml'));
	 $label = $data['categories'];
	 $key = array_search($borrow_cat, array_column($data['categories'], 'key'));
	 return $data['categories'][$key]['label'];
    	
    }
    

    private function addAddress($request) {
	    if (isset($request['postal_code'])) {
	       $locality = isset($request['address2']) ? $request['address2'] : "";
	       $this->addresses[] = [
		"streetAddress" => $request['address1'], 
		"region" => $request['city'],
		"locality" => $locality,
		"postalCode" => $request['postal_code'],
		"type" => "",
		"primary" => false
	       ];
	    }
	     
    }

    //**** Accessors ***//
    public function getFNameAttribute() {
    	return $this->fname;
    }
    public function getRequestAttribute() {
    	return $this->request;
    }
    public function getEmailAttribute() {
    	return $this->email;
    }
    public function getTelephoneNoAttribute() {
    	return $this->telephone_no;
    }
    public function getLNameAttribute() {
    	return $this->lname;
    }

    public function generateBarcode() {
	    return  "EXT-".uniqid(15);

    }
    private function getAddresses() {
	    return array(
		    0 => array (
		       'streetAddress' => 'asdasd',
		       'locality' => 'asdasd',
	     	       'region' => 'asdasd',
	               'postalCode' => 'asdasd',
	               'type' => $this->defaultType,
		       'primary' => false
	           )
	   );

    }
    private function getCircInfo() {
        return array (
			'barcode' => $this->barcode,
			'borrowerCategory' => $this->borrowerCategory,
			'homeBranch' => $this->homeBranch,
			'isVerified' => false,
	);
    
    }

    private function getData() {
	$data = array (
	  'schemas' => array (
		 0 => 'urn:ietf:params:scim:schemas:core:2.0:User',
		 1 => 'urn:mace:oclc.org:eidm:schema:persona:correlationinfo:20180101',
		 2 => 'urn:mace:oclc.org:eidm:schema:persona:persona:20180305',
		 3 => 'urn:mace:oclc.org:eidm:schema:persona:wmscircpatroninfo:20180101',
		 4 => 'urn:mace:oclc.org:eidm:schema:persona:wsillinfo:20180101',
		 5 => 'urn:mace:oclc.org:eidm:schema:persona:additionalinfo:20180501'
	  ),
	  'name' => array (
		'familyName' => $this->lname,
		'givenName' => $this->fname,
		'middleName' => '',
		'honorificPrefix' => '',
		'honorificSuffix' => '',
	  ),
	  'emails' => array (
		0 =>  array (
			'value' => $this->email,
			'type' => $this->defaultType,
			'primary' => true,
		),
	  ),
	  'addresses' => array (
		0 => array (
		      'streetAddress' => 'asdasd',
		      'locality' => 'asdasd',
		      'region' => 'asdasd',
		      'postalCode' => 'asdasd',
		      'type' => 'home',
		      'primary' => false,
		),
	  ),
	  'urn:mace:oclc.org:eidm:schema:persona:wmscircpatroninfo:20180101' =>  array (
	    'circulationInfo' =>   array (
	      'barcode' => $this->barcode,
	      'borrowerCategory' => $this->borrowerCategory,
	      'homeBranch' => $this->homeBranch,
	      'isVerified' => false,
	      "isCircBlocked" =>  true,
              "isCollectionExempt" =>  false,
              "isFineExempt" => false,
	    ),
          ),
	  'urn:mace:oclc.org:eidm:schema:persona:persona:20180305' =>  array (
	    'institutionId' => $this->institutionId,
	  ),
	  'urn:mace:oclc.org:eidm:schema:persona:correlationinfo:20180101' => array(
	    'correlationInfo' => array (
	       "sourceSystem" => "",
	       "idAtSource" => ""
	    ),
	  ),
	);
	return $data;
    }

}


