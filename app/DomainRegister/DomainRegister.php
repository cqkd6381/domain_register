<?php
namespace App\DomainRegister;

use App\ErrorCode;
use App\Signature;

class DomainRegister
{
	use Signature;

    /**
     * 唯一请求识别码
     * @var string
     */
	protected $requestId;

    /**
     * 初始化对象
     * DomainRegister constructor.
     */
	public function __construct()
    {
        $this->requestId = sha1(join('&', $_GET));
    }

    /**
     * 查询域名是否可注册
     * @return false|string
     */
	public function checkDomain()
	{
        if(!$this->verifySignature()){
            return $this->errorResponse('SignatureDoesNotMatch');
        }

		if(isset($_GET['Action'], $_GET['DomainName'])){
            if($_GET['Action'] === 'CheckDomain'){
                /**
                 * 此处编写查询该域名是否可注册逻辑（mock数据统一返回域名已注册）
                 */
                return json_encode([
                    'RequestId' => $this->requestId,
                    'Name' => $_GET['DomainName'],
                    'Avail' => 0,
                    'Reason' => '该域名已注册',
                    /*'FeeCurrency' => 'xxxxxx',
                    'FeePeriod' => 'xxxxxx',
                    'FeeFee' => 'xxxxxx',
                    'RmbFee' => 'xxxxxx',
                    'FeeCommand' => 'xxxxxx',*/
                ]);
            }

            return $this->errorResponse('InvalidParameter');
        }

        return $this->errorResponse('MissingParameter');
	}

    /**
     * 创建订单
     * @return false|string
     */
    public function createOrder()
    {
        if(!$this->verifySignature()){
            return $this->errorResponse('SignatureDoesNotMatch');
        }

        if(isset($_GET['SubOrderParam'], $_GET['DomainName'])){
            if($_GET['Action'] === 'CreateOrder'){
                /**
                 * 此处编写创建订单逻辑逻辑（此处为简洁，默认SubOrderParam参数为字符串，mock数据的OrderID值返回该参数的md5值）
                 */
                return json_encode([
                    'RequestId' => $this->requestId,
                    'OrderID' => md5($_GET['SubOrderParam']),
                ]);
            }

            return $this->errorResponse('InvalidParameter');
        }

        return $this->errorResponse('MissingParameter');
    }

    /**
     * 错误统一返回方法
     * @param $errorName
     * @return false|string
     */
    protected function errorResponse($errorName)
    {
        $error = ErrorCode::ClientError[$errorName];

        return json_encode([
            'RequestId' => $this->requestId,
            'code' => $error['code'],
            'message' => $error['message']
        ]);
    }
}