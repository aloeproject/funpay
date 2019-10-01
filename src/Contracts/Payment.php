<?php

namespace Wuzhou\Funpay\Contracts;

use Wuzhou\Funpay\Lib\ReturnData;

interface Payment
{
    /**
     * 付款
     * @param int $amount
     * @param int $orderNo
     * @param array $accountInfoArr
     * @return mixed
     */
    public function execute($amount, $orderNo, $accountInfoArr): ReturnData;

}