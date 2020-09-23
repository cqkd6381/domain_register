<?php


namespace App;


class ErrorCode
{
	/**
	 * 通用性错误-客户端错误
	 */
	const ClientError = [
		'MissingParameter' => [
			'code' => 400,
			'message' => '缺少参数',
			'description' => 'The input parameter that is mandatory for processing this request is not supplied',
		],
		'InvalidParameter' => [
			'code' => 400,
			'message' => '参数取值无效',
			'description' => 'The specified value of parameter is not valid.',
		],
		'UnsupportedOperation' => [
			'code' => 400,
			'message' => '无效的接口',
			'description' => 'The specified action is not supported.',
		],
		'NoSuchVersion' => [
			'code' => 400,
			'message' => '无效的版本',
			'description' => 'The specified version does not exist.',
		],
		'Throttling' => [
			'code' => 400,
			'message' => '操作被流量控制系统拒绝',
			'description' => 'Request was denied due to request throttling.',
		],
		'InvalidAccessKeyId.NotFound' => [
			'code' => 400,
			'message' => '无效的 Access Key',
			'description' => 'The Access Key ID provided does not exist in our records.',
		],
		'Forbidden' => [
			'code' => 403,
			'message' => '操作被禁止',
			'description' => 'User not authorized to operate on the specified resource.',
		],
		'Forbidden.RiskControl' => [
			'code' => 403,
			'message' => '操作被风险控制系统禁止',
			'description' => 'This operation is forbidden by Aliyun Risk Control system.',
		],
		'SignatureDoesNotMatch' => [
			'code' => 403,
			'message' => '无效的签名',
			'description' => 'The signature we calculated does not match the one you provided. Please refer to the API reference about authentication for details.',
		],
		'Forbidden.UserVerification' => [
			'code' => 403,
			'message' => '无实名验证',
			'description' => 'Your user account is not verified by Aliyun.',
		],
	];

	/**
	 * 通用性错误-服务端错误
	 */
	const ServerError = [
		'InternalError' => [
			'code' => 500,
			'message' => '服务器无法完成对请求的处理',
			'description' => 'The request processing has failed due to some unknown error, exception or failure.',
		],
		'ServiceUnavailable' => [
			'code' => 503,
			'message' => '服务器当前无法处理请求',
			'description' => 'The request has failed due to a temporary failure of the server.',
		],
	];

	/**
	 * 业务性错误
	 */
	const BusError = [
		'Failed' => [
			'code' => 400,
			'message' => '查询失败',
			'description' => 'Query failed.',
		],
		'QueryRegistryFailed' => [
			'code' => 400,
			'message' => '查询注册局失败',
			'description' => 'Query registry failed.',
		],
		'Busy' => [
			'code' => 400,
			'message' => '系统忙',
			'description' => 'Server is busy, please try again later.',
		],
		'InvaildParameter' => [
			'code' => 400,
			'message' => '非法参数',
			'description' => 'The parameter is invaild.',
		],
		'QueryTairFailed' => [
			'code' => 400,
			'message' => '查询 tair 失败',
			'description' => 'Query tair failed.',
		],
		'DomainSuffixUnsupported' => [
			'code' => 400,
			'message' => '不支持该后缀域名查询',
			'description' => 'The domain name with this suffix is unsupported.',
		],
	];
}