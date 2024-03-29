<?php
/**
 * Created by PhpStorm.
 * User: pengcheng
 * Date: 2019/9/27
 * Time: 23:32
 */

namespace Wuzhou\Funpay\Lib;

class Curl {

    private $ch;//curl资源对象

    /**
     * 构造方法
     * @param string $url 请求的地址
     * @param int $responseHeader 是否需要响应头信息
     */
    public function __construct($url,$responseHeader = 0){
        $this->ch = curl_init($url);
        curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,1);//设置以文件流的形式返回
        curl_setopt($this->ch,CURLOPT_HEADER,$responseHeader);//设置响应头信息是否返回
    }

    /**
     * @param $url
     * @param int $responseHeader
     * @return Curl
     */
    public static function instance($url,$responseHeader = 0) {
        return new Curl($url,$responseHeader);
    }

    /**
     * 析构方法
     */
    public function __destruct(){
        $this->close();
    }

    /**
     * 添加请求头
     * @param array $value 请求头
     */
    public function addHeader($value){
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $value);
    }

    /**
     * 发送请求
     * @return string 返回的数据
     */
    private function exec(){

        $ret = curl_exec($this->ch);
        if($ret === false||curl_getinfo($this->ch,CURLINFO_HTTP_CODE)!=200) {
            return false;
        } else {
            return $ret;
        }
    }

    /**
     * 发送get请求
     * @return string 请求返回的数据
     */
    public function get(){
        return $this->exec();
    }

    /**
     * 发送post请求
     * @param  arr/string $value 准备发送post的数据
     * @param boolean $https 是否为https请求
     * @return string        请求返回的数据
     */
    public function post($value,$https=true){
        if($https){
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($this->ch,CURLOPT_POST,1);//设置post请求
        curl_setopt($this->ch,CURLOPT_POSTFIELDS,$value);
        return $this->exec();
    }


    public function postJson($value,$https=true){
        if($https){
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,$value);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($value))
        );
        return $this->exec();
    }

    /**
     * 关闭curl句柄
     */
    private function close(){
        curl_close($this->ch);
    }

}