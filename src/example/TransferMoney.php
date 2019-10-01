<?php
/**
 * Created by PhpStorm.
 * User: lkboy
 * Date: 2019/9/28
 * Time: 11:13
 */


class TransferMoney
{
    //放款例子
    public function payment()
    {
        $req = new \Wuzhou\Funpay\Request\TransferMoneyRequest();

        //多个用户付款时
        for ($i = 0; $i < 2; $i++) {
            $req->setApiParas([
                'orderNo' => 'xx',
                'accountName' => 'xx',
                'accountNo' => 'xx',
                'bankNo' => 'xx',
            ]);
            \Wuzhou\Funpay\Service\FunpayFactory::execute1($req);
        }

    }
}