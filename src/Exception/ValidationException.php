<?php
namespace LongchengjqSdk\Exception;

/**
 * 验证异常类
 */
class ValidationException extends UnifiedException
{
    public function __construct($message, $details = [])
    {
        parent::__construct($message, 422, $details);
    }

}