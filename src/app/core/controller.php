<?php
  class Controller {
    public $resultsPerPage;
    public $model;
    public $view;

    function __construct($resultsPerPag){
      $this->view = new View();
      $this->model=new Model($resultsPerPage);
      $this->resultsPerPage=$resultsPerPage;
    }
    function init(){
      $this->model->connect();
    }
    static function renderPage(){
      $uri=$_SERVER['REQUEST_URI'];
      $paramsField = explode('?', $uri)[1];
      $params=explode('=',$paramsField);
      if(strpos($uri,'news')){
        echo 'rendering news';
        $this->renderNews($paramsField,$params);
    } elseif(strpos($uri,'view')) {
          echo 'rendering full article';
          $this->renderFullArticle($paramsField,$params);
    } 
      }
    
    function renderPagination(){
      $numberOfPages=floor($this->model->getAllResults()['numberOfPages']);
      $this->view->renderPagination($numberOfPages);
    }

    private function renderNews($paramsField,$params){
      $pageNumber;
      $pageNumber=$params[1];
      if(empty($pageNumber)){
        $pageNumber=1;
      }
      $page=$this->model->closeResults[$pageNumber];
      if ($page!==null){ 
        $this->view->renderArticlesOnPage($page);
      } else {
        $page=$this->model->getAllResults($pageNumber)['result'][$pageNumber];
        $this->view->renderArticlesOnPage($page);
      }
    }
    private function renderFullArticle($paramsField,$params){
      $articleId=$params[1];
      $pageNumber=floor($articleId/5);
      $article=$this->model->getAllResults()['result'][$pageNumber][$articleId];
      $this->view->renderFullArticle($article);
    }
    private function render(){
      include 'D:\programfiles\openserver\openserver\domains\techart\news.php';
    }



}