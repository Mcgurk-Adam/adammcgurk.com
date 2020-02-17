<?php

require_once 'model/Page.php';

$page = new Page('Blog', 'view/blog.php');
$page->display();
