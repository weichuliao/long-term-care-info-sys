<?php
/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\ThemeAsset;
use yeesoft\models\Menu;
use yeesoft\widgets\LanguageSelector;
use yeesoft\widgets\Nav as Navigation;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yeesoft\comment\widgets\RecentComments;
use common\models\MySet;

Yii::$app->assetManager->forceCopy = true;
AppAsset::register($this);
ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <?= Html::csrfMetaTags() ?>
  <?= $this->renderMetaTags() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="/img/taiwan.png" type="image/x-icon">
   <!-- $this->head() -->
  <!-- <title>Home</title> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css" type="text/css"><!--壓過的 含bootstrap4.css-->
  <link rel="stylesheet" href="/css/main.css" type="text/css"> <!-- 用來修改的-->
</head>
<body>
<?php $this->beginBody() ?>
<section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">



  <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
          </div>
      </button>
      <div class="menu-logo">
          <div class="navbar-brand">
              <span class="navbar-logo">
                  <a href="#">
                       <!-- <img src="assets/images/logo2.png" alt="Mobirise" style="height: 3.8rem;"> -->
                  </a>
              </span>
              <span class="navbar-caption-wrap">
                  <a class="navbar-caption display-4" href="<?= MySet::urlHead(false)?>">
                      RanDian
                  </a>
              </span>
          </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                  <a class="nav-link link t display-4 nowrap" href="#">
                      <!-- <i class="fas fa-hands"></i>&nbsp; -->
                      Organisasi Kerjasama
                  </a>
              </li>
          </ul>
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                  <a class="nav-link link  display-4 nowrap" href="#">
                      <!-- <i class="fas fa-handshake"></i>&nbsp; -->
                      Informasi
                  </a>
              </li>
          </ul>
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                  <a class="nav-link link display-4 nowrap" href="#">
                      <!-- <i class="far fa-newspaper"></i>&nbsp; -->
                      Tentang Kami
                  </a>
              </li>
          </ul>

          <!-- <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                  <a class="nav-link link display-4 nowrap" href="#">
                  登入
                  </a>
              </li>
          </ul> -->

          <!-- <label class="search">
              <i class="fas fa-search"></i>
              <input type="text" placeholder="&nbsp;&nbsp;依關鍵字搜尋" />
          </label> -->

          <div style="margin:10px; text-align: center;">
              <img src="img/taiwan.png" alt="taiwan" style="width:48px; height: auto !important;">
          </div>



      </div>
  </nav>
</section>
<?= $content ?>
<section once="footers" class="cid-rm9Ttx12G6" id="footer7-k" style="background-color: #ffffff;color:black !important">
    <div class="container">
        <div class="media-container-row align-center ">
            <div class="row row-links align-left">
                <!-- <ul class="foot-menu">
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class=" mbr-bold" href="#" target="_blank">異業合作</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class=" mbr-bold" href="#" target="_blank">關於燃點</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class=" mbr-bold" href="#" target="_blank">聯絡我們</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class=" mbr-bold" href="#" target="_blank">隱私權政策</a>
                    </li>
                </ul> -->
                <div class="social-list align-right pb-2">

                    <div class="soc-item" style="color:#000000">Ikuti Kami</div>
                    <div class="soc-item">

                        <a href="#" target="_blank">
                            <img src="img/001-facebook.png" alt="Facebook" class="footer-img">
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <img src="img/002-youtube.png" alt="YouTube" class="footer-img">
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <img src="img/003-instagram.png" alt="Instagram" class="footer-img">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style  align-center display-7" style="color:#FF5C5C">
                    © 2019 燃點優護 Co., Ltd. All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>

    <script src="/js/bundle.js"></script><!-- 壓過的 含jquery bootstrap4.js -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
