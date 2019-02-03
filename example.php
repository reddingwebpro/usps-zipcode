<?php
/**
 * Created by PhpStorm.
 * User: reddingWebPro
 * Date: 1/23/2019
 * Revised: 2/3/2019
 * Version 1.1
 * Time: 7:05 PM
 */

// example code shown below:

require ('USPS.php');

use RedWebDev\USPS;

$uspsZip = new USPS('YOUR_API_KEY_HERE');  // insert your api key from USPS

$address = '1600 Amphitheatre Parkway'; // address line is required
$city  = 'Mountain View';
$state = 'CA';  //looking for the two character state

echo "Zip: ".$uspsZip->getZipCode($address,$city,$state);
