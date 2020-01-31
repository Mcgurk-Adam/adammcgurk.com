<?php

require_once 'model/Page.php';

$page = new Page('About Me', 'view/about.php');
$page->display();
