<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!--                    <div class="widget">
                            <input id="search" type="search" name="search" value="点击输入您要搜索的内容" >
                    </div>-->
                    <div class="widget">
                        <?php $form = ActiveForm::begin()?>
                            <!--<input id="search" type="search" name="search" value="点击输入您要搜索的内容" >-->
                        <?=$form->field($model, 'search')->textInput()?>
                        <?php ActiveForm::end()?>
                    </div>