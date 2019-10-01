<?php
/**
 * Created by PhpStorm.
 * User: pengcheng
 * Date: 2019/9/28
 * Time: 10:00
 */
namespace app\index\service;

use Wuzhou\Funpay\Service\FunpayFactory;
class BaseService{
    protected $fpf;
    public function __construct()
    {
        $this->fpf = new FunpayFactory();
        /**
         * 以下部分请自行修改
         */
        $this->fpf->merchantID = "xxx";
        $this->fpf->businessID = "xxx";
        $this->fpf->secretKey = "xxxx";
    }
}