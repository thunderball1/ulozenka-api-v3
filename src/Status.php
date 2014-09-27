<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ulozenka\APIv3;

/**
 * Description of Status
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Status {

    /** @var integer */
    private $id;

    /** @var string */
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

}
