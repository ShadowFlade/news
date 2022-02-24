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
    $pages=array();
    $page=array();
    $i=0;
    $pageCount=$start;
    while($row=mysqli_fetch_array($result)){
      $article=array(
        'id'=>$row['id'],
        'date'=>gmdate("d.m.Y", $row['idate']),
        'title'=>$row['title'],
        'announce'=>$row['announce'],
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
  function getAllResults(){
    $sql="SELECT * FROM news";
    $result=mysqli_query($this->con,$sql);
    $numberOfResults=mysqli_num_rows($result);
    $numberOfPages=$numberOfResults / $this->resultsPerPage;
    $this->allResults=$result;
    $this->numberOfPages=$numberOfPages;
    return array(
      'result'=>$result,
      'numberOfPages'=>$numberOfPages
    );
  }


}