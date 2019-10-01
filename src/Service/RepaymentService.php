<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 14:11
 */

namespace Wuzhou\Funpay\Service;


use Wuzhou\Funpay\Contracts\Repayment;
use Wuzhou\Funpay\Lib\ReturnData;

class RepaymentService implements Repayment
{

    public function __construct()
    {
    }

    /**
     * 发起还款
     * @return mixed
     */
    public function execute(): ReturnData
    {
        // TODO: Implement repayment() method.
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