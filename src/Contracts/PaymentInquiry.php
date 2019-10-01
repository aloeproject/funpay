<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 13:45
 */

namespace Wuzhou\Funpay\Contracts;

//付款结果查询
interface PaymentInquiry
{
    public function execute();
}