<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 13:41
 */

namespace Wuzhou\Funpay\Contracts;

//用户银行卡鉴权
interface UserAuthentication
{
    //发起鉴权查询
    public function execute();
}