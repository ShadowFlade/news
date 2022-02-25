<?php
class Model {
  public $resultsPerPage;
  public $pageRange;
  function __construct($resultsPerPage,$pageRange){
    $this->resultsPerPage=$resultsPerPage;
    $this->pageRange=$pageRange;
  }
  function connect(){
    $this->con= mysqli_connect('localhost','root','root');
    mysqli_select_db($this->con,'news');
    $this->getAllResults();
  }
  function getAllResults(){
    $sql="SELECT * FROM news ORDER BY idate DESC";
    $result=mysqli_query($this->con,$sql);
    $this->numberOfResults=mysqli_num_rows($result);
    $this->numberOfPages=$this->numberOfResults / $this->resultsPerPage;
    $this->allPages=array();
    $this->allArticles=array();
    $page=array();
    $articleCount=1;
    $pageCount=1;
    while($row=mysqli_fetch_array($result)){
      $article=array(
        'id'=>$row['id'],
        'date'=>gmdate("d.m.Y", $row['idate']),
        'title'=>$row['title'],
        'announce'=>$row['announce'],
        'content'=>$row['content']
      );
      $this->allArticles[$article['id']]=$article;
      $page[$article['id']]=$article;
      $articleCount++;
      if ($articleCount % $this->resultsPerPage === 0){
        $this->allPages[$pageCount]=$page;
        $pageCount++;
        $page=null;
      }
    }
    return array(
      'result'=>$this->allPages,
      'numberOfPages'=>$this->numberOfPages
    );
  }


}