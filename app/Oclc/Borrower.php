<?php
namespace App\Oclc;
use OCLC\Auth\WSKey;
use OCLC\Auth\AccessToken;
use OCLC\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Borrower {
    /**
     * The invalid field.
     *
     * @var string
     */
    private $givenName;
    private $familyName;
    private $email;
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
	   print "In BaseClass constructor\n";
	   // Set the variables

	   $this->givenName = $request['fname'];
	   $this->familyName = $request['lname'];
	   $this->email = $request['email'];
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


      $url = 'https://worldcat.org/bib/data/823520553?classificationScheme=LibraryOfCongress&holdingLibraryCode=MAIN';
      $url = 'https://' . $this->institutionId . $this->serviceUrl . '/Users/';
      //$url = 'https://torontotest'. $this->serviceUrl . '/Users/';
      $this->getAuth($url);

      // Send the request to create a record
      $this->sendRequest($url, $this->getData());

    
    }
    public function setPassword() {
    
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
			'givenName' => $this->givenName,
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
	    //$json =  json_encode($payload);
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
	    die();
    	
    }

    public function search() {
    
    }

    private function addAddress($request) {
	if (isset($request['postal_code'])) {
	       $this->addresses[] = [
		"streetAddress" => $request['streetAddress1'], 
		"locality" => $request['locality'], 
		"region" => $request['region'],
		"postalCode" => $request['postal_code'],
		"type" => "",
		"primary" => false
	       ];
	} 
    }
    private function getEmail() {
    
    }
    private function getOclcPPID() {
    
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
		'familyName' => $this->familyName,
		'givenName' => $this->givenName,
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

