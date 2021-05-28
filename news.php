<?php include_once "inc/header.php"; ?>
<?php require "./classes/crawl.php" ?>

<?php
$html =  file_get_html("https://www.techrum.vn");
$getPosts = $html->find("div.block-container.porta-article-container");
$posts = [];
for ($i =  0; $i < 2; $i++) {
  $post = [];
  $post["title"] = trim($getPosts[$i]->find("h2.block-header a", 0)->innertext);
  $post["href"] = trim($getPosts[$i]->find("h2.block-header a", 0)->href);
  $post["author"] = trim($getPosts[$i]->find("ul.listInline.listInline--bullet a.u-concealed", 0)->innertext);
  $post["time"] = trim($getPosts[$i]->find("ul.listInline.listInline--bullet a.u-concealed time.u-dt", 0)->innertext);
  $post["view"] = trim($getPosts[$i]->find("div.message-attribution-opposite ul.listInline.listInline--bullet li", 0)->plaintext);
  $post["image"] = trim($getPosts[$i]->find("div.bbWrapper img", 0)->src);
  $post["content"] = trim($getPosts[$i]->find("div.bbWrapper ", 0)->plaintext);
  $posts[] = $post;
}
?>
</div>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="news.php">Tin tức</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Error 404 Area Start -->
<div class="error404-area ptb-60 ptb-sm-60">
  <div class="container">
    <?php
    foreach ($posts as $post) {
    ?>
      <div class="row row-news">
        <a target="_blank" href="https://www.techrum.vn<?php echo $post["href"] ?>">
          <img src="<?php echo $post["image"] ?>" alt="">
        </a>
        <div class="box-post-content">
          <a target="_blank" class="post-title" href="https://www.techrum.vn<?php echo $post["href"] ?>">
            <?php echo $post["title"] ?></a>
          <p class="post-content"> <?php echo $post["content"] ?></a></p>
          <div class="post-info">
            <p class="post-info-item post-author">Tác giả: <?php echo $post["author"] ?></a></p>
            <p class="post-info-item post-time">Thời gian: <?php echo $post["time"] ?></a></p>
            <p class="post-info-item post-view">Lượt xem: <?php echo $post["view"] ?></a></p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>
<!-- Error 404 Area End -->
<?php include_once "inc/footer.php"; ?>

<script type="text/javascript">
  document.title = "Tin tức";
</script>