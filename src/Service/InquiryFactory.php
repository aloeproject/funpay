<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 14:14
 */

namespace Wuzhou\Funpay\Service;


use Wuzhou\Funpay\Contracts\PaymentInquiry;

//提供接口查询
class InquiryFactory
{

    public static function paymentInquiry(PaymentInquiry $inquiry)
    {
        return $inquiry->execute();
    }
}