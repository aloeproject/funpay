<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 21:20
 */

namespace Wuzhou\Funpay\Request;


class TransferMoneyRequest extends BaseRequest
{

    public function getApiUrl()
    {
        return;
    }

    protected function setPrivateParams()
    {
        $params = [
            'timestamp' => time(),
            //货币单位
            'currency' => 'VND',
            //默认版本
            'version' => '1.3',
            'accountType' => 0,
            'bankLocation' => 'vn',
            'remark' => '',
            'transferTime' => '',
            //是否同步
            'isAsync' => 0,
            //回调地址
            'returnUrl' => '',
        ];
        $this->setApiParas($params);
    }
}