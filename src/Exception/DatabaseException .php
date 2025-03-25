<?php
namespace LongchengjqSdk\Exception;

class DatabaseException extends UnifiedException
{
    public function __construct($message, $errorCode = 500, $details = [])
    {
        parent::__construct($message, $errorCode, $details);
    }
    
}