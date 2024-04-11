<?php

require_once 'vendor/autoload.php';
require_once 'env.php';

use GuzzleHttp\Client;
$notionApiToken = getenv('NOTION_TOKEN');
$notionClient = new Client([
	'base_uri' => 'https://api.notion.com',
]);
$notionResponse = $notionClient->request('POST', '/v1/databases/7d6dfe363e814d8b878377e91d1eefdd/query', [
	'headers' => ['Authorization' => 'Bearer ' . $notionApiToken, 'Notion-Version' => '2022-06-28'],
	'json' => [
		'filter' => [
			'property' => 'Status',
			'status' => [
				'equals' => 'Idea',
			],
		],
	],
]);
$notionJson = json_decode($notionResponse->getBody()->getContents(), true);
$blogPosts = [];
if (!empty($notionJson['results'])) {
	foreach ($notionJson['results'] as $notionResult) {
		$title = $notionResult['properties']['Name']['title'][0]['text']['content'];
		$tags = array_map(function($tag) {
			return $tag['name'];
		}, $notionResult['properties']['Tags']['multi_select']);
		$subtext = '';
		if (!empty($notionResult['properties']['Subtitle']['rich_text'])) {
			$subtext = $notionResult['properties']['Subtitle']['rich_text'][0]['text']['content'];
		}
		$pageId = $notionResult['id'];
		if ($pageId === '3b24a5c5-ad25-4237-a0db-eb2e35396781') {
			$pageResponse = $notionClient->request('GET', "/v1/blocks/{$pageId}/children", [
				'headers' => ['Authorization' => 'Bearer ' . $notionApiToken, 'Notion-Version' => '2022-06-28'],
			]);
			$pageJson = json_decode($pageResponse->getBody()->getContents(), true);
			// i need to search through $pageJson['results'] for the child page called 'Post'
			// then i need to make another call here
			$postPage = null;
			foreach ($pageJson['results'] as $pageBlockResult) {
				if ($pageBlockResult['type'] === 'child_page' && $pageBlockResult['child_page'][0]['title'] === 'Post') {
					$blockId = $pageBlockResult['id'];
					echo "The block id of the post is $blockId";
					break;
				}
			}
		}
		continue;
		echo "\n";
		echo "\n";
		echo "\n";
		echo json_encode($notionResult);
		echo "\n";
		echo "\n";
		echo "\n";
		$blogPosts[] = [
			'title' => $title,
			'tags' => $tags,
			'subtext' => $subtext,
		];
	}
}

// file_put_contents('blog-posts.json', json_encode($blogPosts));
// echo count($blogPosts) . ' blog posts seeded.';