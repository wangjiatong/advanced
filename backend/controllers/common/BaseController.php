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
use backend\models\UserAccessLog;
use backend\models\Admin;

class BaseController extends Controller{
    
    public  $user_id;    
    
    protected $allowActions = [
        'site/login',
        'error/index',
        'site/reset-password',
    ];
    
    
    public function beforeAction($action) 
    {
        if(Yii::$app->user->isGuest && in_array($action->uniqueId, $this->allowActions))
        {
            return true;
        }
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect(['site/login'])->send();
        }
        if(Yii::$app->session['allowed_urls'] !== null)
        {
            if(in_array($action->uniqueId, Yii::$app->session['allowed_urls']))
            {
                //操作记录
                $this->AccessLog();
                $user_access_log = UserAccessLog::find()->all();
                if(count($user_access_log) > 1000)
                {
                    UserAccessLog::deleteAll();
                }
                return true;
            }else{
                return $this->redirect(['error/index']);                 
            }
        }
        if($this->user_id = Yii::$app->user->identity->id)
        {
            $role_ids = $this->getRoleByUser($this->user_id);
            $access_ids_arr = $this->getAccessByRole($role_ids);
            $urls_all = $this->getUrlsByAccess($access_ids_arr);
            $this->allowActions = array_merge($this->allowActions, $urls_all, ['site/index', 'site/request-password-reset', 'site/logout']);
            Yii::$app->session['allowed_urls'] = $this->allowActions;
            if(in_array($action->uniqueId, $this->allowActions))
            {
                return true;
            }else{
                return $this->redirect(['error/index']); 
            }
        }
    }
    
    public function getRoleByUser($user_id)
    {
        if($role_ids_ = UserRole::find()->select('role_id')->where(['user_id' => $user_id])->asArray()->all())
        {
            foreach($role_ids_ as $r_i_)
            {
                $role_ids[] = $r_i_['role_id'];
            }
        }
        
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
                $access_ids = $access_ids[0]['access_id'];
                $access_ids_arr[] = $access_ids;
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
            $urls_all = array_unique($urls_arr);
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
            return Url::to(['error/index']);
        }
    }
    
    public function getUserId()
    {
        return Yii::$app->user->identity->id;
    }
    public function getUserName()
    {
        $my_id = Yii::$app->user->identity->id;
        return Admin::findOne($my_id)->name;
    }
    
    public function AccessLog()
    {
        $get_params = Yii::$app->request->get() ? Yii::$app->request->get() : array();

        $post_params = Yii::$app->request->post() ? Yii::$app->request->post() : array();

        $model_log = new UserAccessLog();

        $model_log->user_id = Yii::$app->user->identity->id?Yii::$app->user->identity->id:0;

        $model_log->target_url = isset( $_SERVER['REQUEST_URI'] )?$_SERVER['REQUEST_URI']:'';

        $model_log->query_params = json_encode( array_merge( $post_params,$get_params ) );

        $model_log->ua = isset( $_SERVER['HTTP_USER_AGENT'] )?$_SERVER['HTTP_USER_AGENT']:'';

        $model_log->ip = isset( $_SERVER['REMOTE_ADDR'] )?$_SERVER['REMOTE_ADDR']:'';

        $model_log->created_time = date("Y-m-d H:i:s");

        $model_log->note = '';
        
        $model_log->save() ? true : false;

    }
    
    
    
    
    
    
    
    
    
    
}
