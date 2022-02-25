<?php
class ControllerNews extends Controller {
  function actionMain(){
    $this->view->generate('news.php','templateView.php');
  }
}