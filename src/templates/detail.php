<div class="content">
  <div class="news">
    <div div class='news__header'>
      <h1 class="news__title"><?= $title ?></h1>
    </div>
    <div class="news__content">
      <div class="news__items"> 
        <div class='article'>
          <div class=article__content'>
            <div class='article__text'> 
              <?= $content ?> 
            </div>
          </div> 
        </div>
      </div>
      <div class="news__pagination">
        <a href='<?= $_SERVER['HTTP_REFERER'] ?>' class='article__home-link'>Все новости >></a>
      </div>
    </div>
  </div>
</div>
