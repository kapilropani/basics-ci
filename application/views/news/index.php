<h2><?php echo $title; ?></h2>

<?php if(sizeof($news) > 0){ ?>
  <?php foreach ($news as $news_item): ?>

      <h3><?php echo $news_item['title']; ?></h3>
      <div class="main">
        <?php echo $news_item['text']; ?>
      </div>
      <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
  <?php endforeach; ?>
<?php }else{ echo "<h2>No Post Found! </h2>"; } ?>