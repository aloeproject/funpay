<?php

namespace Wuzhou\Funpay;

use Wuzhou\Funpay\Lib\Sign;
use Wuzhou\Funpay\Lib\Curl;

class AopClient {

	public $merchantID;

	public $businessID;
	
	//私钥文件路径
	public $secretKey;


	public function execute($request) {


		//组装系统参数
		$sysParams["merchantID"] = $this->merchantID;
		$sysParams["businessID"] = $this->businessID;
		$sysParams["timestamp"] = time();
		$sysParams["version"] = "1.3";



		//获取业务参数
		$apiParams = $request->getApiParas();


		//已经加入签名的参数
		$signedParams = Sign::md5_sign(array_merge($apiParams, $sysParams),$this->secretKey);

        $curl = Curl::instance($request->getApiUrl());

        $ret = $curl->postJson(json_encode($signedParams));
        if($ret) {
            return json_decode($ret,true);
        }else{
            return false;
        }
	}


}
/**
 * 用法
 * $aop = new AopClient;
 * $aop->merchantID;
 * $aop->businessID;
 * $aop->secretKey;
 * $request = new FunTransferGetRequest();
 * $request->setApiParas($params);
 * $aop->execute($request);
 */