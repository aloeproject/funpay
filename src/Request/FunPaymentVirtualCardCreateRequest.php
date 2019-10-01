<?php
/**
 * 获取银行列表
 * Created by PhpStorm.
 * User: pengcheng
 * Date: 2019/9/28
 * Time: 0:38
 */

namespace Wuzhou\Funpay\Request;


use Wuzhou\Funpay\Contracts\Payment;
use Wuzhou\Funpay\Contracts\Request;
use Wuzhou\Funpay\Lib\ReturnData;

class FunPaymentVirtualCardCreateRequest extends BaseRequest
{

    public function getApiUrl()
    {
        return "https://payment.funpay.asia/fun/payment/virtualCard/create";
    }

    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function setApiParas($apiParas)
    {
        $this->apiParas = $apiParas;
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    protected function setPrivateParams()
    {
        // TODO: Implement setPrivateParams() method.
    }
}