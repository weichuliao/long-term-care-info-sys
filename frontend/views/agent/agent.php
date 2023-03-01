<?php
use common\models\MySet;
use common\models\Agent;
if(Yii::$app->request->get('lang')){
    $agent = Agent::find()->where(['slug' =>Yii::$app->request->get('id'), 'language' => Yii::$app->request->get('lang')])->one();
}else{
    $agent = Agent::find()->where(['slug' =>Yii::$app->request->get('id'), 'language' => 'zh'])->one();
}

if(!$agent){ //如果未翻譯則導到原文
    Yii::$app->response->redirect('/article/'.Yii::$app->request->get('id'), 301)->send();
    Yii::$app->end();
}

use yeesoft\post\models\Post;
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
                             <img class="d-block w-100" src="<?=$agent->img?>" alt="" <?=MySet::IMG404?>>
                         </div>
                         <div class="carousel-item">
                             <img class="d-block w-100" src="<?=$agent->img2?>" alt="" <?=MySet::IMG404?>>
                         </div>
                         <div class="carousel-item">
                             <img class="d-block w-100" src="<?=$agent->img3?>" alt="" <?=MySet::IMG404?>>
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
     <div class="container px-5 pt-2">
         <div class="media-container-row row py-2">
             <div class="col-md-6">
                 <iframe width='100%' height='300px' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=<?=$agent->address?>&z=16&output=embed&t='></iframe>
             </div>
             <div class="col-md-4 map-text p-4">
                 <div class="text-right">
                     <i class="far fa-heart fa-2x" style="color:#e89f41" aria-hidden="true"></i>&nbsp;
                     <i class="fas fa-phone-volume fa-2x" style="color:#e89f41"></i>&nbsp;
                     <i class="fa fa-share-alt fa-2x" style="color:#e89f41" aria-hidden="true"></i>&nbsp;
                 </div>
                 <div>
                     ・機構名稱： <?=$agent->name?></br>
                     ・機構位置： <?=$agent->address2?></br>
                     ・機構特色： </br><?=$agent->description?>
                 </div>

             </div>
         </div>
     </div>
 </section>


<?php if (sizeof($agent_stories) > 0): ?>
 <section class="mbr-section article content1 cid-rm9T0BpA4e mt-5" id="content2-h">
     <div class="row justify-content-center" style="">
         <div class="col-1 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
         <div class="col-7 col-sm-5 col-md-4 col-lg-3 text-center div-hr-text" style="font-size: 1.6rem;margin-top: -18px;">了解 <?=$agent->name?> 更多</div>
         <div class="col-1 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

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
                                     <img src="<?=$agent_story->thumbnail?>" alt="Mobirise" <?=MySet::IMG404?>>
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
