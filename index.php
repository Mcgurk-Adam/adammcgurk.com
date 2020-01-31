<?php
declare(strict_types=1);

require_once 'model/Page.php';

$page = new Page('Adam\'s Website', 'view/home.php');
$page->display();
