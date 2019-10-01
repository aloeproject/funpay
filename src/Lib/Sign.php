<?php
/**
 * Created by PhpStorm.
 * User: pengcheng
 * Date: 2019/9/27
 * Time: 23:32
 */

namespace Wuzhou\Funpay\Lib;

class Sign {

    public static function md5_sign($param,$key){
        ksort($param);
        reset($param);
        foreach ($param as $k=>$v) {
            if (is_null($v))
                unset($param[$k]);
            if ('' === $v)
                unset($param[$k]);
        }
        $pairs = array();
        foreach ($param as $k=>$v) {
            $pairs[] = "$k=$v";
        }
        $sign_data = implode('&', $pairs);
        $sign = strtoupper(MD5($sign_data.$key));
        $param["sign"] = $sign;
    }

}