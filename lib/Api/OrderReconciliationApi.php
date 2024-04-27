<?php
/**
 * OrderReconciliationApi
 * PHP version 7.4
 *
 * @category Class
 * @package  WalletPay
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Wallet Pay
 *
 * ### Beta API has been released for first users! We highly appreciate any kind of feedback as it helps us improve our services. Please share your thoughts using this [form](https://forms.gle/TgBB5Dh35i9QvsTf8).    # Changelog |Date|Description of change| |-------------|-----------------------| | 2023/08/08  | Added the new `directPayLink` to `OrderPreview` object. This link format can be used in Telegram Web Apps                    | | 2023/12/15  | Added the new `autoConversionCurrency` to `CreateOrderRequest` object.                                                       |  # Get started **[Wallet Pay](https://pay.wallet.tg/)** is a business platform within [Wallet](https://t.me/wallet) that enables payment transactions between merchants and customers.  Useful links: - [Wallet Pay Business Support](https://t.me/WalletPay_supportbot) is a Telegram bot for reaching out the Wallet Pay Support Team. - [Demo Store Bot](https://t.me/PineAppleDemoWPStoreBot) is a Telegram bot for Wallet Pay functionality introduction. (Attention: all payments are carried out in real assets) - [Merchant Community](https://t.me/+6TReWBEyZxI5Njli) is a Telegram group for sharing an experience and solutions between group members.  To get started please follow the steps below.  ### 1. Log in to the 'Merchant account'  Businesses or developers can get started by following the next steps to create a Partner account with us: 1. Follow the link https://pay.wallet.tg. 2. Click 'Login via Telegram'. 3. Enter your phone number in the popup window 'oauth.telegram.org appears', and click 'Apply'. 4. You will receive a message in Telegram with an authorisation request, click  'Apply'. 5. Click 'Apply' in the popup window  'oauth.telegram.org' in your Web browser.  **We recommend using an account to which the person dealing with the finances has access. For legal entities, it is an authorized representative.**  ### 2. Take a short survey  If you are logging in for the first time, or some additional information is required, Wallet Pay offers you to answer several questions for more details. There are two steps: 1. Questionnaire 2. KYB (Know-Your-Business) or KYC (Know-Your-Customer) checks  Once completed, your application will be reviewed shortly, and you will be notified about the results. If successful, you will see the fee charged by the service, and get access to your account where you can start the integration.  **For legal entities, the form can be filled out only by an authorized representative: a director or an employee with a power of attorney.**  ### 3. Create the first 'Store' Once the 'Survey' is passed successfully, you will be offered to Create your first store.  ### 4. Generate 'API key' After naming the first store you will be offered to set it up: 1. Generate API Key. 2. Copy your API Key and start integration with us.  ### 5. Create an Order Using generated Wallet Pay API proceed the following: 1. Create an Order. 2. Choose the appropriate payment link based on the store implementation and show it to your customer:     - `payLink` for 'Text Telegram Bot'     - `directPayLink` for 'Text Telegram Bot' or [Telegram Web App](https://core.telegram.org/bots/webapps).      - for [Telegram Web App](https://core.telegram.org/bots/webapps) use `openTelegramLink(url)` function, not `openLink(url[, options])` (unless you want to open the link in browser)     - for 'Text Telegram Bot' use `url` field of regular [Inline Button](https://core.telegram.org/bots/api#inlinekeyboardbutton), not MenuButtonWebApp or anything else 3. Check the Order status.  **Only the specified 'customerTelegramUserId' can open a payment page.**  ### 6. Withdraw the funds After the customer confirms the payment, the funds are credited to your Assets and held for 48 hours by default. After this time expires, you can withdraw the funds to the balance of **your [Wallet](https://t.me/wallet) account** you used to log in to Wallet Pay service.  ### 7. Refund For now you can refund from your Wallet account you use to log in to Wallet Pay. But it will be available in your Merchant account in the nearest future.  ### 8. Sign out from the 'Merchant account' To sign out from your account click 'Sign out'. To log in to your account click 'Log in'. If you want to log in under another Telegram account please proceed the following: 1. Go to Telegram and open 'Telegram (Service notification)' dialog. 2. Select 'Terminate session'. 3. Now you can log in using another Telegram account.  # Design Guidelines When integrating your 'Telegram Bot' with the 'Wallet pay API', please make sure that the payment button complies with the following guidelines:  1. The payment button should be named exactly like one of these two:      1. `:purse: Wallet Pay`     2. `:purse: Pay via Wallet`. 2. The payment button is located above the other buttons (if you have others).  Note: `:purse:` is an emoji (see https://emojipedia.org/purse/).  Please see the example in [Demo Store Bot](https://t.me/PineAppleDemoWPStoreBot).  # Use Case 1. The customer initiates the payment process in the merchant's store. 2. Merchant's bot:     1. addresses the POST order;     2. receives the payment link in response;     3. shows the user the payment button. 3. The customer taps the payment button. 4. The merchant's store redirects the customer to the payment link in the Wallet. 5. If the customer uses Wallet for the first time, they agree to:     1. add Wallet to the Attachments menu;     2. allow Wallet to send messages.  6. Wallet:     1. authenticates the customer;     2. checks the balance and displays a form:         1. to confirm the payment (if the balance is sufficient);         2. to top up the balance (if the balance is insufficient).   7. The customer confirms the payment. 8.  Wallet:     1. withdraws the funds from the customer's account and credits them to the partner store's account;     2. redirects the customer back to the partner's specified returnURL;     3. sends a webhook to the merchant.  # Troubleshooting  ## \"Something went wrong\" screen The most common reasons of the \"Something went wrong\" screen when someone opens `payLink` or `directPayLink` are: 1. Opening outside Telegram-bot or 'Telegram Web App' specified in your Store 2. Opening from [Gaming Platform](https://core.telegram.org/bots/games), it's not supported 3. Opening by customer whos `telegramUserId` does not match provided `customerTelegramUserId` field in the Order 4. Opening by customer who've been banned from using Wallet Pay as payer for some reason. Contact our [Wallet Pay Business Support](https://t.me/WalletPay_supportbot) for details 5. Unexpected error on our side. Contact [Wallet Pay Business Support](https://t.me/WalletPay_supportbot) for help  # Authorization The 'API key' must be provided in the HTTP header 'Wpay-Store-Api-Key'.  Example:   ```sh curl -X POST --location 'https://pay.wallet.tg/wpay/store-api/v1/order' \\ --header 'Wpay-Store-Api-Key: YOUR_STORE_API_KEY'\\ --header 'Content-Type: application/json' \\ --header 'Accept: application/json' -d '{   \"amount\": {     \"amount\": 30.45,     \"currencyCode\": \"TON\"   },   \"externalId\": \"ORD-5023-4E89\",   \"timeoutSeconds\": 10800,   \"description\": \"VPN for 1 month\",   \"returnUrl\": \"https://t.me/wallet\",   \"failReturnUrl\": \"https://t.me/wallet\",   \"customData\": \"client_ref=4E89\" }' ```  # HTTP status codes The table below describes the possible HTTP response codes you can receive when sending an API request. |Code|Description| |-------------|-----------------------| | 200         | OK                    | | 400         | Invalid request       | | 401         | Invalid API key       | | 404         | Not found             | | 429         | Request limit reached | | 500         | Unexpected error      |
 *
 * The version of the OpenAPI document: 1.2.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.6.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace WalletPay\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use WalletPay\ApiException;
use WalletPay\Configuration;
use WalletPay\HeaderSelector;
use WalletPay\ObjectSerializer;

/**
 * OrderReconciliationApi Class Doc Comment
 *
 * @category Class
 * @package  WalletPay
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OrderReconciliationApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'getOrderAmount' => [
            'application/json',
        ],
        'getOrderList' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getOrderAmount
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderAmount'] to see the possible values for this operation
     *
     * @throws \WalletPay\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \WalletPay\Model\OrderAmountResponse
     */
    public function getOrderAmount($wpay_store_api_key, string $contentType = self::contentTypes['getOrderAmount'][0])
    {
        list($response) = $this->getOrderAmountWithHttpInfo($wpay_store_api_key, $contentType);
        return $response;
    }

    /**
     * Operation getOrderAmountWithHttpInfo
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderAmount'] to see the possible values for this operation
     *
     * @throws \WalletPay\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \WalletPay\Model\OrderAmountResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrderAmountWithHttpInfo($wpay_store_api_key, string $contentType = self::contentTypes['getOrderAmount'][0])
    {
        $request = $this->getOrderAmountRequest($wpay_store_api_key, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\WalletPay\Model\OrderAmountResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WalletPay\Model\OrderAmountResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WalletPay\Model\OrderAmountResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\WalletPay\Model\OrderAmountResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPay\Model\OrderAmountResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrderAmountAsync
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderAmount'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderAmountAsync($wpay_store_api_key, string $contentType = self::contentTypes['getOrderAmount'][0])
    {
        return $this->getOrderAmountAsyncWithHttpInfo($wpay_store_api_key, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrderAmountAsyncWithHttpInfo
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderAmount'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderAmountAsyncWithHttpInfo($wpay_store_api_key, string $contentType = self::contentTypes['getOrderAmount'][0])
    {
        $returnType = '\WalletPay\Model\OrderAmountResponse';
        $request = $this->getOrderAmountRequest($wpay_store_api_key, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrderAmount'
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderAmount'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getOrderAmountRequest($wpay_store_api_key, string $contentType = self::contentTypes['getOrderAmount'][0])
    {

        // verify the required parameter 'wpay_store_api_key' is set
        if ($wpay_store_api_key === null || (is_array($wpay_store_api_key) && count($wpay_store_api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $wpay_store_api_key when calling getOrderAmount'
            );
        }


        $resourcePath = '/wpay/store-api/v1/reconciliation/order-amount';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($wpay_store_api_key !== null) {
            $headerParams['Wpay-Store-Api-Key'] = ObjectSerializer::toHeaderValue($wpay_store_api_key);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getOrderList
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  int $offset offset (required)
     * @param  int $count count (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderList'] to see the possible values for this operation
     *
     * @throws \WalletPay\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \WalletPay\Model\GetOrderReconciliationListResponse
     */
    public function getOrderList($wpay_store_api_key, $offset, $count, string $contentType = self::contentTypes['getOrderList'][0])
    {
        list($response) = $this->getOrderListWithHttpInfo($wpay_store_api_key, $offset, $count, $contentType);
        return $response;
    }

    /**
     * Operation getOrderListWithHttpInfo
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  int $offset (required)
     * @param  int $count (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderList'] to see the possible values for this operation
     *
     * @throws \WalletPay\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \WalletPay\Model\GetOrderReconciliationListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrderListWithHttpInfo($wpay_store_api_key, $offset, $count, string $contentType = self::contentTypes['getOrderList'][0])
    {
        $request = $this->getOrderListRequest($wpay_store_api_key, $offset, $count, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\WalletPay\Model\GetOrderReconciliationListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WalletPay\Model\GetOrderReconciliationListResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WalletPay\Model\GetOrderReconciliationListResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\WalletPay\Model\GetOrderReconciliationListResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPay\Model\GetOrderReconciliationListResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrderListAsync
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  int $offset (required)
     * @param  int $count (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderListAsync($wpay_store_api_key, $offset, $count, string $contentType = self::contentTypes['getOrderList'][0])
    {
        return $this->getOrderListAsyncWithHttpInfo($wpay_store_api_key, $offset, $count, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrderListAsyncWithHttpInfo
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  int $offset (required)
     * @param  int $count (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderListAsyncWithHttpInfo($wpay_store_api_key, $offset, $count, string $contentType = self::contentTypes['getOrderList'][0])
    {
        $returnType = '\WalletPay\Model\GetOrderReconciliationListResponse';
        $request = $this->getOrderListRequest($wpay_store_api_key, $offset, $count, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrderList'
     *
     * @param  string $wpay_store_api_key Store API key (required)
     * @param  int $offset (required)
     * @param  int $count (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getOrderList'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getOrderListRequest($wpay_store_api_key, $offset, $count, string $contentType = self::contentTypes['getOrderList'][0])
    {

        // verify the required parameter 'wpay_store_api_key' is set
        if ($wpay_store_api_key === null || (is_array($wpay_store_api_key) && count($wpay_store_api_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $wpay_store_api_key when calling getOrderList'
            );
        }

        // verify the required parameter 'offset' is set
        if ($offset === null || (is_array($offset) && count($offset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $offset when calling getOrderList'
            );
        }
        if ($offset < 0) {
            throw new \InvalidArgumentException('invalid value for "$offset" when calling OrderReconciliationApi.getOrderList, must be bigger than or equal to 0.');
        }
        
        // verify the required parameter 'count' is set
        if ($count === null || (is_array($count) && count($count) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $count when calling getOrderList'
            );
        }
        if ($count > 10000) {
            throw new \InvalidArgumentException('invalid value for "$count" when calling OrderReconciliationApi.getOrderList, must be smaller than or equal to 10000.');
        }
        if ($count < 0) {
            throw new \InvalidArgumentException('invalid value for "$count" when calling OrderReconciliationApi.getOrderList, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/wpay/store-api/v1/reconciliation/order-list';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $count,
            'count', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);

        // header params
        if ($wpay_store_api_key !== null) {
            $headerParams['Wpay-Store-Api-Key'] = ObjectSerializer::toHeaderValue($wpay_store_api_key);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
