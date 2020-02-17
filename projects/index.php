<?php

require_once 'model/Page.php';

$page = new Page('My Projects', 'view/projects.php');
$page->display();
