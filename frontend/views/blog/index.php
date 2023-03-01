<?php
use common\models\MySet;
use yeesoft\post\models\Post;

// 部落格 - 最新發佈
$key = 'newest_articles';
if (Yii::$app->cache->exists($key)) {
    $newest_articles = Yii::$app->cache->get($key);
} else {
    $newest_articles = Post::find()->where(['status' => Post::STATUS_PUBLISHED, 'category_id' => Post::CATE_ISSUE, 'language' => Post::LANGUAGE_ZH])->orderBy('published_at DESC')->limit(3)->all();
    Yii::$app->cache->set($key, $newest_articles, 3600);
}

// 部落格 - 機構故事
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
        <div class="row  justify-content-center align-items-center" style="background-size: cover;background-image: url(/img/blog-bg.jpg);min-height: 300px;">

            <div class="col-12 text-center" style="font-size:0.8rem">
                <label class="search text-center">
                    <i class="fas fa-search" style="font-size:2rem;left:50px"></i>
                    <input class="m-4" type="text" placeholder="&nbsp;&nbsp;搜尋想了解的資訊" style="font-size:1.4rem;border: 2.5px solid #FFED89;padding: 15px 45px;">
                </label>
                </br>
                已經鎖定某間機構，可直接輸入<span style="color:#FF8F5D">機構名稱</span>， </br>
                想初步暸解照護產業，輸入<span style="color:#FF8F5D">關鍵字</span>或點選下方熱門分類
            </div>
        </div>
        <!-- <img class='w-100' src="img/blog-bg.jpg" alt=""> -->
    </div>
</section>

<section class="mbr-section article content1 cid-rm9T0BpA4e mt-5" id="content2-h">
    <div class="row justify-content-center" style="">
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
        <div class="col-6 col-sm-5 col-md-4 col-lg-3 text-center div-hr-text">常見分類</div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

    </div>
</section>
<section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
    <div class="container px-5 pt-2" style="max-width:772px">
            <div class="media-container-row row py-2">
                <div class="card p-3 col-12 col-md-5 col-lg-3 mx-4 my-2 type-border" style="background-color: #FFBE86">
                    <div class="card-wrapper pb-0">
                        <div class="type-title text-center">
                            燃點案例
                        </div>
                        <div class="card-box2">
                            <div class="type-text text-center pt-2">
                                從機構故事認識 機構特色
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-5 col-lg-3 mx-4 my-2 type-border" style="background-color: #FFED89">
                    <div class="card-wrapper pb-0">
                        <div class="type-title text-center">
                            照護知多少
                        </div>
                        <div class="card-box2">
                            <div class="type-text text-center pt-2">
                                從照護知識學習 相關資訊
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-3 col-12 col-md-5 col-lg-3 mx-4 my-2 type-border" style="background-color: #FFD48E">
                    <div class="card-wrapper pb-0">
                        <div class="type-title text-center">
                            政策怎麼說
                        </div>
                        <div class="card-box2">
                            <div class="type-text text-center pt-2">
                                從政策資訊了解 產業現況
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</section>

<?php if (sizeof($newest_articles) > 0): ?>
<section class="mbr-section article content1 cid-rm9T0BpA4e mt-5" id="content2-h">
    <div class="row justify-content-center" style="">
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
        <div class="col-6 col-sm-5 col-md-4 col-lg-3 text-center div-hr-text">最新發佈</div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

    </div>
</section>

<section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
    <div class="container px-5 pt-2">
            <div class="media-container-row row py-2">

                <?php foreach($newest_articles as $newest_article): ?>
                    <div class="card p-3 col-12 col-md-6 col-lg-4">
                        <div class="card-wrapper">
                            <div class="card-img rounded mx-auto d-block">
                                <a href="<?=MySet::urlHead()?>/article/<?=$newest_article->slug?>">
                                    <img src="<?=$newest_article->thumbnail?>" alt="<?=$newest_article->title?>" <?=MySet::IMG404?>>
                                </a>
                            </div>
                            <a href="<?=MySet::urlHead()?>/article/<?=$newest_article->slug?>">
                                <div class="card-box2">
                                    <h5><?=$newest_article->title?></h5>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        <?=trim(mb_substr(str_replace("\n",'',strip_tags($newest_article->content)),0,80,"UTF-8"))?>
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

<?php if (sizeof($agent_stories) > 0): ?>
<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="row justify-content-center" style="">
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
        <div class="col-6 col-sm-5 col-md-4 col-lg-3 text-center div-hr-text">機構故事</div>
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
