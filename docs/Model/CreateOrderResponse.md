# # CreateOrderResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | &#x60;SUCCESS&#x60; - new order created; &#x60;data&#x60; is present. &#x60;ALREADY&#x60; - order with completely same parameters including externalId already exists; &#x60;data&#x60; is present. &#x60;CONFLICT&#x60; - order with different parameters but same externalId already exists; &#x60;data&#x60; is absent. &#x60;ACCESS_DENIED&#x60; - you&#39;re not permitted to create orders, contact support in this case; &#x60;data&#x60; is absent. &#x60;INVALID_REQUEST&#x60; - we failed to handle your request, check that all required fields sent properly. &#x60;INTERNAL_ERROR&#x60; - unexpected error on our side |
**message** | **string** | Verbose reason of non-success result | [optional]
**data** | [**\OpenAPI\Client\Model\OrderPreview**](OrderPreview.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
