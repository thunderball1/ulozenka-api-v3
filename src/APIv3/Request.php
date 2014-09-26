<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ulozenka\APIv3;

/**
 * Description of Request
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Request {

    /** @var integer */
    private $id;

    /** @var string */
    private $resource;

    /** @var string */
    private $type;

    /** @var string */
    private $apiUrl;

    /** @var string */
    private $apiKey;

    /** @var integer */
    private $shopId;

    /** @var array */
    private $data;

    /** @var array */
    private $queryParams;

    const CONSIGNMENT_RESOURCE = 'consignments';

    public function __construct($apiUrl, $shopId = null, $apiKey = null) {
        $this->apiUrl = $apiUrl;
        $this->shopId = $shopId;
        $this->apiKey = $apiKey;
    }

    public function getResponse() {
        $headers = array(
            'X-Shop: ' . $this->shopId,
            'X-Key: ' . $this->apiKey,
        );
        $content = json_encode($this->data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl . '/' . $this->resource . $this->getQueryString());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->type);
        if ($this->type === 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        }
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $jsonBody = substr($response, $header_size);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        $response = new Response();
        if ($error) {
            $response->addError(new Error($code, $error));
            return $response;
        }
        if (!preg_match("/2../", $code)) {
            $body = json_decode($jsonBody, true);
            if (isset($body['errors'])) {
                foreach ($body['errors'] as $error) {
                    $response->addError(new Error($error['code'], $error['description']));
                }
                return $response;
            } else {
                $response->addError(new Error($code, 'Unknown error.'));
                return $response;
            }
        }
        $response->setHttpCode($code);
        $response->setHeader($header);
        $response->setJsonBody($jsonBody);
        return $response;
    }

    function setResource($resource) {
        $this->resource = $resource;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    function setShopId($shopId) {
        $this->shopId = $shopId;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setQueryParams($queryParams) {
        $this->queryParams = $queryParams;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setApiUrl($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    private function getIdString() {
        if (isset($this->id)) {
            return "/" . $this->id;
        } else {
            return "";
        }
    }

    private function getQueryString() {
        return "";
    }

}
