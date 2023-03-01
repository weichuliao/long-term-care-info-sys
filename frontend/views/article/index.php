<?php
use common\models\MySet;
//取得文章 START
use yeesoft\post\models\Post;
if(Yii::$app->request->get('lang')){
    $post = Post::find()->where(['slug' =>Yii::$app->request->get('id'), 'language' => Yii::$app->request->get('lang')])->one();
}else{
    $post = Post::find()->where(['slug' =>Yii::$app->request->get('id'), 'language' => 'zh'])->one();
}

if(!$post){ //如果未翻譯則導到原文
    Yii::$app->response->redirect('/article/'.Yii::$app->request->get('id'), 301)->send();
    Yii::$app->end();
}
//取得文章 END

//SEO FOR POST START
$this->title = $post->title . '｜燃點優護';
$this->registerMetaTag(['name' => 'keywords', 'content' => $post->tagValues]);
$this->registerMetaTag(['name' => 'description', 'content' =>  trim(mb_substr(str_replace("\n",'',strip_tags($post->content)),0,80,"UTF-8"))]);
$this->registerMetaTag(['property' => 'dable:item_id', 'content' =>Yii::$app->request->get('id')]);
// $this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
// $this->registerMetaTag(['property' => 'og:url', 'content' => $self_url]);
// $this->registerMetaTag(['property' => 'og:description', 'content' => trim(mb_substr(str_replace("\n",'',strip_tags($post->content)),0,80,"UTF-8")),]);
// $this->registerMetaTag(['property' => 'og:image', 'content' => 'https://' . Yii::$app->request->serverName . $post->thumbnail]);
// $this->registerMetaTag(['property' => 'article:published_time', 'content' => date("c",strtotime($post->published_at))]);
//SEO FOR POST END
 ?>
<!-- <section class="engine"><a href="#"></a></section> -->
<section class="mbr-section article content9 cid-rm9SU3HRgT" id="content9-g">
    <div class="bd-example">
        <div class="container  py-4 article-title" style="max-width:772px">
            <a href="/" class="article-title">首頁</a>
            －
            <a href="<?=MySet::urlHead()?>/blog" class="article-title">部落格</a>
            －
            <?=$post->title?>
        </div>
        <div class="row  justify-content-center align-items-center" style="background-size: cover;background-image: url(/img/blog-bg.jpg);min-height: 300px;">

            <div class="col-12 text-center" style="font-size:2.5rem">
                <?=$post->title?>
            </div>
        </div>
        <!-- <img class='w-100' src="img/blog-bg.jpg" alt=""> -->
    </div>
</section>

<!-- <section class="engine"><a href="#"></a></section> -->
<section class="mbr-section article content9" id="content9-g">
    <div class="container">
        <!-- <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div> -->
        <div class="container row justify-content-around">
            <div class="col-8 col-sm-8 col-md-6 offset-md-2 col-lg-5 offset-lg-5 container row justify-content-end">
                <div class="col-2 p-2"><img class="w-75" src="/img/like.png" alt="" <?=MySet::IMG404?>></div>
                <div class="col-2 p-2"><img class="w-75" src="/img/share.png" alt="" <?=MySet::IMG404?>></div>
                <div onclick="event.preventDefault();fontResize('.article-detail__text__current','low');" id="jq-font-mius" class="col-2 article-text-setbtn text-center mr-2 p-2 d-flex flex-column justify-content-center align-items-center" style="font-weight:300">縮小</br>字體</div>
                <div onclick="event.preventDefault();fontResize('.article-detail__text__current','reset');" id="jq-font-reset" class="col-2 article-text-setbtn text-center mr-2 p-2 d-flex flex-column justify-content-center align-items-center" style="font-weight:400">原始</br>字體</div>
                <div onclick="event.preventDefault();fontResize('.article-detail__text__current','up');" id="jq-font-plus" class="col-2 article-text-setbtn text-center p-2 d-flex flex-column justify-content-center align-items-center" style="font-weight:500">放大</br>字體</div>

            </div>
        </div>
        <div class="article-content pt-4">
            <p2 class="article-detail__text__current">
                作者：燃點編輯群
            </p2>
        </div>
        <div class="article-content pt-4">
            <p2 class="article-detail__text__current">
                <span class="forArticleTagSwitch">
                    <?=$post->content?>
                </span>
            </p2>
        </div>
    </div>
</section>
<!-- 所關聯的機構 -->
<?php
$agent = $post->agentar;
if($agent != null){ ?>
    <section class="mbr-section article content1 cid-rm9T0BpA4e mt-5" id="content2-h">
        <div class="container">
            <div class="media-container-row row article-bottom-content p-4  justify-content-center align-items-center"style="width: 90%; max-width: 767px;margin: 0 auto;min-height:300px"><!--限寬-->
                <div class="col-md-8 p-3">
                    <div class="article-bottom-content-title mb-3">
                        <a href="<?= MySet::urlHead()?>/agent/<?=$agent->slug?>" class="article-bottom-content-title text-black" style="font-size:1.2rem">
                            <?= $agent->name?>
                        </a>
                    </div>
                    <div class="article-bottom-content-content">
                        <?=$agent->description?>
                    </div>
                </div>
                <div class="col-md-4 px-0">
                    <a href="<?= MySet::urlHead()?>/agent/<?=$agent->slug?>">
                        <img class="w-100 article-bottom-content-img py-5 px-3 my-4 text-center  d-flex flex-column justify-content-center align-items-center"
                                src="<?=$agent->img?>" alt="Mobirise" <?=MySet::IMG404?> style="max-width:200px;margin: 0 auto;" >
                    </a>
                    <div class="mbr-section-btn text-center btn-5">
                        <a href="<?= MySet::urlHead()?>/agent/<?=$agent->slug?>" class="btn btn-4 display-4">
                            了解更多
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php
$key = 'agent_'.$agent->slug.'_agent_stories';
if (Yii::$app->cache->exists($key)) {
    $agent_stories = Yii::$app->cache->get($key);
} else {
    if (Yii::$app->request->get('lang')) {
        $agent_stories = Post::find()->where(['status' => Post::STATUS_PUBLISHED, 'category_id' => Post::CATE_AGENT, 'agent' => $agent->id, 'language' => Yii::$app->request->get('lang')])->orderBy('published_at DESC')->limit(20)->all();
    } else {
        $agent_stories = Post::find()->where(['status' => Post::STATUS_PUBLISHED, 'category_id' => Post::CATE_AGENT, 'agent' => $agent->id, 'language' => 'zh'])->orderBy('published_at DESC')->limit(20)->all();
    }
    Yii::$app->cache->set($key, $agent_stories, 3600);
}
 ?>
<?php if (sizeof($agent_stories) > 0): ?>
<section class="mbr-section article content1 cid-rm9T0BpA4e mt-5" id="content2-h">
        <div class="row justify-content-center" style="">
            <div class="col-3 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center div-hr-text">機構文章</div>
            <div class="col-3 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

        </div>
</section>

<section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
        <div class="container px-5 pt-2">
                <div class="media-container-row row py-2">
                <?php foreach ($agent_stories as $agent_story): ?>
                    <div class="card p-3 col-12 col-md-6 col-lg-4">
                        <div class="card-wrapper">
                            <div class="card-img rounded mx-auto d-block">
                                <img src="<?=$agent_story->thumbnail ?>" alt="Mobirise" <?=MySet::IMG404?>>
                            </div>
                            <div class="card-box2">
                                <h5>
                                    <?=$agent_story->title ?>
                                </h5>
                                <p class="mbr-text mbr-fonts-style display-7">
                                    <?=trim(mb_substr(str_replace("\n",'',strip_tags($agent_story->content)),0,80,"UTF-8"))?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                </div>
            </div>
</section>
<?php endif; ?>
