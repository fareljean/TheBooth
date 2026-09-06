<?php
// FJNBoothIPv2 TURN credential endpoint.
// Mints a short-lived Cloudflare Realtime TURN credential server-side and
// returns ONLY the ephemeral ICE urls/username/credential to the browser.
// The long-lived Cloudflare API token stays in turn-config.php and is never sent to the client.

header("Content-Type: application/json");
header("Cache-Control: no-store");

$config = require __DIR__ . "/turn-config.php";
$tokenId = $config["CF_TURN_TOKEN_ID"];
$apiToken = $config["CF_TURN_API_TOKEN"];

$ttl = 3600; // 1 hour ephemeral credential, minted fresh per room create/join

function cf_turn_generate($tokenId, $apiToken, $ttl) {
  $url = "https://rtc.live.cloudflare.com/v1/turn/keys/" . $tokenId . "/credentials/generate";
  $payload = json_encode(array("ttl" => $ttl));

  if (function_exists("curl_init")) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer " . $apiToken,
      "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_TIMEOUT, 8);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return array($response, $httpCode);
  }

  $context = stream_context_create(array(
    "http" => array(
      "method" => "POST",
      "header" => "Authorization: Bearer " . $apiToken . "\r\nContent-Type: application/json\r\n",
      "content" => $payload,
      "timeout" => 8,
      "ignore_errors" => true
    )
  ));
  $response = @file_get_contents($url, false, $context);
  $httpCode = 0;
  if (isset($http_response_header)) {
    foreach ($http_response_header as $h) {
      if (preg_match("#HTTP/\\S+\\s(\\d+)#", $h, $m)) { $httpCode = (int)$m[1]; }
    }
  }
  return array($response, $httpCode);
}

list($response, $httpCode) = cf_turn_generate($tokenId, $apiToken, $ttl);

if ($response === false || $httpCode < 200 || $httpCode >= 300) {
  http_response_code(502);
  echo json_encode(array("ok" => false, "error" => "turn_unavailable"));
  exit;
}

$data = json_decode($response, true);
if (!isset($data["iceServers"]["urls"], $data["iceServers"]["username"], $data["iceServers"]["credential"])) {
  http_response_code(502);
  echo json_encode(array("ok" => false, "error" => "turn_bad_response"));
  exit;
}

echo json_encode(array(
  "ok" => true,
  "iceServers" => array(
    "urls" => $data["iceServers"]["urls"],
    "username" => $data["iceServers"]["username"],
    "credential" => $data["iceServers"]["credential"]
  )
));
