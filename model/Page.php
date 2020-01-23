<?php
declare(strict_types=1);

final class Page {

	public $page_title;
	public $file_path;

	public function __construct(string $title, string $path) {

		$this->page_title = $title;
		$this->file_path = $path;

	}

	public function display(array $extra_html = array()): void {
		include_once $this->file_path;
	}

}
