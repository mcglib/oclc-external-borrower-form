<?php
namespace App\Oclc;
use OCLC\Auth\WSKey;
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
    private $circ_info = [];
    private $status;
    private $service_url = '.share.worldcat.org/idaas/scim/v2';

    function __construct(array $request = []) {
	   print "In BaseClass constructor\n";
	   // Set the variables

	   $this->givenName = $request['fname'];
	   $this->familyName = $request['lname'];
	   $this->email = $request['email'];
	   // generate a barcode
	   $this->barcode = $this->generateBarCode();
	   // set the circulation data
	   $this->circ_info = $this->getCircInfo($request);
    }
    public function create() {

       $oclc_config = config('oclc.connections.development');
       $key = $oclc_config['api_key'];
       $secret = $oclc_config['api_secret'];
       $wskey = new WSKey($key, $secret);
       $url = 'https://worldcat.org/bib/data/823520553?classificationScheme=LibraryOfCongress&holdingLibraryCode=MAIN';
       $user = new User($oclc_config['institution_id'], $oclc_config['ppid'], $oclc_config['pdns']);
       $options = array('user'=> $user);
       $authorizationHeader = $wskey->getHMACSignature('GET', $url, $options);
       dd($authorizationHeader);
       //
    
    }

    private function addAddress() {
    }
    private function getEmail() {
    
    }
    private function getOclcPPID() {
    
    }


    public function generateBarcode() {
	    return  "ext_" . uniqid();

    }
    public function getCircInfo($request) {
    
    }

}


