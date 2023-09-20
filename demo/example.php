<?php
/**
 * Copyright (c) 2019. ReddingWebPro / Jason J. Olson, This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software Foundation version 3
 * of the License.
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License
 * for more details. You should have received a copy of the GNU General Public License along with this program.  If not,
 * see <https://www.gnu.org/licenses/>.
 */

/**
 * Created by ReddingWebPro/ReddingWebDev
 * User: Jason J. Olson
 * License: GNU GPLv3
 * GitHub: https://github.com/reddingwebpro/usps_address_validation
 * Version 2.0
 * Date: 3/6/2019 (rev. 9/19/23)
 *
 */

// example code shown below:

require('src/usps_zipcode.php');

$uspsZip = new RedWebDev\uspszipcode('Consumer Key','Consumer Secret');  // insert your api key from USPS

$address = '1600 Amphitheatre Parkway'; // address line is required
$city = 'Mountain View';
$state = 'CA';  //looking for the two character state

$zipcode = $uspsZip->getZipCode($address, $city, $state);

echo "Zip Code: " . $zipcode;
