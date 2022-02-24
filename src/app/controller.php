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

      if(!isset($_GET['page'])){
        $page=1;
      } else {
        $page=$_GET['page'];
      }
    }
    function requestResults($pageNumber){
      $result;
      if (gettype($pageNumber==="integer")){
        $result=$this->model.getCloseResults($pageNumber);
      } else {
        $result=$this->model.getAllResults();
      }
    }
    function renderFirstPage(){
      $firstPage=$this->model->getCloseResults(1)[0];
      $this->view->renderArticlesOnPage($firstPage);
    }
    function renderPage($pageNumber){
      if ($this->model.closeResult[$pageNumber]!==null){ //TODO ?
        $this->view->renderPage($pageNumber);
      } else {
        $this->model->getCloseResults($pageNumber);
        $page=$this->model->closeResults[$pageNumber];
        $this->view->renderPage($pageNumber);
      }
    }
    
}