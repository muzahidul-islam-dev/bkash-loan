<?php

namespace App\Service;

use App\Models\PaymentConfigure;
use Illuminate\Support\Facades\Http;


class BkashService
{
  protected $baseUrl;
  protected $appKey;
  protected $appSecret;
  protected $username;
  protected $password;

  public function __construct()
  {
    $this->baseUrl = env('BKASH_BASE_URL', 'https://tokenized.sandbox.bka.sh/v1.2.0-beta');
    $this->appKey = PaymentConfigure::first()?->app_key;
    $this->appSecret = PaymentConfigure::first()?->secret_key;
    $this->username = PaymentConfigure::first()?->username;
    $this->password = PaymentConfigure::first()?->password;
  }

  /**
   * Grant Token
   */
  public function grantToken(): array
  {
    $url = $this->baseUrl . '/tokenized/checkout/token/grant';

    $payload = [
      'app_key' => $this->appKey,
      'app_secret' => $this->appSecret,
    ];

    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'username' => $this->username,
      'password' => $this->password,
      'x-app-key' => $this->appKey,
    ])->post($url, $payload);

    return $response->json();
  }

  /**
   * Create Payment
   */
  public function createPayment(string $token, float|int $amount, string $invoice, $mobileNumber = '01')
  {

    $url = $this->baseUrl . '/tokenized/checkout/create';

    $payload = [
      "mode" => "0011",
      "payerReference" => $mobileNumber,
      "callbackURL" => route('callback'),
      "amount" => number_format($amount, 2, '.', ''),
      "currency" => "BDT",
      "intent" => "sale",
      "merchantInvoiceNumber" => $invoice
    ];

    $response = Http::withHeaders([
      'Authorization' => $token,
      'X-APP-Key' => env('BKASH_APP_KEY'),
      'Accept' => 'application/json',
    ])->post($url, $payload);

    return $response->json();
  }

  /**
   * Execute Payment
   */
  public function executePayment(string $token, string $paymentID): array
  {
    $url = $this->baseUrl . '/tokenized/checkout/execute';

    $payload = [
      'paymentID' => $paymentID
    ];

    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'Authorization' => $token,
      'x-app-key' => $this->appKey,
    ])->post($url, $payload);

    return $response->json();
  }

  /**
   * Query Payment
   */
  public function queryPayment(string $token, string $paymentID): array
  {
    $url = $this->baseUrl . '/tokenized/checkout/payment/status?paymentID=' . $paymentID;

    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'Authorization' => $token,
      'x-app-key' => $this->appKey,
    ])->get($url);

    return $response->json();
  }
}
