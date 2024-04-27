# # OrderReconciliationItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Order id |
**status** | [**\OpenAPI\Client\Model\OrderStatus**](OrderStatus.md) |  |
**amount** | [**\OpenAPI\Client\Model\MoneyAmount**](MoneyAmount.md) |  |
**auto_conversion_currency** | [**\OpenAPI\Client\Model\AutoConversionCurrency**](AutoConversionCurrency.md) |  | [optional]
**external_id** | **string** |  |
**customer_telegram_user_id** | **int** | The order customer telegram id | [optional]
**created_date_time** | **\DateTime** | ISO-8601 date time when order was created |
**expiration_date_time** | **\DateTime** | ISO-8601 date time when order timeout expires |
**payment_date_time** | **\DateTime** | ISO-8601 date time when order was paid | [optional]
**selected_payment_option** | [**\OpenAPI\Client\Model\PaymentOption**](PaymentOption.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
