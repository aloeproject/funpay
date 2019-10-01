<?php


namespace Wuzhou\Funpay\Constants;

//funpay的code码
class FunpayReturnCode
{
    public const RETURN_CODE = [
        "10000" => "the request is succeed.",
        "40000" => "the param is wrong.",
        "40001" => "the encrypt is wrong.",
        "40004" => "the request is not found.",
        "40009" => "the product status is illegal.",
        "50000" => "the connection error.",
        "50001" => "the connection error.",
        "50002" => "the request is rejected.",
        "50006" => "the request is rejected.",
        "50009" => "the cardNo is not exist.",
        "60001" => "the balance is insufficient.",
        "60005" => "the transaction is duplicated.",
        "60050" => "The user does not exist.",
    ];
}