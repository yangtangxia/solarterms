<?php
namespace LongchengjqSdk\Exception;

// 定义一个统一的异常类
class UnifiedException extends \Exception
{
    // 错误代码
    protected $errorCode;

    // 错误的详细信息，可以是其他数据或上下文
    protected $details;

    public function __construct($message, $errorCode = 0, $details = [])
    {
        // 调用父类构造方法
        parent::__construct($message);
        // 设置自定义错误码
        $this->errorCode = $errorCode;

        // 设置详细信息
        $this->details = $details;
        // 可以在这里集成日志记录功能
        $this->logError();
    }

    public static function create($message, $errorCode = 400, $details = [])
    {
        return new self($message, $errorCode, $details);
    }


    // 获取错误代码
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    // 获取错误的详细信息
    public function getDetails()
    {
        return $this->details;
    }
    // 错误日志记录方法，可以根据需要集成日志库
    private function logError()
    {
        // 这里可以使用 Monolog 或 PHP 自带的 error_log 函数进行日志记录
        // 简单记录到文件示例：
        $logMessage = sprintf(
            "[%s] Error Code: %d, Message: %s, Details: %s\n",
            date("Y-m-d H:i:s"),
            $this->errorCode,
            $this->message,
            json_encode($this->details)
        );
        file_put_contents('error_log.txt', $logMessage, FILE_APPEND);
    }

}