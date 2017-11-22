<?php
/**
 * Created by PhpStorm.
 * User: Michael Akinyelure
 * Date: 11/22/2017
 * Time: 9:07 AM
 */

class GeoCoord {

    private $googleUrl;
    private $address;
    private $addressStandard;

    public function __construct($address) {

        if(!$address) {

            throw new InvalidArgumentException("Expected an address.");
        }
        else {

            $verifyAddress = new \Enforcer\Enforcer($address);

            if($verifyAddress->enforceAddressStandard()) {

                $this->address = $address;
            }

            $this->googleUrl =  "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
        }

    }


    public function setLatitude() {

    }

    public function getLatitude() {

    }

    public function setLongitude() {

    }

    public function getLongitude() {

    }

    public function getLatitudeAndLongitude() {

    }

    private function processAddress($address) {


    }

}