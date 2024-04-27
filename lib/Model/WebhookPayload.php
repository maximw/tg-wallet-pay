<?php
/**
 * WebhookPayload
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
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

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * WebhookPayload Class Doc Comment
 *
 * @category Class
 * @description Order data. SelectedPaymentOption is absent for failed orders. Status is absent for paid orders.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class WebhookPayload implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'WebhookPayload';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'number' => 'string',
        'external_id' => 'string',
        'status' => '\OpenAPI\Client\Model\OrderStatus',
        'custom_data' => 'string',
        'order_amount' => '\OpenAPI\Client\Model\MoneyAmount',
        'selected_payment_option' => '\OpenAPI\Client\Model\PaymentOption',
        'order_completed_date_time' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'int64',
        'number' => null,
        'external_id' => null,
        'status' => null,
        'custom_data' => null,
        'order_amount' => null,
        'selected_payment_option' => null,
        'order_completed_date_time' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'number' => false,
        'external_id' => false,
        'status' => false,
        'custom_data' => true,
        'order_amount' => false,
        'selected_payment_option' => false,
        'order_completed_date_time' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'number' => 'number',
        'external_id' => 'externalId',
        'status' => 'status',
        'custom_data' => 'customData',
        'order_amount' => 'orderAmount',
        'selected_payment_option' => 'selectedPaymentOption',
        'order_completed_date_time' => 'orderCompletedDateTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'number' => 'setNumber',
        'external_id' => 'setExternalId',
        'status' => 'setStatus',
        'custom_data' => 'setCustomData',
        'order_amount' => 'setOrderAmount',
        'selected_payment_option' => 'setSelectedPaymentOption',
        'order_completed_date_time' => 'setOrderCompletedDateTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'number' => 'getNumber',
        'external_id' => 'getExternalId',
        'status' => 'getStatus',
        'custom_data' => 'getCustomData',
        'order_amount' => 'getOrderAmount',
        'selected_payment_option' => 'getSelectedPaymentOption',
        'order_completed_date_time' => 'getOrderCompletedDateTime'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('number', $data ?? [], null);
        $this->setIfExists('external_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('custom_data', $data ?? [], null);
        $this->setIfExists('order_amount', $data ?? [], null);
        $this->setIfExists('selected_payment_option', $data ?? [], null);
        $this->setIfExists('order_completed_date_time', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['number'] === null) {
            $invalidProperties[] = "'number' can't be null";
        }
        if ($this->container['external_id'] === null) {
            $invalidProperties[] = "'external_id' can't be null";
        }
        if ((mb_strlen($this->container['external_id']) > 255)) {
            $invalidProperties[] = "invalid value for 'external_id', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['custom_data']) && (mb_strlen($this->container['custom_data']) > 255)) {
            $invalidProperties[] = "invalid value for 'custom_data', the character length must be smaller than or equal to 255.";
        }

        if ($this->container['order_amount'] === null) {
            $invalidProperties[] = "'order_amount' can't be null";
        }
        if ($this->container['order_completed_date_time'] === null) {
            $invalidProperties[] = "'order_completed_date_time' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Order id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string $number Human-readable short order id shown to a customer
     *
     * @return self
     */
    public function setNumber($number)
    {
        if (is_null($number)) {
            throw new \InvalidArgumentException('non-nullable number cannot be null');
        }
        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets external_id
     *
     * @return string
     */
    public function getExternalId()
    {
        return $this->container['external_id'];
    }

    /**
     * Sets external_id
     *
     * @param string $external_id Order ID in Merchant system. Use to prevent orders duplication due to request retries
     *
     * @return self
     */
    public function setExternalId($external_id)
    {
        if (is_null($external_id)) {
            throw new \InvalidArgumentException('non-nullable external_id cannot be null');
        }
        if ((mb_strlen($external_id) > 255)) {
            throw new \InvalidArgumentException('invalid length for $external_id when calling WebhookPayload., must be smaller than or equal to 255.');
        }

        $this->container['external_id'] = $external_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \OpenAPI\Client\Model\OrderStatus|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \OpenAPI\Client\Model\OrderStatus|null $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets custom_data
     *
     * @return string|null
     */
    public function getCustomData()
    {
        return $this->container['custom_data'];
    }

    /**
     * Sets custom_data
     *
     * @param string|null $custom_data Any custom string, will be provided through webhook and order status polling
     *
     * @return self
     */
    public function setCustomData($custom_data)
    {
        if (is_null($custom_data)) {
            array_push($this->openAPINullablesSetToNull, 'custom_data');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('custom_data', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($custom_data) && (mb_strlen($custom_data) > 255)) {
            throw new \InvalidArgumentException('invalid length for $custom_data when calling WebhookPayload., must be smaller than or equal to 255.');
        }

        $this->container['custom_data'] = $custom_data;

        return $this;
    }

    /**
     * Gets order_amount
     *
     * @return \OpenAPI\Client\Model\MoneyAmount
     */
    public function getOrderAmount()
    {
        return $this->container['order_amount'];
    }

    /**
     * Sets order_amount
     *
     * @param \OpenAPI\Client\Model\MoneyAmount $order_amount order_amount
     *
     * @return self
     */
    public function setOrderAmount($order_amount)
    {
        if (is_null($order_amount)) {
            throw new \InvalidArgumentException('non-nullable order_amount cannot be null');
        }
        $this->container['order_amount'] = $order_amount;

        return $this;
    }

    /**
     * Gets selected_payment_option
     *
     * @return \OpenAPI\Client\Model\PaymentOption|null
     */
    public function getSelectedPaymentOption()
    {
        return $this->container['selected_payment_option'];
    }

    /**
     * Sets selected_payment_option
     *
     * @param \OpenAPI\Client\Model\PaymentOption|null $selected_payment_option selected_payment_option
     *
     * @return self
     */
    public function setSelectedPaymentOption($selected_payment_option)
    {
        if (is_null($selected_payment_option)) {
            throw new \InvalidArgumentException('non-nullable selected_payment_option cannot be null');
        }
        $this->container['selected_payment_option'] = $selected_payment_option;

        return $this;
    }

    /**
     * Gets order_completed_date_time
     *
     * @return \DateTime
     */
    public function getOrderCompletedDateTime()
    {
        return $this->container['order_completed_date_time'];
    }

    /**
     * Sets order_completed_date_time
     *
     * @param \DateTime $order_completed_date_time ISO 8601 timestamp indicating the time of order completion, in UTC
     *
     * @return self
     */
    public function setOrderCompletedDateTime($order_completed_date_time)
    {
        if (is_null($order_completed_date_time)) {
            throw new \InvalidArgumentException('non-nullable order_completed_date_time cannot be null');
        }
        $this->container['order_completed_date_time'] = $order_completed_date_time;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


