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
    private $circ_info = [];
    private $status;

    function __construct(array $request = []) {
        print "In BaseClass constructor\n";
    }
    public function create() {

       $oclc_config = config('oclc.connections.development');
       $key = $oclc_config['api_key'];
       $secret = $oclc_config['api_secret'];
       $wskey = new WSKey($key, $secret);
       $url = 'https://worldcat.org/bib/data/823520553?classificationScheme=LibraryOfCongress&holdingLibraryCode=MAIN';
       $user = new User($oclc_config['institution_id'], 'principalID', 'urn:oclc:platform:262516');
       $options = array('user'=> $user);
       $authorizationHeader = $wskey->getHMACSignature('GET', $url, $options);
    
    }
    public function generateBarcode() {

    }
}


