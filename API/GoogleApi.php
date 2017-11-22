<?php
/**
 * Created by PhpStorm.
 * User: Michael Akinyelure
 * Date: 11/22/2017
 * Time: 10:40 AM
 */

namespace API;

require_once("API/Interface/IApi.php");

class GoogleApi implements IApi
{
    private $googleAddress;
    private $processedData;
    private $latitude;
    private $longitude;

    public function __construct($address) {

        $address = str_ireplace(' ','+',$address);

        $this->googleAddress = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";

        $httpResponse = @file_get_contents($this->googleAddress);

        $this->processedData = json_decode($httpResponse);

        $this->processResponse();
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function getLatitude() {

        return $this->latitude;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    public function getLongitude() {

        return $this->longitude;
    }

    public function checkURLStatus() {

        return $this->processedData->status == "OK" ? true : false;
    }

    private function processResponse() {

        if($this->checkURLStatus()) {

            $this->setLatitude($this->processedData->results[0]->geometry->location->lat);
            $this->setLongitude($this->processedData->results[0]->geometry->location->lng);
        }
    }
}