<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="nullstyle.css">
  <link rel="stylesheet" href="style.css">
  <script src="index.js"></script>
  <title>Document</title>
</head> 
<body class='page'>
  <div class="content">
    <div class="news">
      <div div class='news__header'>
        <h1 class="news__title">
          <?php
            echo $data['title'];
          ?>
        </h1>
      </div>
      <div class="news__content">
        <div class="news__items">
        <?php

          echo $data['content'];
        ?>
        </div>
        <div class="news__pagination">
          <div class="pagination__title">
            Страницы:
          </div>
          <ul class="pagination">
          <?php
            echo $data['pagination'];
          ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
</html>