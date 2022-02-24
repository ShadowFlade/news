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
      $paramsField = explode('?', $_SERVER['REQUEST_URI'])[1];
      $params=explode('=',$paramsField);
      $pageNumber=$params[1];
      $page=$this->model->closeResults[$pageNumber];
      if ($page!==null){ 
        $this->view->renderArticlesOnPage($page);
      } else {
        // print_r($this->model->getAllResults($pageNumber));
        $page=$this->model->getAllResults($pageNumber)['result'][$pageNumber];
        $this->view->renderArticlesOnPage($page);
      }
    }
    function renderPagination(){
      $numberOfPages=floor($this->model->getAllResults()['numberOfPages']);
      $this->view->renderPagination($numberOfPages);
    }
    // function requestResults($pageNumber){
    //   $result;
    //   if (gettype($pageNumber==="integer")){
    //     $result=$this->model.getCloseResults($pageNumber);
    //   } else {
    //     $result=$this->model.getAllResults();
    //   }
    // }
    // function renderFirstPage(){
    //   $firstPage=$this->model->getCloseResults(1)[0];
    //   $this->view->renderArticlesOnPage($firstPage);
    // }


}