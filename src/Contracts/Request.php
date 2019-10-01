<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 21:19
 */

namespace Wuzhou\Funpay\Contracts;


interface Request
{
    public function getApiParas();

    public function setApiPara($key, $val);

    public function getApiUrl();

    public function getSecretKey();

}