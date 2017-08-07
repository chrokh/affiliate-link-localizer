<?php

function find_country_from_possible_ip ($ip) {
  if (looks_like_ip($ip)) {
    return find_country_from_ip($ip);
  } else {
    return 'US';
  }
}

function find_country_from_ip ($ip) {
  $url = 'http://ipinfo.io/'.$ip;
  return json_decode(file_get_contents($url), true)['country'];
}

function looks_like_ip ($ip) {
  $dots = preg_match_all('/\./', $ip);
  return $dots >= 3;
}

function get_ip () {
  return $_SERVER['REMOTE_ADDR'];
}

function get_product_id () {
  return $_GET['id'];
}

function find_closest_amazon_country_from_country_code ($code) {
  switch ($code) {
  case 'US':
  case 'UK':
  case 'DE':
  case 'IT':
  case 'FR':
  case 'CA':
  case 'ES':
    return $code;
  case 'SE':
    return 'DE';
  default:
    return 'US';
  }
}

function get_affiliate_code_from_country_code ($code) {
  return json_decode(file_get_contents('config.json'), true)['amazon'][$code];
}

function get_extension_from_country_code ($code) {
  return array(
    'US' => 'com',
    'UK' => 'co.uk',
    'DE' => 'de',
    'IT' => 'it',
    'FR' => 'fr',
    'CA' => 'ca',
    'ES' => 'es'
  )[$code];
}




//
// Redirect to amazon store relevant to user
//

$country =
  find_closest_amazon_country_from_country_code(
    find_country_from_possible_ip(
      get_ip()));
$extension = get_extension_from_country_code($country);
$affiliate = get_affiliate_code_from_country_code($country);
$product   = get_product_id();
$url = 'https://www.amazon.'.$extension.'/gp/product/'.$product.'?tag='.$affiliate;

header('Location: '.$url);
die();
?>
