<?php
class Model {
  public $resultsPerPage=5;
  public $pageRange=5;//amount of pages loaded at once
  // private allResults=array();
  function connect(){
    $this->con= mysqli_connect('localhost','root','root');
    mysqli_select_db($this->con,'news');
  }
  public function getCloseResults($thePage){
    $start=$resultPerPage*($thePage-5);
    $end=$resultPerPage*($thePage+5);
    $sql="SELECT * FROM news WHERE id BETWEEN $start * $end";
    $result=mysqli_query($this->con,$sql);
    $number_of_results=mysqli_num_rows($result);
    $toReturn=array();
    $pageToInclude=array();
    $i=0;
    $pageCount=$start;
    while($row=mysqli_fetch_array($result)){
      $article=array(
        'date'=>gmdate("d.m.Y", $row['idate']),
        'title'=>$row['announce'],
        'content'=>$row['content']
      );
      $pageToInclude["$i"]=$article;
      $i++;
      if (i % $this->resultPerPage === 0){
        $toReturn["$pageCount"]=$pageToInclude;
      }
      $pageCount++;
    }
    $closeResults=$toReturn;
  }

}