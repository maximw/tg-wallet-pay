# # OrderPreview

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Order id |
**status** | [**\OpenAPI\Client\Model\OrderStatus**](OrderStatus.md) |  |
**number** | **string** | Human-readable short order id shown to a customer |
**amount** | [**\OpenAPI\Client\Model\MoneyAmount**](MoneyAmount.md) |  |
**auto_conversion_currency** | [**\OpenAPI\Client\Model\AutoConversionCurrency**](AutoConversionCurrency.md) |  | [optional]
**created_date_time** | **\DateTime** | ISO-8601 date time when order was created |
**expiration_date_time** | **\DateTime** | ISO-8601 date time when order timeout expires |
**completed_date_time** | **\DateTime** | ISO-8601 date time when order was completed (paid/expired/etc) | [optional]
**pay_link** | **string** | URL to be shown to the payer by the store. Сan be used in &#39;Telegram Bot&#39; only. **Important:** this link can be opened ONLY in dialog with Telegram-bot specified in your Store, ONLY by user with &#x60;telegramUserId&#x60; specified in the Order. |
**direct_pay_link** | **string** | URL to be shown to the payer by the store. Can be used in &#39;Telegram Bot&#39; and &#39;Telegram Web App&#39;. **Important:** this link can be opened ONLY in dialog with Telegram-bot specified in your Store, ONLY by user with &#x60;telegramUserId&#x60; specified in the Order. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
