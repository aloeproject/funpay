<?php
namespace app\index\service;//替换成实际的命名空间
use Wuzhou\Funpay\Request\FunPaymentVirtualCardCreateRequest;
class FunPaymentVirtualCardCreateService{
    public function create(){
        $request = new FunPaymentVirtualCardCreateRequest();
        $request->setApiParas([
            'feeID'=>'xxx',//计费点id
            'clientID'=>'xxx',//用户ID，商户传入，以便区分用户对账平账，商户可以根据自己需要传入终端用户的ID或者合同号等唯一标记，Funpay对此字段不作区分处理，返回结果中亦不进行返回，仅用于结果报表中的检索。商户可以根据自己需求决定是否传入。如果不传入请不要使用此字段。如果带了此字段请务必确保其有值。
            'amount'=>'xxx',//用户的订单额，单位1VND，最小值20,000VND（二万），最大值80,000,000（八千万），仅支持整数
            'currency'=>'VND',//用户的订单货币单位，唯一值VND
            'orderNo'=>'xxx',//商户自行创建的订单号，唯一，最长40字符，仅数字字母，不支持特殊字符
            'expireDate'=>'xxx',//商户自行指定的过期时间，格式yyyyMMdd，以河内时间为准。过了该日后的第二天凌晨就会回收该虚拟账户，用户无法存入金额。 如果不需要该虚拟卡号过期，则置空，不传任何值。 对于VTB虚拟卡必须设置此有效期，且不得超过一个月，否则创建时会返回错误。对于VIB虚拟卡，建议将此参数设置为空，以示永久有效。
            'returnUrl'=>'xxx',//回调地址，Funpay将以此地址通知用户进来的每一次汇款。此参数必须为“http://”开头或者“https://”开头，否则不会触发回调。强烈建议就算您不依赖回调，也填入一个合法的回调地址，可以不做任何逻辑处理，但是方便进一步扩展。
            'bankType'=>'xxx',//银行类型，默认值为“VIB“，代表VIB银行 。可用值“VIB”—VIB银行，“VTB” —VTB银行。
            'accountNo'=>'xxx',//申请的银行卡号， 不超过15位数字，不足15位的部分，Funpay会自动用0在前面补齐。建议小于等于10位数字，Funpay会返回16位的卡号，能适配更多的银行系统。如相同的卡号已经创建，则Funpay会返回创建失败。在bankType为“VTB”时该参数失效，传入任何值均无实际意义，只作为计算sign使用。
            'userName'=>'xxx',//用户姓名，会传入给银行，作为交易的区分标记。如输入含有音调的字母，Funpay会自动转换为不带音调的字母传入给银行。不支持数字和特殊字符。用户对该账户存入的时候输入的不是这个姓名，仍然是Funpay公司名。在bankType为“VTB”时该参数失效，传入任何值均无实际意义，只作为计算sign使用。

        ]);
        return $this->fpf->execute($request);
    }
}