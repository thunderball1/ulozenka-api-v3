<?php

namespace Ulozenka\APIv3;

/**
 * Description of Error
 *
 * @author Petr Vácha <petr.vacha@thunderweb.cz>
 */
class Error {

    private $code;
    private $message;

    public function __construct($code, $message) {
        $this->code = $code;
        $this->message = $message;
    }

    function getCode() {
        return $this->code;
    }

    function getMessage() {
        return $this->message;
    }

}
