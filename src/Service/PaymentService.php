<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 14:10
 */

namespace Wuzhou\Funpay\Service;


use Wuzhou\Funpay\Contracts\Payment;
use Wuzhou\Funpay\Contracts\Request;
use Wuzhou\Funpay\Lib\Curl;
use Wuzhou\Funpay\Lib\ReturnData;
use Wuzhou\Funpay\Lib\Sign;

class PaymentService implements Payment
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * 发起付款
     * @param int $amount
     * @param string $orderNo
     * @param array $accountInfoArr
     * @return ReturnData
     */
    public function execute($amount, $orderNo, $accountInfoArr): ReturnData
    {
        //已经加入签名的参数
        $signedParams = Sign::md5_sign($this->request->getApiParas(), $this->request->getSecretKey());

        $curl = Curl::instance($this->request->getApiUrl());

        $ret = $curl->postJson(json_encode($signedParams));


        if ($ret) {
            return json_decode($ret, true);
        } else {
            return false;
        }
    }

    /**
     * 通知认证
     * @return mixed
     */
    public function notifyVerification()
    {
        // TODO: Implement notifyVerification() method.
    }
}