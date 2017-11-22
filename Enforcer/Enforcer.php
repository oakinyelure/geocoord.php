<?php
/**
 * Created by PhpStorm.
 * User: Michael Akinyelure
 * Date: 11/22/2017
 * Time: 9:25 AM
 */


namespace Enforcer;

require_once("Enforcer/Interfaces/IEnforcer.php");

class Enforcer implements IEnforcer
{
    private $address;

    public function __construct($address) {

        if(!$address) {

            throw new \InvalidArgumentException("Expected an address");
        }
        $this->address = $address;
    }

    /*
     * Check if address meets standard address requirement. Address requirement in this scope would be Address, city, state zipcode
     */
    public function enforceAddressStandard() {

        $separatedAddress = explode(',',$this->address);

        if(count($separatedAddress) < 3) {

            return false;

        }
        else {

            $stateAndZipcodeValue = explode(' ',$separatedAddress[count($separatedAddress) - 1]);

            return count($stateAndZipcodeValue) < 3 || count($stateAndZipcodeValue) > 3 ? false : true;
        }
    }





}