<?php
$SelSql = "SELECT * FROM news_and_notification";
$res = $dbConn->executeQuery($SelSql);
$num_of_rows = mysqli_num_rows($res);
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php
    if ($num_of_rows > 0) {
      // output data of each row
      while ($num_of_rows > 0) {
        $num_of_rows--;
        $r = mysqli_fetch_assoc($res);           
        ?>
        <div class="carousel-item active">
          <img src="<?php echo $server; ?>ClientApp\Asset\images\news\<?php echo $r['image_name']; ?>" class="d-block w-100" width="500px">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $r['newsHeading'] ?></h5>
            <p><?php echo $r['newsBody'] ?></p>
          </div>
        </div>
        <?php
        
      }
    } else {
      echo "<p>No News Available</p>";
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>