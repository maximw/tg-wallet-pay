docker run --rm \
    -v $PWD:/local openapitools/openapi-generator-cli generate \
    -i /local/integration-schema.yaml \
    -g php \
    -o /local \
    --additional-properties=invokerPackage=WalletPay