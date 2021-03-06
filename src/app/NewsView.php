<?php
class NewsView
{
	function generate($data, $templateView = 'news.php')
	{
		if (empty($data['title'])) {
			$data['title'] = 'Новости';
		}
        ob_start();
		include 'src/templates/' . $templateView;
        $content = ob_get_contents();

        ob_end_clean();
        include 'src/layout/layout.php';
    }
	private function renderArticle($data)
	{
		return "<div class='article'><div class=article__content'> <div class='article__header'><div class='article__date'>" . $data['date'] . "</div><a class='article__title' href='view.php?id=" . $data['id'] . "'>" . $data['title'] . "</a></div><div class='article__text'>" . $data['announce'] . "</div></div></div>";
	}
	function renderArticlesOnPage($page)
	{
		$result = '';
		foreach ($page as $article) {
			$result .= $this->renderArticle($article);
		}
		return $result;
	}
	function renderFullArticle($article)
	{
		return "<div class='article'><div class=article__content'></div></div><div class='article__text'>" . $article['content'] . "</div>";
	}
	function renderPagination($numberOfPages)
	{
		$resultStart = "<div class='pagination__title'>Страницы:</div><ul class='pagination'>";
		$result = '';
		$resultEnd = "</ul>";
		foreach (range(1, $numberOfPages) as $key => $value) {
			$isActive = $this->setActivePage($value);
			$result .= "<li><a class='pagination__item " . $isActive . "' href='news.php?page=" . $value . "'/>" . $value . "</a></li>";
		}
		return $resultStart . $result . $resultEnd;
	}
	private function setActivePage($page)
	{
		$uri = $_SERVER['REQUEST_URI'];
		$paramsField = explode('?', $uri)[1];
		$params = explode('=', $paramsField);
		if ($page == $params[1]) {
			return 'active';
		} else if ($page == 1 && empty($params[1])) {
			return 'active';
		}
	}
}
