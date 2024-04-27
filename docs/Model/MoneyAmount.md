# # MoneyAmount

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**currency_code** | **string** | Currency code |
**amount** | **string** | Big decimal string representation. Note that the max precision (number of digits after decimal point) depends on the currencyCode. E.g. for all fiat currencies is 2 (0.01), for TON is 9, for BTC is 8, for USDT is 6. There&#39;s also min order amount for creating an order. It&#39;s 0.001 TON / 0.000001 BTC / 0.01 USDT / 0.01 USD / 0.01 EUR / 0.1 RUB. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
