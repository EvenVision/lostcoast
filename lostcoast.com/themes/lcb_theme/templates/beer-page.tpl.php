<?php print $beer_header; ?>
<!-- beers section -->
<div class="beers">
  <div class="container">
    <div class="beers-info">
      <?php foreach($beers AS $beer): ?>
        <div class="beer-box" id="<?php print drupal_clean_css_identifier($beer['title']); ?>">
          <a href="#<?php print drupal_clean_css_identifier($beer['title']); ?>" class="opener open-link">
            <img class="js-reflect-image" src="<?php print $beer['img']; ?>" alt="<?php print $beer['title']; ?>" width="116" height="349">
          </a>
          <div class="slide">
            <h2><?php print $beer['title']; ?></h2>
            <div class="text-holder">
              <h3>ABV <?php print $beer['abv']; ?></h3>
              <?php print $beer['body']; ?>
              <?php print $beer['links']; ?>
            </div>
            <a href="#" class="opener close-link"><span class="sr-only">close this window</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
