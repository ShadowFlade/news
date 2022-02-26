<?php
require_once 'app/model.php';
require_once 'app/view.php';
require_once 'app/controller.php';
class Pagination {
  function __construct($resultsPerPage){
    $this->resultsPerPage=$resultsPerPage;
  }
   function start(){
    $this->controller=new Controller($this->resultsPerPage);
    $this->controller->init();
  }
  function renderPage(){
    $this->controller->renderPage();
  }
}
$pagination=new Pagination(5,5);
$pagination->start();
$pagination->renderPage();