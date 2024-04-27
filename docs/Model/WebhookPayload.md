# # WebhookPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Order id |
**number** | **string** | Human-readable short order id shown to a customer |
**external_id** | **string** | Order ID in Merchant system. Use to prevent orders duplication due to request retries |
**status** | [**\WalletPay\Model\OrderStatus**](OrderStatus.md) |  | [optional]
**custom_data** | **string** | Any custom string, will be provided through webhook and order status polling | [optional]
**order_amount** | [**\WalletPay\Model\MoneyAmount**](MoneyAmount.md) |  |
**selected_payment_option** | [**\WalletPay\Model\PaymentOption**](PaymentOption.md) |  | [optional]
**order_completed_date_time** | **\DateTime** | ISO 8601 timestamp indicating the time of order completion, in UTC |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
