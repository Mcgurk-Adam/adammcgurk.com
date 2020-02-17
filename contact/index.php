<?php

require_once 'model/Page.php';

$page = new Page('Contact Me', 'view/contact.php');
$page->display();
