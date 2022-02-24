<?php
class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	private function renderArticle($data){
		echo "<div class='article'><div class=article__content'> <div class='article__header'><div class='article__date'>" . $data['date'] . "</div><div class='article__title'>" . $data['title'] . "</div></div><div class='article__text'>" . $data['content'] . "</div></div></div>";
	}
	function renderArticlesOnPage($page){
		foreach($page as $article){
			$this->renderArticle($article);
		}
	}
}

