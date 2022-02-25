<?php
class View{
	function generate($data,$templateView='news.php'){
		if(empty($data['title'])){
			$data['title']='Новости';
		}
		include 'src/templates/' . $templateView;
	}
	private function renderArticle($data){
		return "<div class='article'><div class=article__content'> <div class='article__header'><div class='article__date'>" . $data['date'] . "</div><a class='article__title' href='view.php?id=" . $data['id'] . "'>" . $data['title'] . "</a></div><div class='article__text'>" . $data['announce'] . "</div></div></div>";
	}
	function renderArticlesOnPage($page){
		$result;
		foreach($page as $article){
			$result.=$this->renderArticle($article);
		}
		return $result;
	}
	function renderFullArticle($article){
		return"<div class='article'><div class=article__content'></div></div><div class='article__text'>" . $article['content'] . "</div>";
	}
	function renderPagination($numberOfPages){
		$result;
		foreach (range(1,$numberOfPages) as $key => $value) {
			$result.="<li><a class='pagination__item' href='news.php?page=" . $value . "'/>". $value . "</a></li>";
		}
		return $result;

	}

}

