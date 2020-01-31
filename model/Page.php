<?php

final class Page {

	public $page_title;
	public $file_path;

	public function __construct($title, $path) {

		$this->page_title = $title;
		$this->file_path = $path;

	}

	public function display($extra_html = array()) {
		include_once $this->file_path;
	}

}
