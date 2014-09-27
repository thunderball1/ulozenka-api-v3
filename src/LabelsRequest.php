<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ulozenka\APIv3;

/**
 * Description of LabelsRequest
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class LabelsRequest {

    /** @var string */
    private $type;

    /** @var integer */
    private $firstPosition;

    /** @var integer */
    private $labelsPerPage;

    /** @var array */
    private $consignmentIds;

    public function __construct() {
        
    }

    function getType() {
        return $this->type;
    }

    function getFirstPosition() {
        return $this->firstPosition;
    }

    function getLabelsPerPage() {
        return $this->labelsPerPage;
    }

    function getConsignmentIds() {
        return $this->consignmentIds;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setFirstPosition($firstPosition) {
        $this->firstPosition = $firstPosition;
    }

    function setLabelsPerPage($labelsPerPage) {
        $this->labelsPerPage = $labelsPerPage;
    }

    function setConsignmentIds($consignmentIds) {
        $this->consignmentIds = $consignmentIds;
    }

}
