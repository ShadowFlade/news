<head>
  <link rel="stylesheet" href="/style.css">
</head>
<div class="content">
  <div class="news">
    <div div class='news__header'>
      <h1 class="news__title"><?= $title ?></h1>
    </div>
    <div class="news__content">
      <div class="news__items">

      <?php foreach ($data['content'] as $article) { ?>
          <div class='article'>
            <div class=article__content'>
              <div class='article__header'>
                <div class='article__date'> 
                  <?= $article['date'] ?>  
                </div>
                <a class='article__title' href='/news/<?= $article['id'] ?>'>
                  <?= $article['title'] ?>
                </a>
              </div>
              <div class='article__text'>
                <?= $article['announce'] ?> 
              </div>
            </div>
          </div>
      <?php } ?>

      </div>
      <div class="news__pagination">
        <div class="pagination">
          <div class='pagination__title'>Страницы:</div>
            <ul class='pagination__list'>

              <?php foreach (range(1, $data['pagination']) as $key => $value) { ?>
              
              <li class = 'pagination__item <?= $value == $pageNumber ? 'active' : false ?>'>
                <a href = "/news/page-<?= $value ?>/">
                  <?= $value ?> 
                </a>
              </li>

              <?php } ?> 

            </ul>
        </div>
      </div>
    </div>
  </div>
</div>
