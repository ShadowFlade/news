<?php
class ControllerMain extends Controller {
  function actionMain(){
    $this->view->generate();
  }
}