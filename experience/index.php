<?php

require_once 'model/Page.php';

$page = new Page('My Experience', 'view/experience.php');
$page->display();
