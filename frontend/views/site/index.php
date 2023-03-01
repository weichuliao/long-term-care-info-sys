<?php
use common\models\MySet;
use yeesoft\post\models\Post;

// 首頁 - 燃點案例
$key = 'agent_stories';
if (Yii::$app->cache->exists($key)) {
    $agent_stories = Yii::$app->cache->get($key);
} else {
    $agent_stories = Post::find()->where(['status' => Post::STATUS_PUBLISHED, 'category_id' => Post::CATE_AGENT, 'language' => Post::LANGUAGE_ZH])->orderBy('published_at DESC')->limit(3)->all();
    Yii::$app->cache->set($key, $agent_stories, 3600);
}

// 首頁 - 熱門文章
$key = 'newest_articles';
if (Yii::$app->cache->exists($key)) {
    $newest_articles = Yii::$app->cache->get($key);
} else {
    $newest_articles = Post::find()->where(['status' => Post::STATUS_PUBLISHED, 'category_id' => Post::CATE_ISSUE, 'language' => Post::LANGUAGE_ZH])->orderBy('published_at DESC')->limit(3)->all();
    Yii::$app->cache->set($key, $newest_articles, 3600);
}
?>

<!-- <section class="engine"><a href="#"></a></section> -->
<section class="mbr-section article content9 cid-rm9SU3HRgT" id="content9-g">
    <?php  $scrolingText = new frontend\widgets\ScrollingText;
           echo $scrolingText->run();?>
</section>


<?php if (sizeof($agent_stories) > 0): ?>
<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="container">
        <!-- <div class="media-container-row"> -->
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                <blockquote><strong>燃點案例</strong><span>聆聽更多人的故事</span></blockquote>
            </div>
        <!-- </div> -->
    </div>
</section>

<section class="cid-rm9TEECp7V" id="content13-m">

    <div class="container">
        <div class="media-container-row" style="width: 90%; max-width: 992px"><!--限寬-->

            <?php $first = $agent_stories[0]; ?>
            <div class="img-item item1" style="width: 179%;">
                <a href="<?=MySet::urlHead()?>/article/<?=$first->slug?>">
                    <img src="<?=$first->thumbnail?>" alt="<?=$first->title?>" <?=MySet::IMG404?>>
                    <div class="img-caption">
                        <p class="mbr-fonts-style align-center mbr-black display-9">
                            <?=$first->title?>
                        </p>
                    </div>
                </a>
            </div>

            <div class="img-item" >
                <?php for ($i = 1; $i < sizeof($agent_stories); $i++) { ?>
                    <div class="img-item">
                        <a href="<?=MySet::urlHead()?>/article/<?=$agent_stories[$i]->slug?>">
                            <img src="<?=$agent_stories[$i]->thumbnail?>" alt="<?=$agent_stories[$i]->title?>" <?=MySet::IMG404?>>
                            <div class="img-caption img-item-bottom-text">
                                <p class="mbr-fonts-style align-center mbr-black display-9">
                                    <?=$agent_stories[$i]->title?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>


<?php if (sizeof($newest_articles) > 0): ?>
<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="container">
        <!-- <div class="media-container-row"> -->
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                <blockquote><strong>熱門文章</strong><span>燃點帶你了解產業現況</span></blockquote>
            </div>
        <!-- </div> -->
    </div>
</section>


<section class="cid-rm9TEECp7V" id="content13-m">

    <div class="container">
        <div class="media-container-row" style="width: 90%; max-width: 992px"><!--限寬 bootstap 992-->

            <?php $first = $newest_articles[0]; ?>
            <div class="img-item item1" style="width: 179%;">
                <a href="<?=MySet::urlHead()?>/article/<?=$first->slug?>">
                    <img src="<?=$first->thumbnail?>" alt="<?=$first->title?>" <?=MySet::IMG404?>>
                    <div class="img-caption">
                        <p class="mbr-fonts-style align-center mbr-black display-9">
                            <?=$first->title?>
                        </p>
                    </div>
                </a>
            </div>

            <div class="img-item" >
                <?php for ($i = 1; $i < sizeof($newest_articles); $i++) { ?>
                    <div class="img-item">
                        <a href="<?=MySet::urlHead()?>/article/<?=$newest_articles[$i]->slug?>">
                            <img src="<?=$newest_articles[$i]->thumbnail?>" alt="<?=$newest_articles[$i]->title?>" <?=MySet::IMG404?>>
                            <div class="img-caption img-item-bottom-text">
                                <p class="mbr-fonts-style align-center mbr-black display-9">
                                    <?=$newest_articles[$i]->title?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>


<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="container">
        <!-- <div class="media-container-row"> -->
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
                <blockquote><strong>關於燃點</strong><span>燃點為你帶來價值</span></blockquote>
            </div>
        <!-- </div> -->
    </div>
</section>


<section class="features1 cid-rm9TJjYLih" id="features1-o">
    <div class="container">
        <div class="media-container-row">

            <div class="card p-3 col-12 col-md-6 col-lg-6" style="height:300px">
                <div class="card-img card-img-bg">
                    <img src="/img/li-home.png" alt="照護需求" <?=MySet::IMG404?>>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5 text-left">
                        照護需求
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-8 text-left">
                        燃點優護，點燃您的長期照護，優化您的居家照護。
                        <ul class="mbr-text">
                            <li type="1">第三方把關外勞品質</li>
                            <li type="1">轉介承接都一手包辦</li>
                            <li type="1">評價讓家庭看到實例</li>
                        </ul>
                    </p>
                </div>
                <div class="mbr-section-btn text-center w-100">
                    <a href="<?=MySet::urlHead()?>/platformservice" class="btn btn-4 display-4" style="padding: 5px 10%;">
                        進一步暸解燃點服務
                    </a>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-6" style="height:300px">
                <div class="card-img card-img-bg">
                    <img src="/img/li-image.png" alt="仲介參與" <?=MySet::IMG404?>>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5 text-left">
                        仲介參與
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-8 text-left">
                        除了口碑行銷之外，不曉得該如何讓更人暸解自身仲介服務，或是拓展族群，想了解燃點上架合作方式？
                    </p>

                </div>
                <div class="mbr-section-btn text-center w-100">
                    <a href="<?=MySet::urlHead()?>/aboutus" class="btn btn-4 display-4" style="padding: 5px 10%;">
                        進一步暸解合作方式
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="container">
        <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
            <blockquote><strong>平台特色</strong><span>認識燃點三大特色</span></blockquote>
        </div>
    </div>
</section>

<section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
        <div class="container px-5">
            <div class="media-container-row row">

                <div class="card p-3 col-12 col-md-6 col-lg-4" style="height:380px;">
                    <div class="card-wrapper py-5">
                        <div class="card-img card-img-index rounded mx-auto d-block" style="height: 100px">
                            <img src="/img/handshake.png" alt="媒合需求" style="width:90px" <?=MySet::IMG404?>>
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-5 text-center">
                                媒合需求
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                燃點為家庭於仲介的媒和平台，透過媒合量表分數，為家庭在茫茫仲介中找外勞。
                            </p>
                        </div>
                        <div class="mbr-section-btn text-center btn-5">
                            <a href="<?=MySet::urlHead()?>/service/1" class="btn btn-4 display-4">
                                立即媒合
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-6 col-lg-4" style="height:380px;">
                    <div class="card-wrapper py-5">
                        <div class="card-img card-img-index rounded mx-auto d-block" style="height: 100px">
                            <img src="/img/rating.png" alt="評價系統" style="width:80px" <?=MySet::IMG404?>>
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-5 text-center">
                                評價系統
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                設有家庭與仲介互相機制，雙方都能表達自身意見，幫助雇傭合作更為順暢。
                            </p>
                        </div>
                        <div class="mbr-section-btn text-center btn-5">
                            <a href="<?=MySet::urlHead()?>/service/2" class="btn btn-4 display-4">
                                暸解評價
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-6 col-lg-4" style="height:380px;">
                    <div class="card-wrapper py-5">
                        <div class="card-img card-img-index rounded mx-auto d-block" style="height: 100px">
                            <img src="/img/search.png" alt="資訊透明" style="width:70px" <?=MySet::IMG404?>>
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-5 text-center">
                                資訊透明
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                流通詳實資訊的照護系統，收羅您最想暸解的長期訊息。<br><br>
                            </p>
                        </div>
                        <div class="mbr-section-btn text-center btn-5">
                            <a href="<?=MySet::urlHead()?>/service/3" class="btn btn-4 display-4">
                                了解更多
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="container">
        <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7">
            <blockquote><strong>聯絡我們</strong><span>與我們進一步聯繫</span></blockquote>
        </div>
    </div>
</section>


<section class="mbr-section content6 cid-rm9TDZkYCb" id="content6-l">

    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-10">
                <div class="media-container-row">
                    <div class="mbr-figure" style="width: 60%;">
                      <img src="/img/background1.jpg" alt="" <?=MySet::IMG404?>>
                    </div>
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-5">
                                <h4 class="card-title mbr-fonts-style display-5 mx-2" style="font-weight: 400">
                                    <i class="fas fa-phone" style="color:#e89f41"></i>&nbsp;0926-500862
                                </h4>
                                <h4 class="card-title mbr-fonts-style display-5 mx-2" style="font-weight: 400">
                                    <i class="far fa-envelope" style="color:#e89f41"></i>&nbsp;yuanjh773@gmail.com
                                </h4>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
