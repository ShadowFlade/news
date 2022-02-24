<?php
class Model {
  public $resultsPerPage;
  public $pageRange;
  // private allResults=array();
  function __construct($resultsPerPage,$pageRange){
    $this->resultsPerPage=$resultsPerPage;
    $this->pageRange=$pageRange;
  }
  function connect(){
    $this->con= mysqli_connect('localhost','root','root');
    mysqli_select_db($this->con,'news');
  }
  public function getCloseResults($thePage){

    $start=$this->resultsPerPage*($thePage-5);
    if($start<0){
      $start=0;
    }
    $end=$this->resultsPerPage * ($thePage+5);
    $sql="SELECT * FROM news WHERE id BETWEEN $start AND $end";
    $result=mysqli_query($this->con,$sql);
    $number_of_results=mysqli_num_rows($result);
    $pages=array();
    $page=array();
    $i=0;
    $pageCount=$start;
    while($row=mysqli_fetch_array($result)){
      $article=array(
        'date'=>gmdate("d.m.Y", $row['idate']),
        'title'=>$row['announce'],
        'content'=>$row['content']
      );
      $page[$i]=$article;
      $i++;
      if ($i % $this->resultsPerPage === 0){
        $pages["$pageCount"]=$page;
        $pageCount++;
      }
    }
    $closeResults=$pages;
    return $closeResults;
  }

}