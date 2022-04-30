<?php
// require_once('NewsView.php');
// require_once('NewsModel.php');

class NewsController
{
	public $model;
	public $view;

	const RESULTS_PER_PAGE = 5;

	function __construct()
	{
		$this->view = new NewsView();
		$this->newsModel = new NewsModel(self::RESULTS_PER_PAGE);
	}

	public function renderList($pageNumber)
	{
		if (empty($pageNumber)) {
			//тут мб выдаст ошибку, изменить на boolval
			$pageNumber = 1;
		}
		$rows = NewsModel::getRows($pageNumber, self::RESULTS_PER_PAGE);
		$numberOfPages = floor(NewsModel::getCount() / self::RESULTS_PER_PAGE);
		$data = [
			'content' => $rows,
			'pagination' => $numberOfPages,
			'pageNumber' => $pageNumber,
		];

		if (empty($data['title'])) {
			$data['title'] = 'Новости';
		}
		$this->view->generate( $data,'list.php');
	}

	public function renderDetail($articleId)
	{
		$data = NewsModel::getItem($articleId);
		$this->view->render('detail.php', $data);
	}
	public function renderMainPage()
	{
		$this->view->renderMain('main-page/main-page.php');
	}
}
