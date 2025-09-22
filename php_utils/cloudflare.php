<?php

use GuzzleHttp\Client;

function queryDb(string $sql, array $params = []): array {
	$cloudflareClientRequest = new Client();
	$cloudflareResponse = $cloudflareClientRequest->request("POST", "https://api.cloudflare.com/client/v4/accounts/" . getenv('CLOUDFLARE_ACCOUNT_ID') . "/d1/database/" . getenv('CLOUDFLARE_DATABASE_ID') . "/query", [
		"json" => [
			"sql" => $sql,
			"params" => $params,
		],
		"headers" => [
			"Content-Type" => "application/json",
			"Authorization" => "Bearer " . getenv('CLOUDFLARE_API_TOKEN'),
		],
	]);
	return json_decode($cloudflareResponse->getBody()->getContents(), true);
}