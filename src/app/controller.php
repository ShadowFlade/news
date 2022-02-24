<?php
require_once 'model.php';
require_once 'view.php';

  class Controller {
    public $model;
    public $view;
    public $resultsPerPage;
    public $pageRange;
    function __construct(){
      $this->view = new View();
      $this->model=new Model($resultsPerPage,$pageRange);
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
    function renderPage($pageNumber){
      if ($this->model.closeResult[$pageNumber]!==null){
        $this->view->renderPage($pageNumber);
      } else {
        $this->model->getCloseResults($pageNumber);
        $page=$this->model->closeResults[$pageNumber];
        $this->view->renderPage($pageNumber);
      }
    }
    
}