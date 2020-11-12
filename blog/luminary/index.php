<?php

require_once 'model/Page.php';

$page = new Page('Luminary Post Stuff', 'view/post-template.php');
$page->display(array(
	'title' => 'All about Luminary',
	'last_updated' => 'October 17th 2020',
	'author' => 'Adam McGurk'
));
