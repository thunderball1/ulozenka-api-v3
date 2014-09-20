<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ulozenka\APIv3;

/**
 * Description of Api
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Api {

    private $shopId;
    private $apiKey;

    public function __construct($shopId, $apiKey) {
        $this->shopId = $shopId;
        $this->apiKey = $apiKey;
    }

    public function createConsignmentRequest() {
        $consignmentRequest = new ConsignmentRequest($this->shopId, $this->apiKey);
        return $consignmentRequest;
    }

}
