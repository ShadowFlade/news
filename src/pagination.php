<?php
require_once 'app/model.php';
require_once 'app/view.php';
require_once 'app/controller.php';
class Pagination {
  function __construct($resultsPerPage,$pageRange){
    $this->resultsPerPage=$resultsPerPage;
    $this->pageRange=$pageRange;

  }

   function start(){
    $routes=explode('/',$_SERVER['REQUEST_URI']);
    $this->controller=new Controller($this->resultsPerPage,$this->pageRange);
    $this->controller->init();
  }
  function renderFirstPage(){
    $this->controller->renderFirstPage();
  }
  function renderPagination(){
    $this->controller->renderPagination();
  }
}