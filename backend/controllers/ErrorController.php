<?php
namespace backend\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use backend\controllers\common\BaseController;

class ErrorController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}

