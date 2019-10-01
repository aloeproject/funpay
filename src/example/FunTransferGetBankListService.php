<?php

namespace app\index\service;//替换成实际的命名空间
use Wuzhou\Funpay\Request\FunTransferGetBankListRequest;

class FunTransferGetBankListService extends BaseService{
    public function get(){
        $request = new FunTransferGetBankListRequest();
        $request->setApiParas([
            'bankID'=>'xxx',//此处替换成实际的银行卡ID

        ]);
        return $this->fpf->execute($request);
    }
}