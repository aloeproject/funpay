<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/27
 * Time: 13:35
 */

namespace Wuzhou\Funpay\Lib;


use Wuzhou\Funpay\Constants\Code;

class ReturnData
{
    public $code = Code::SUCCESS_CODE;
    public $msg = '';
    public $data = [];
}