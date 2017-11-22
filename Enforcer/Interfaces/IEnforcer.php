<?php
/**
 * Created by PhpStorm.
 * User: Michael Akinyelure
 * Date: 11/22/2017
 * Time: 9:22 AM
 */

namespace Enforcer;


interface IEnforcer
{

    // Interface enforces address standard. Standard is address, city, statecode and zipcode

    public function enforceAddressStandard();

}