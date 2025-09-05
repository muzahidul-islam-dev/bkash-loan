<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class BkashService
{
  protected $client;
  protected $baseUrl;
  protected $appKey;
  protected $appSecret;
  protected $username;
  protected $password;

  public function __construct()
  {
    $this->client = new Client();
    $this->baseUrl = config('services.bkash.base_url');
    $this->appKey = config('services.bkash.app_key');
    $this->appSecret = config('services.bkash.app_secret');
    $this->username = config('services.bkash.username');
    $this->password = config('services.bkash.password');
  }

  public function getToken()
  {
    return Cache::remember('bkash_token', 3500, function () {
      $response = $this->client->post($this->baseUrl . '/tokenized/checkout/token/grant', [
        'headers' => [
          'Content-Type' => 'application/json',
          'username' => $this->username,
          'password' => $this->password,
        ],
        'json' => [
          'app_key' => $this->appKey,
          'app_secret' => $this->appSecret,
        ]
      ]);

      $data = json_decode($response->getBody(), true);
      return $data['id_token'];
    });
  }

  public function createPayment($amount, $invoiceId, $orderId)
  {
    $token = $this->getToken();

    $response = $this->client->post($this->baseUrl . '/tokenized/checkout/create', [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => $token,
        'X-APP-Key' => $this->appKey,
      ],
      'json' => [
        'mode' => '0011',
        'payerReference' => $orderId,
        // 'callbackURL' => config('services.bkash.callback_url'),
        'callbackURL' => 'http://localhost:8000',
        'amount' => $amount,
        'currency' => 'BDT',
        'intent' => 'sale',
        'merchantInvoiceNumber' => $invoiceId,
      ]
    ]);

    return json_decode($response->getBody(), true);
  }

  public function executePayment($paymentId)
  {
    $token = $this->getToken();

    $response = $this->client->post($this->baseUrl . '/tokenized/checkout/execute', [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => $token,
        'X-APP-Key' => $this->appKey,
      ],
      'json' => [
        'paymentID' => $paymentId,
      ]
    ]);

    return json_decode($response->getBody(), true);
  }

  public function queryPayment($paymentId)
  {
    $token = $this->getToken();

    $response = $this->client->post($this->baseUrl . '/tokenized/checkout/payment/status', [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => $token,
        'X-APP-Key' => $this->appKey,
      ],
      'json' => [
        'paymentID' => $paymentId,
      ]
    ]);

    return json_decode($response->getBody(), true);
  }

  public function refundTransaction($paymentId, $amount, $trxId, $sku = 'sku')
  {
    $token = $this->getToken();

    $response = $this->client->post($this->baseUrl . '/tokenized/checkout/payment/refund', [
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => $token,
        'X-APP-Key' => $this->appKey,
      ],
      'json' => [
        'paymentID' => $paymentId,
        'amount' => $amount,
        'trxID' => $trxId,
        'sku' => $sku,
        'reason' => 'Customer refund',
      ]
    ]);

    return json_decode($response->getBody(), true);
  }
}