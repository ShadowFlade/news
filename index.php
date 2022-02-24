<?php

    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // $con= mysqli_connect('localhost','root','root');
    // mysqli_select_db($con,'news');
    // $results_per_page=10;
    // $sql='SELECT * FROM news';
    // $result=mysqli_query($con,$sql);
    // $number_of_results=mysqli_num_rows($result);
    // $number_of_pages=ceil($number_of_results/$results_per_page);
    
      // if(!isset($_GET['page'])){
      //   $page=1;
      // } else {
      //   $page=$_GET['page'];
      // }
















    //  $this_page_first_result=($page-1)*$results_per_page;
    //  $sql='SELECT * FROM news LIMIT ' . $this_page_first_result . ',' . $results_per_page;
    //  $result=mysqli_query($con,$sql);
    //  while($row=mysqli_fetch_array($result)){
    //    echo $row['id'] . ' ' . $row['content'] . '<br>';
    //  }

    // for($page=1;$page<=$number_of_pages;$page++){
    //   echo '<a href="index.php?page=' . $page . '">' .  $page  . '</a>';
    // }
    header("Location: news.php");

    ?>
