<?php
namespace LongchengjqSdk\Http;

use LongchengjqSdk\Exception\ValidationException;

class ApiIdent 
{
    // 请求地址
    const API_URL = 'https://help-platform.lastbs.com/';

    /**
     * 验证身份
     */
    public function checkUser($apiKey, $apiSecret)
    {
        if (empty($apiKey)) {
            throw new ValidationException('apiKey not is empty');
        }

        if (empty($apiSecret)) {
            throw new ValidationException('apiSecret not is empty');
        }

        $data = [
            'apiKey' => $apiKey,
            'apiSecret' => $apiSecret
        ];

        $result = $this->request_curl(self::API_URL.'sdk/checkUser/checkUser', $data, 'POST');
        if (empty($result)) {
            throw new ValidationException('request error');
        }
        if ($result['code'] != 200) {
            throw new ValidationException($result['msg']);
        }

        return true;
    }


     /**
     * 网络请求
     * author: YJZ <1315670322@qq.com>
     * modifier:
     * tips:
     * @param string $method
     * @param $url
     * @param $data
     */
    public function request_curl($url, $data = '', $method = 'GET', $header = [])
    {
        //curl 调用
        $headers = array(
            'Content-Type: application/json'
        );
        $curl = curl_init();
        if ($method == 'GET') {

            if ($data) {
                $url .= '?' . $data;
            }
        } else {
            // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
        if (!empty($header)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }

        if (!is_array($data)) {
            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    'X-AjaxPro-Method:ShowList',
                    'Content-Type: application/json; charset=utf-8',
                    'Content-Length: ' . strlen($data)
                )
            );
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);

            // 处理请求错误
            return [
                'code' => -1,
                'msg' => $error
            ];
        }

        $resultArr = json_decode($response, true);

        curl_close($curl);
        return $resultArr;
    }
}