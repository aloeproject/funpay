<?php

namespace Wuzhou\Funpay\Contracts;

use Wuzhou\Funpay\Lib\ReturnData;

interface Repayment
{
    /**
     * 发起还款
     * @return mixed
     */
    public function execute(): ReturnData;

    /**
     * 通知认证
     * @return mixed
     */
    public function notifyVerification();
}