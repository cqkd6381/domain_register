<?php
namespace App\DomainRegister;

use App\ErrorCode;
use App\Signature;

class DomainRegister
{
	use Signature;

	public function checkDomain()
	{
		if(!$this->verifySignature()){
			$error = ErrorCode::ClientError['SignatureDoesNotMatch'];
			return json_encode([
				'code' =>$error['code'],
				'message' => $error['message']
			]);
		}else{
			return json_encode([
				'code' => 0,
				'message' => '签名验证成功'
			]);
		}
	}
}