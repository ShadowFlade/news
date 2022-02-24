<?php
class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	private function renderArticle($data){
		echo "<div class='article'><div class=article__content'> <div class='article__header'><div class='article__date'>" . $data['date'] . "</div><a class='article__title' href='view.php?id=" . $data['id'] . "'>" . $data['title'] . "</a></div><div class='article__text'>" . $data['announce'] . "</div></div></div>";
	}
	function renderArticlesOnPage($page){
		foreach($page as $article){
			$this->renderArticle($article);
		}
	}
	function renderPagination($numberOfPages){
		foreach (range(1,$numberOfPages) as $key => $value) {
			echo "<li><a class='pagination__item' href='news.php?page=" . $value . "'/>". $value;
		}
	}
}

