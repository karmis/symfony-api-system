# symfony-api-system

### Calculate price request

```text
http://127.0.0.1:8000/calculate-price
```

```json
{
  "product": 1,
  "taxNumber": "GR123456789",
  "couponCode": "D51"
}
```

### Buy request

```text
http://127.0.0.1:8000/purchase
```

```json
{
  "product": 1,
  "taxNumber": "GR123456789",
  "couponCode": "D51",
  "paymentProcessor": "stripe"
}
```