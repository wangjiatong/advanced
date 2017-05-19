<?php
namespace backend\controllers\common;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\web\Controller;
use Yii;
use backend\models\UserRole;
use backend\models\RoleAccess;
use backend\models\Access;
use yii\helpers\Url;
use yii\filters\AccessControl;

class BaseController extends Controller{
    
    public  $user_id;    
    
    protected $allowActions = [
        'site/login',
        'site/logout',
        'error/index',
    ];
    
    public function beforeAction($action) 
    {
        if(Yii::$app->user->isGuest && in_array($action->uniqueId, $this->allowActions))
        {
            return true;
        }
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect(['error/index']);
        }
        if(Yii::$app->session['allowed_urls'] !== null)
        {
//            $this->allowActions = Yii::$app->session['allowed_urls'];
//            var_dump($this->allowActions);
            if(in_array($action->uniqueId, Yii::$app->session['allowed_urls']))
            {
                return true;
            }else{
                return $this->redirect(['error/index']);                 
            }
        }
        if($this->user_id = Yii::$app->user->identity->id)
        {
//            var_dump($this->user_id);
            $role_ids = $this->getRoleByUser($this->user_id);
//                var_dump($role_ids);
            $access_ids_arr = $this->getAccessByRole($role_ids);
//                var_dump($access_ids_arr);
            $urls_all = $this->getUrlsByAccess($access_ids_arr);
//                var_dump($urls_all);
            $this->allowActions = array_merge($this->allowActions, $urls_all);
//                var_dump($this->allowActions);
//                var_dump($action->uniqueId);
//                var_dump(in_array($action->uniqueId, $this->allowActions));
            Yii::$app->session['allowed_urls'] = $this->allowActions;
            if(in_array($action->uniqueId, $this->allowActions))
            {
                return true;
            }else{
                return $this->redirect(['error/index']); 
            }
        }
//        return true;
    }
    
    public function getRoleByUser($user_id)
    {
        $role_ids = UserRole::find()->select('role_id')->where(['user_id' => $user_id])->asArray()->all();

        if($role_ids !== null)
        {
            return $role_ids;
        }else{
            return null;
        }
    }
    
    public function getAccessByRole($role_ids)
    {
        if($role_ids !== null)
        {
            $access_ids_arr = [];
            foreach($role_ids as $r_i)
            {
                $access_ids = RoleAccess::find()->select('access_id')->where(['role_id' => $r_i])->asArray()->all();
                $access_ids_arr = array_merge($access_ids_arr, $access_ids);
            }
            if($access_ids_arr !==null)
            {
                return $access_ids_arr;
            }else{
                return null;
            }
        }
    }
    
    public function getUrlsByAccess($access_ids_arr)
    {
        if($access_ids_arr !== null)
        {
            $urls_temp = [];
            $urls_arr = [];
            foreach($access_ids_arr as $a_i)
            {
                $urls = Access::find()->where(['id' => $a_i])->one()->urls;
                $urls_temp = explode(",", $urls);
                $urls_arr = array_merge($urls_temp, $urls_arr);
            }
            $urls_all = $urls_arr;
            if($urls_all !== null)
            {
                return $urls_all;
            }else{
                return null;
            }
        }
    }
    
    public function checkUrlAccess($urlToCheck, $urlTo)
    {
        if(in_array($urlToCheck, Yii::$app->session['allowed_urls']))
        {
            return Url::to([$urlToCheck]);
        }elseif(in_array($urlTo, Yii::$app->session['allowed_urls'])){
            return Url::to([$urlTo]);
        }else{
            return null;
        }
    }
    
    
    
    
    
    
    
    
    
    
}
