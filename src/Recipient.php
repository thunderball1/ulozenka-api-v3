<?php

namespace Ulozenka\APIv3;

/**
 * Description of Recipient
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Recipient {

    private $name;
    private $surname;
    private $street;
    private $town;
    private $phone;
    private $email;
    private $country;
    private $company;
    private $zip;

    public function __construct() {
        
    }

    function getCompany() {
        return $this->company;
    }

    function getZip() {
        return $this->zip;
    }

    function setCompany($company) {
        $this->company = $company;
    }

    function setZip($zip) {
        $this->zip = $zip;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getStreet() {
        return $this->street;
    }

    function getTown() {
        return $this->town;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getCountry() {
        return $this->country;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setTown($town) {
        $this->town = $town;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCountry($country) {
        $this->country = $country;
    }

}
