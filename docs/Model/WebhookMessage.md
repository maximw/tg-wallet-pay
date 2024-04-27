# # WebhookMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**event_date_time** | **\DateTime** | ISO-8601 when order was completed |
**event_id** | **int** | Idempotency key. We send a max of one type of webhook message for one event. |
**type** | [**\WalletPay\Model\WebhookMessageType**](WebhookMessageType.md) |  |
**payload** | [**\WalletPay\Model\WebhookPayload**](WebhookPayload.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
