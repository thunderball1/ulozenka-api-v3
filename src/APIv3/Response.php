<?php

namespace Ulozenka\APIv3;

/**
 * Description of Response
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Response {

    private $header;
    private $errors;
    private $httpCode;
    private $code;
    private $links;
    private $jsonBody;

    public function __construct() {
        $this->errors = array();
    }

    public function addError(Error $error) {
        $this->errors[] = $error;
    }

    public function isError() {
        if (empty($this->errors)) {
            return false;
        } else {
            return true;
        }
    }

    public function getData() {
        $body = json_decode($this->jsonBody, true);
        return $body['data'];
    }

    function getErrors() {
        return $this->errors;
    }

    function setErrors($errors) {
        $this->errors = $errors;
    }

    function getHeader() {
        return $this->header;
    }

    function getHttpCode() {
        return $this->httpCode;
    }

    function getCode() {
        return $this->code;
    }

    function getJsonBody() {
        return $this->jsonBody;
    }

    function getBody() {
        return $this->body;
    }

    function setHeader($header) {
        $this->header = $header;
    }

    function setHttpCode($httpCode) {
        $this->httpCode = $httpCode;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setJsonBody($jsonBody) {
        $this->jsonBody = $jsonBody;
    }

    function setBody($body) {
        $this->body = $body;
    }

}
