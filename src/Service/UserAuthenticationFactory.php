<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 14:18
 */

namespace Wuzhou\Funpay\Service;


use Wuzhou\Funpay\Contracts\UserAuthentication;

//提供用户认证功能
class UserAuthenticationFactory
{
    public static function userAuth(UserAuthentication $authentication)
    {
        $authentication->execute();
    }
} 