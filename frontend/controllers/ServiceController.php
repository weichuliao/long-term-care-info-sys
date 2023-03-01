<?php

namespace frontend\controllers;

use Yii;

class ServiceController extends \yeesoft\controllers\BaseController
{
    public $freeAccess = true;

    public $layout = 'layout';

    public function actionIndex($id){
        switch ($id) {
            case 1: return $this->render('one');break;
            case 2: return $this->render('two');break;
            case 3: return $this->render('three');break;
            default:break;
        }

    }
}
