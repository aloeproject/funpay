<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 14:04
 */

namespace Wuzhou\Funpay\Service;


use Wuzhou\Funpay\Constants\Code;
use Wuzhou\Funpay\Contracts\Payment;
use Wuzhou\Funpay\Contracts\Repayment;
use Wuzhou\Funpay\Contracts\Request;
use Wuzhou\Funpay\Lib\ReturnData;
use Wuzhou\Funpay\Lib\Sign;
use Wuzhou\Funpay\Lib\Curl;

//提供付款还款功能
class FunpayFactory
{


    public $merchantID;

    public $businessID;

    //私钥文件路径
    public $secretKey;


    /**
     * 发起付款
     * @param int $amount
     * @param string $orderNo
     * @param array $accountInfoArr
     * @param Payment $payment
     * @return ReturnData
     *
     */
    /*public static function payment($amount, $orderNo, $accountInfoArr, Payment $payment): ReturnData
    {
        return $payment->execute($amount, $orderNo, $accountInfoArr);
    }*/

    /**
     * 发起还款
     * @param Repayment $repayment
     * @return ReturnData
     */
    /*public static function repayment(Repayment $repayment): ReturnData
    {
        return $repayment->execute();
    }*/


    public function execute($request)
    {


        //组装系统参数
        $sysParams["merchantID"] = $this->merchantID;
        $sysParams["businessID"] = $this->businessID;
        $sysParams["timestamp"] = time();
        $sysParams["version"] = "1.3";


        //获取业务参数
        $apiParams = $request->getApiParas();


        //已经加入签名的参数
        $signedParams = Sign::md5_sign(array_merge($apiParams, $sysParams), $this->secretKey);

        $curl = Curl::instance($request->getApiUrl());

        $ret = $curl->postJson(json_encode($signedParams));
        if ($ret) {
            return json_decode($ret, true);
        } else {
            return false;
        }
    }

    public static function execute1(Request $request)
    {
        //已经加入签名的参数
        $signedParams = Sign::md5_sign($request->getApiParas(), $request->getSecretKey());

        $curl = Curl::instance($request->getApiUrl());

        $ret = $curl->postJson(json_encode($signedParams));


        $retArr['code'] = Code::SUCCESS_CODE;
        $retArr['msg'] = '';
        $retArr['data'] = [];

        if (empty($ret)) {
            $retArr['code'] = Code::SYSTEM_ERROR;
            return $ret;
        }

        $retArr['data'] = $ret;
        return $retArr;
    }
}