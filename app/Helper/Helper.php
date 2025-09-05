<?php


if (!function_exists('format_currency')) {
  function format_currency($amount, $language = 'en')
  {
    $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    if ($language === 'bn') {
      $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
      return str_replace($en, $bn, $amount);
    }

    return $amount;
  }
}