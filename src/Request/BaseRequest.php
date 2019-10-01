<?php
/**
 * 获取银行列表
 * Created by PhpStorm.
 * User: pengcheng
 * Date: 2019/9/28
 * Time: 0:38
 */

namespace Wuzhou\Funpay\Request;


use Wuzhou\Funpay\Contracts\Request;

abstract class BaseRequest implements Request
{
    private $commonParams = [
        'merchantID' => '',
        'businessID' => '',
    ];

    //秘钥
    private $secretKey = '';

    protected $apiParas;

    //设置私有参数
    abstract protected function setPrivateParams();


    public function getSecretKey()
    {
        return $this->secretKey;
    }

    public function setApiParas($apiParas)
    {
        $this->apiParas = array_merge($this->commonParams, $apiParas);
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function setApiPara($key, $val)
    {
        $this->apiParas[$key] = $val;
    }

    abstract public function getApiUrl();
}