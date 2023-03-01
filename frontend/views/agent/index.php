<?php
use common\models\MySet;
use common\models\Agent;

$key = 'agent_agents';
if (Yii::$app->cache->exists($key)) {
    $agents = Yii::$app->cache->get($key);
} else {
    $agents = Agent::find()->where(['status' => Agent::STATUS_PUBLISHED])->limit(20)->all();
    Yii::$app->cache->set($key, $agents, 3600);
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
                <?php  $scrolingText = new frontend\widgets\ScrollingText;
                       echo $scrolingText->run();?>
            </div>
            <!-- <hr class="line" style="width: 25%;"> -->
        </div>
    </div>
</section>


<section class="mbr-section article content1 cid-rm9T0BpA4e" id="content2-h">
    <div class="container">
        <div class="media-container-row row"><!--限寬-->
            <div class="col-sm-3 px-0">
                <img class="w-100 img-qr rounded mx-auto d-block" style="border:initial" src="https://is5-ssl.mzstatic.com/image/thumb/Purple111/v4/25/50/4b/25504b64-8bd7-ef70-db6b-0083f15da7df/pr_source.jpg/246x0w.jpg" alt="" <?=MySet::IMG404?>>
                <div class="text-qr py-2" style="font-size:1.5rem">掃條碼進群組</div>
            </div>
            <div class="col-sm-5">您是仲介， 手上有想要轉出的照護提供者、 或者需要合適的照護提供者嗎？ 燃點與台灣多家仲介合作，我們 提供 專業 LINE 群組，即時接收 您的需求，給您第一線的資訊。</div>
        </div>
    </div>
</section>

<?php if (sizeof($agents) > 0): ?>
<section class="mbr-section article content1 cid-rm9T0BpA4e mt-5" id="content2-h">
    <div class="row justify-content-center" style="">
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center div-hr-text">合作機構</div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 div-hr"></div>

    </div>
</section>

<section class="features3 cid-rm9THo67pT" id="features3-n" style="background-color: #ffffff">
    <div class="container px-5" style="max-width:772px">
        <div class="media-container-row row">

            <?php foreach($agents as $agent): ?>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <a href="<?=MySet::urlHead()?>/agent/<?=$agent->slug?>">
                        <div class="card-wrapper pb-0">
                            <div class="img-border m-4">
                                <img class="w-100" src="<?=$agent->img4?>" alt="Mobirise" style="padding: 2rem!important;" <?=MySet::IMG404?>>
                            </div>
                            <div class="text-center text-dark">
                                <h5>機構名稱：<?=$agent->nickname?></h5>
                                <h5>服務區域：<?=$agent->address3?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>
