<?php

/**
 * Created by PhpStorm.
 * User: reddingWebPro
 * Date: 1/23/2019
 * Time: 7:05 PM
 */
class USPS
{
    private $userid = NULL;  // set this to the api key from USPS.com

    public function getZipCode($data)
    {
        $userid = $this->userid;
        $line1 = $data['line1'];
        $city = $data['city'];
        $state = $data['state'];
        $input_xml = "<ZipCodeLookupRequest USERID=\"$userid\"><Address ID= \"0\"><Address1>$line1</Address1><City>$city</City><State>$state</State></Address></ZipCodeLookupRequest>";
        $fields = array(
            'API' => 'ZipCodeLookup',
            'XML' => $input_xml
        );
        $url = 'https://secure.shippingapis.com/ShippingAPI.dll?' . http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = json_decode(json_encode(simplexml_load_string($data)), true);
        return $array_data['Address']['Zip5'];
    }
}


// example code shown below:

$uspsZip = new USPS();

$data = array(
    "line1" => '1600 Amphitheatre Parkway', // address line is required
    "city" => 'Mountain View',
    "state" => 'CA'  //looking for the two character state
);

echo $uspsZip->getZipCode($data);
