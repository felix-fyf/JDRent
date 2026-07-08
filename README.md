# JDRent PHP SDK

京东租赁 PHP SDK，支持通过 Composer 安装使用。

## 安装

```bash
composer require jdrent/jdrent-php-sdk
```

## 注意事项

客户端使用 `JddKeyType = 'AKS'`，加密方式 `EncryptType = '3DES_RSA'` 配置时，SMAPI、HAPI、SPI 类型的接口中加密会涉及在项目目录下新建临时文件，这是因为使用 `openssl_pkcs7_encrypt` 进行加密时，参数传递必须是文件名。

## 环境要求

- PHP >= 5.6
- PHP OpenSSL 扩展
- PHP cURL 扩展

## 快速开始

### 前置准备，设置商户配置参数

```php
use JDRent\Config\Config;

$config = new Config();
// 应用ID
$config->setAppId('your_app_id');
// 服务端密钥系统类型，无特殊要求不需要修改
$config->setJddKeyType('AKS');
// 服务端公钥
$config->setOpenPublicKey('your_public_key');
// 客户端私钥
$config->setAppPrivateKey('your_private_key');
// 加密算法,支持3DES_RSA、NONE
$config->setEncryptType('3DES_RSA');
// 加签算法，支持SHA256withRSA
$config->setSignType('SHA256withRSA');
// 用户类型，默认0，无特殊要求不需要修改
$config->setAppIdType("0");
// 服务端调用地址！测试: https://test-api.jddglobal.com、生产: https://api.jddglobal.com
$config->setServer('https://api.jddglobal.com');
```

### 服务接口 SMAPI

```php
use JDRent\Client\DefaultJddClient;
use JDRent\Request\RentOrderCreateRequest;

require_once __DIR__ . '/vendor/autoload.php';

// 一、获取客户端
$defaultJddClient = new DefaultJddClient($config);
// 二、组织业务参数
$request = new RentOrderCreateRequest();
$request->setOutOrderNo('ORDER_001');
// 三、配置api地址
$apiMethod = '/smapi/v1/rent/order/create';
// 四、发起调用
$response = $defaultJddClient->execute($request, $apiMethod);
// 五、响应结果
echo json_encode($response, JSON_UNESCAPED_UNICODE);
```

### 页面接口 HAPI

```php
use JDRent\Client\DefaultHapiJddClient;

require_once __DIR__ . '/vendor/autoload.php';

// 组织业务参数
$systemInfo = [
    'sysId' => '123',
    'token' => '456'
];
$param = [
    "processId" => "262",
    "openSys" => "A20200702110",
    "openId" => "YFKLXD001",
    "openUser" => "YFKLXD001",
    "successUrl" => "",
    "clientIp" => $_SERVER['REMOTE_ADDR'],
    "failUrl" => "",
    "openApiParam" => "{'backUrl':'www.jd.com'}",
];
$data = ["param" => $param, "systemInfo" => $systemInfo];
$reqData = ["data" => $data];

// 发起页面跳转
$client = new DefaultHapiJddClient($config);
$result = $client->getData($reqData);
```

### 反向接口 SPI

> **注意：** SPI是服务端发起HTTP调用-->客户端-->HTTP响应服务端。

```php
use JDRent\Client\DefaultSpiJddClient;
use JDRent\Support\Util\DateUtil;

require_once __DIR__ . '/vendor/autoload.php';

$defaultSpiClient = new DefaultSpiJddClient($config);
$bizContent = $defaultSpiClient->receive($httpServletRequest);

// 业务逻辑处理
$spiResponse = [
    "resultParams" => $bizContent,
    "code" => "00000",
    "msg" => "成功",
    "respondTime" => DateUtil::getMicrosecondTime()
];

$responseWriter = $defaultSpiClient->callback($httpServletRequest, $spiResponse);
// $responseWriter['http_body'] 是响应给服务端的body
// $responseWriter['http_headers'] 是响应给服务端的header
```

### 通知接口 NAPI

> **注意：** NAPI是服务端发起HTTP调用-->客户端，客户端需用web框架去接收HTTP请求。

```php
use JDRent\Client\DefaultNapiJddClient;

require_once __DIR__ . '/vendor/autoload.php';

$napiClient = new DefaultNapiJddClient($config);
$notifyContent = $napiClient->getBizContent($httpServletRequest);
echo $notifyContent;

// 响应服务端'ok'
return 'ok';
```

## 目录结构

```
├── src/                          # SDK源码
│   ├── Client/                   # 客户端类
│   │   ├── DefaultJddClient.php  # SMAPI客户端
│   │   ├── DefaultHapiJddClient.php # HAPI客户端
│   │   ├── DefaultNapiJddClient.php # NAPI客户端
│   │   ├── DefaultSpiJddClient.php  # SPI客户端
│   │   └── JdApiClient.php      # 京东API客户端
│   ├── Config/                   # 配置类
│   │   └── Config.php
│   ├── Request/                  # 请求模型类
│   └── Support/                  # 支撑类
│       ├── Constant/             # 常量定义
│       ├── Models/               # 数据模型
│       ├── Security/             # 安全相关（加密/签名/验签）
│       │   ├── DataEncryption.php # AES加密解密工具类
│       │   └── TDE/              # TDE客户端
│       │       ├── TDEClient.php # TDE客户端主类
│       │       ├── MKey.php      # 密钥类
│       │       ├── KeyEncryption.php # 密钥加密类
│       │       ├── DataEncryption.php # 数据加密类
│       │       ├── Crypto.php    # 加密工具类
│       │       ├── Constants.php # 常量定义
│       │       ├── IndexCalculator.php # 索引计算类
│       └── Util/                 # 工具类
├── examples/                     # 使用示例
├── composer.json
└── README.md
```

## License

MIT License
