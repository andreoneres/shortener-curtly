<?php

namespace App\Utils;
use App\Utils\AppException;

class ValidationException extends AppException {

    private $error = "";

    public function __construct($error = "",
        $code = 0, $previous = null) {
        parent::__construct($error, $code, $previous);
        $this->error = $error;
    }

    public function getErrors() {
        return $this->error;
    }

    public function get($att) {
        return $this->error[$att];
    }
}