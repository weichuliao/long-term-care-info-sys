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
    <?= $this->head() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="/img/taiwan.png" type="image/x-icon">
    <!-- <title>Home</title> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" type="text/css"><!--壓過的 含bootstrap4.css-->
    <link rel="stylesheet" href="/css/main.css" type="text/css"> <!-- 用來修改的-->

    <?php if (false): ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T4HBJTC');</script>
        <!-- End Google Tag Manager -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143384628-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-143384628-1');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '1840392499583214');
                fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=1840392499583214&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    <?php endif; ?>

</head>

<body>

<?php if (false): ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T4HBJTC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php endif; ?>

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
                    <!-- <a class="navbar-caption display-4" href="<?= MySet::urlHead(false)?>"> -->
                    <a class="navbar-caption display-4" href="/">
                        燃點優護
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link t display-4 nowrap" href="<?= MySet::urlHead()?>/platformservice">
                        <!-- <i class="fas fa-hands"></i>&nbsp; -->
                        平台特色
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link  display-4 nowrap" href="<?= MySet::urlHead()?>/agent">
                        <!-- <i class="fas fa-handshake"></i>&nbsp; -->
                        合作機構
                    </a>
                </li>
            </ul>

            <?php if (false): ?>
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                        <a class="nav-link link display-4 nowrap" href="<?= MySet::urlHead()?>/media">
                            <!-- <i class="far fa-newspaper"></i>&nbsp; -->
                            媒體報導
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link display-4 nowrap" href="<?= MySet::urlHead()?>/blog">
                        <!-- <i class="fab fa-blogger"></i>&nbsp; -->
                        部落格
                    </a>
                </li>
            </ul>
             <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link display-4 nowrap" href="<?= MySet::urlHead()?>/aboutus">
                        <!-- <i class="fas fa-users"></i>&nbsp; -->
                        關於我們
                    </a>
                </li>
            </ul>

            <?php if (false): ?>
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                        <a class="nav-link link display-4 nowrap" href="#">
                        登入
                        </a>
                    </li>
                </ul>

                <label class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="&nbsp;&nbsp;依關鍵字搜尋" />
                </label>

                <div style="margin:10px; text-align: center;">
                    <img src="/img/taiwan.png" alt="Taiwan" style="width:48px; height: auto !important;">
                </div>
            <?php endif; ?>

        </div>
    </nav>
</section>
<?= $content ?>
<section once="footers" class="cid-rm9Ttx12G6" id="footer7-k" style="background-color: #ffffff;color:black !important">
    <div class="container">
        <div class="media-container-row align-center ">
            <div class="row row-links align-left">
                <div class="social-list align-right pb-2">

                    <div class="soc-item" style="color:#000000">追蹤我們</div>
                    <div class="soc-item">

                        <a href="#" target="_blank">
                            <img src="/img/001-facebook.png" alt="Facebook" class="footer-img">
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <img src="/img/002-youtube.png" alt="YouTube" class="footer-img">
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="#" target="_blank">
                            <img src="/img/003-instagram.png" alt="Instagram" class="footer-img">
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
