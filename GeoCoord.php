<?php
/**
 * Created by PhpStorm.
 * User: Michael Akinyelure
 * Date: 11/22/2017
 * Time: 9:07 AM
 */

class GeoCoord {

    private $address;
    private $apiInstance;

    public function __construct($address) {

        if(!$address) {

            throw new InvalidArgumentException("Expected an address.");

        }
        else {

            $verifyAddress = new \Enforcer\Enforcer($address);

            if($verifyAddress->enforceAddressStandard()) {

                $this->address = $address;
            }

            $this->apiInstance = new \API\GoogleApi($this->address);
        }

    }

    public function requestLatitude() {

        return $this->apiInstance->getLatitude();
    }

    public function requestLongitude() {
        return $this->apiInstance->getLongitude();
    }

}