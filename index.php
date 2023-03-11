<?php 
    require_once "config.php";
    require_once "models/Article.php";
    require_once "libs/AuthenticateUser.php";

    $artikujt=Article::getList();
    ?>
 
 <header id="header"><?php include 'header.php'?></header>
    <div class="main">
      <img src="images/background_2.jpg" alt="">
      <div class="content">
        <h1><a href="#wrapper">SHOP NOW</a></h1></a>
        <p>UP TO 50% OFF</p>
      </div>
    </div>
    <div>
      <video autoplay muted loop="true">
        <source
          src="https://static.zara.net/video///mkt/2021/12/aw21-happy-new-year-subhomes/subhome-xmedia-video-52-2/w/1808//large-landscape/subhome-xmedia-video-52-2_0.mp4?ts=1640882484837"
          type="video/mp4"
        />
      </video>
      <div class="wrapper" id="wrapper">
        <div class="static-txt">50% OFF FOR</div>
        <ul class="dynamic-txts">
          <li><span>MEN</span></li>
          <li><span>WOMEN</span></li>
          <li><span>KIDS</span></li>
        </ul>
      </div>
    </div>
    <section class="product" id="products">
      <button class="pre-btn"><img src="images/arrow.png" alt="" /></button>
      <button class="nxt-btn"><img src="images/arrow.png" alt="" /></button>
      <div class="product-container">
      <?php foreach ($artikujt as $i => $articleT){?>
        <div class="product-card">
          <div class="product-image">
            <span class="discount-tag"><?php echo $articleT->priceoff?> % OFF</span>
            <img src="<?php echo $articleT->foto; ?>" class="product-thumb" alt="" />
            <button class="card-btn">add to wishlist</button>
          </div>
          <div class="product-info">
            <h2 class="product-brand"><?php echo $articleT->titulli; ?></h2>
            <p class="product-short-description">
            <?php echo $articleT->pershkrimi; ?>
            </p>
            <span class="price">$<?php echo $articleT->cmimi; ?></span><span class="actual-price">$<?php echo $articleT->olderprice?>$</span>
          </div>
        </div>
        <?php }?>
    </section>
    <footer id="footer"><?php include 'footer.php'?></footer>
    <script src="script/slider.js"></script>
