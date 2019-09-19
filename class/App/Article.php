<?php

Namespace App;

class Article {

	public $title;

	public function getSlug() {

		$title = $this->title;

		$title = preg_replace('/\s+/','_',$title);

		$title = preg_replace('/[^\w]+/','',$title);

		return trim($title, "_");
	}
}
