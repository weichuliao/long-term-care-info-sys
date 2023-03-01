<?php
namespace common\models;

use Yii;

class MySet {
    const IMG404 = "onerror=\"this.src='https://cdn.dribbble.com/users/252114/screenshots/3840347/mong03b.gif'\"";
    public function urlHead($start = false){
        if(Yii::$app->request->get('lang')){
            return '/'.Yii::$app->request->get('lang');
        }else if($start){
            return '';
        }else{
            return;
        }
    }
}
