<?php
require_once 'model.php';
require_once 'view.php';

  class Controller {
    public $resultsPerPage;
    public $pageRange;
    public $model;
    public $view;

    function __construct($resultsPerPage,$pageRange){
      $this->view = new View();
      $this->model=new Model($resultsPerPage,$pageRange);
      $this->resultsPerPage=$resultsPerPage;
      $this->pageRange=$pageRange;
    }
    function init(){
      $this->model->connect();
    }
    function renderPage(){
      $uri=$_SERVER['REQUEST_URI'];
      $paramsField = explode('?', $uri)[1];
      $params=explode('=',$paramsField);
      if(strpos($uri,'news')){
        $this->view->generate($this->renderNews($paramsField,$params));
      } 
      elseif(strpos($uri,'view')) {
        $this->view->generate($this->renderFullArticle($paramsField,$params));
      } 
      else {

        }
      }
    
    function renderPagination(){
      $numberOfPages=floor($this->model->getAllResults()['numberOfPages']);
      return $this->view->renderPagination($numberOfPages);
    }
    private function renderNews($paramsField,$params){
      $pageNumber;
      $pageNumber=$params[1];
      if(empty($pageNumber)){
        $pageNumber=1;
      }
      $page=$this->model->closeResults[$pageNumber];
      $data;
      if ($page!==null){ 
        $data=array('content'=>$this->view->renderArticlesOnPage($page),'pagination'=>$this->renderPagination());
      } else {
        $page=$this->model->getAllResults($pageNumber)['result'][$pageNumber];
        $data=array('content'=>$this->view->renderArticlesOnPage($page),'pagination'=>$this->renderPagination());
      }
      return $data;
    }
    private function renderFullArticle($paramsField,$params){
      $articleId=$params[1];
      $pageNumber=floor($articleId/5);
      $article=$this->model->getAllResults()['result'][$pageNumber][$articleId];
      $data=array(
        'content'=>$this->view->renderFullArticle($article),
        'pagination'=>$this->renderPagination(),
        'title'=>$article['title']);
      return $data;

    }
}