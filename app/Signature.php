<?php
namespace App;

trait Signature
{
	/**
	 * 验证签名
	 * @return bool
	 */
	public function verifySignature()
	{
		$params = $_GET;
		if(!$this->checkParams($params)){
			return false;
		}

		$signature = $params['Signature'];
		$signatureParams = [
			'Format=' . $params['Format'],
			'Version=' . $params['Version'],
			'SignatureMethod=' . $params['SignatureMethod'],
			'SignatureNonce=' . $params['SignatureNonce'],
			'SignatureVersion=' . $params['SignatureVersion'],
			'AccessKeyId=' . $params['AccessKeyId'],
			'Timestamp=' . $params['Timestamp'],
		];
		ksort($signatureParams);
		$signatureParams = join('&', $signatureParams);
		$sha1 = sha1($signatureParams);

//		var_dump($sha1);
		if($signature === $sha1){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 检测公共参数完整性
	 * @param $params
	 * @return bool
	 */
	public function checkParams($params)
	{
		$checkParams = ['Signature', 'Format', 'Version', 'SignatureMethod', 'SignatureNonce', 'SignatureVersion', 'AccessKeyId', 'Timestamp'];

		$checkStatus = true;
		foreach ($checkParams as $item) {
			if(!isset($params[$item])){
				$checkStatus = false;
				break;
			}
		}

		return $checkStatus;
	}
}