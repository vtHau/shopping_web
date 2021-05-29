<?php include_once "inc/header.php"; ?>
<?php
include_once "./classes/crawldata.php";
$crawldata = new crawldata();
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
</div>
<div class="error404-area ptb-60 ptb-sm-60">
  <div class="container">
    <?php
    $posts = $crawldata->getNews();
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
<?php include_once "inc/footer.php"; ?>

<script type="text/javascript">
  document.title = "Tin tức";
</script>