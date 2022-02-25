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
    $this->controller=new Controller($this->resultsPerPage,$this->pageRange);
    $this->controller->init();
  }
  function renderPage(){
    $this->controller->renderPage();
  }
  function renderFirstPage(){
    $this->controller->renderFirstPage();
  }
  function renderPagination(){
    $this->controller->renderPagination();
  }
}
$pagination=new Pagination(5,5);
$pagination->start();
$pagination->renderPage();