<?php
use common\models\MySet;
use yeesoft\post\models\Post;

// 平台特色 - 機構故事
$key = 'agent_stories';
if (Yii::$app->cache->exists($key)) {
    $agent_stories = Yii::$app->cache->get($key);
} else {
    $agent_stories = Post::find()->where(['status' => Post::STATUS_PUBLISHED, 'category_id' => Post::CATE_AGENT, 'language' => Post::LANGUAGE_ZH])->orderBy('published_at DESC')->limit(20)->all();
    Yii::$app->cache->set($key, $agent_stories, 3600);
}
?>

<!-- <section class="engine"><a href="#"></a></section> -->
<section class="mbr-section article content9 cid-rm9SU3HRgT" id="content9-g">
    <div class="bd-example">
        <div class="container">
            <div class="carousel slide" data-ride="carousel" id="carousel-demo">
                    <ol class="carousel-indicators">
                          <li data-target="#carousel-demo" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-demo" data-slide-to="1"></li>
                          <li data-target="#carousel-demo" data-slide-to="2"></li>
                    </ol>
                  <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://www.taiwan.net.tw/att/1/big_scenic_spots/pic_412_8.jpg" alt="" <?=MySet::IMG404?>>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://farm4.staticflickr.com/3795/9269794168_3ac58fc15c_b.jpg" alt="" <?=MySet::IMG404?>>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.taiwan.net.tw/att/1/big_scenic_spots/pic_3266_19.jpg" alt="" <?=MySet::IMG404?>>
                        </div>

                        <a href="#carousel-demo" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a href="#carousel-demo" class="carousel-control-next" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                  </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-rm9T0BpA4e mb-5" id="content2-h">
    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <!-- <hr class="line" style="width: 25%;"> -->
            <div class="section-text align-center mbr-fonts-style display-5">
                <div class="section-text align-center mbr-fonts-style display-5">
                    <?php  $scrolingText = new frontend\widgets\ScrollingText;
                           echo $scrolingText->run();?>
                </div>
            </div>
            <!-- <hr class="line" style="width: 25%;"> -->
        </div>
    </div>
</section>

<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="row justify-content-center" style="">
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center div-hr-text">平台特色</div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

    </div>
</section>

<section class="cid-rm9TEECp7V" id="content13-m">

    <div class="container">
        <div class="media-container-row" style="width: 90%; max-width: 590px"><!--限寬-->
            <div class="service-text">家中有需要照護的家屬、親人，想要尋找專業照護者為親友提供照護嗎？ 或者，家中已經有專業照護者，未來想要尋找其他專業照護者嗎？燃點相 信每個家庭都值得專屬、專業的照護提供者，與全台多家照護機構合作， 希望暸解您的需求找到最適合的照護者。邀請您提供您的需求，未來也會 提供第一時間專業媒合。</div>
            <a href="<?=MySet::urlHead()?>/aboutus" class="btn display-7 btn-6" style="padding:5px 15px">
                立即填答
            </a>
        </div>

    </div>
</section>
<section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
        <div class="container px-3" style="width: 90%; max-width: 992px">
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
                                流通詳實資訊的照護系統，收羅您最想暸解的長期訊息。</br></br>
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

<?php if (sizeof($agent_stories) > 0): ?>
    <br><br>
    <section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
            <div class="row justify-content-center" style="">
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center div-hr-text">機構文章</div>
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

            </div>
    </section>

    <section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
            <div class="container px-5 pt-2">
                    <div class="media-container-row row py-2">

                        <?php foreach($agent_stories as $agent_story): ?>
                            <div class="card p-3 col-12 col-md-6 col-lg-4">
                                <div class="card-wrapper">
                                    <div class="card-img rounded mx-auto d-block">
                                        <a href="<?=MySet::urlHead()?>/article/<?=$agent_story->slug?>">
                                            <img src="<?=$agent_story->thumbnail?>" alt="<?=$agent_story->title?>" <?=MySet::IMG404?>>
                                        </a>
                                    </div>
                                    <a href="<?=MySet::urlHead()?>/article/<?=$agent_story->slug?>">
                                        <div class="card-box2">
                                            <h5><?=$agent_story->title?></h5>
                                            <p class="mbr-text mbr-fonts-style display-7">
                                                <?=trim(mb_substr(str_replace("\n",'',strip_tags($agent_story->content)),0,80,"UTF-8"))?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

    </section>
<?php endif; ?>
