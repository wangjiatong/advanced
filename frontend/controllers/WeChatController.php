<?php
namespace frontend\controllers;
use yii\web\Controller;
use common\models\AccessToken;
use Yii;
use frontend\models\VerifyWxForm;
use common\models\UserWx;
use common\models\News;
use common\models\WxUser;
use common\models\UserModel;
use common\models\Contract;
use common\models\Product;
use common\models\Advice;
use frontend\models\WxValidateOldPassword;
use frontend\models\WxSetNewPassword;
use backend\models\Admin;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class WeChatController extends Controller
{
    private $_timestamp;
    private $_now;
    private $_timeToExpires;


    public function beforeAction($action) 
    {
        parent::beforeAction($action);
        $this->layout = 'wx';
//        if($action->uniqueId === 'we-chat/index')
//        {
//            if(isset($_GET['echostr']))
//            {
//                $this->ValidateUrl();
//            }else{
//                return true;
//            }
//        }elseif($action->uniqueId === 'we-chat/auth'){
//            return true;
//        }
        return true;
    }
    
    //index
    public function actionIndex()
    {
//        $this->ValidateUrl();
        $this->createMenu();
        $url = 'https://api.weixin.qq.com/cgi-bin/token';
        $data = [
            'grant_type' => 'client_credential',
            'appid' => 'wxf637ffef0c489df9',
            'secret' => '02ee3eff9b5a5454c49b914841760f11',
        ];
        $this->getAccessToken($url, $data);
//        var_dump($this->generateGetCodeUrl());
    }
    
    //获取网页授权access_token
    public function actionAuth($code)
    {
//        $this->layout = 'wx';
        $code = Yii::$app->request->get('code');
//        var_dump($code);
        $web_access_token = $this->getWebAccessToken($code);
//        var_dump($web_access_token);
//        exit();
        $user_info = $this->getUserInfo($web_access_token);
//        var_dump($user_info);
//        exit();
//        var_dump($user_info);
//        echo "<img src='http://wx.qlogo.cn/mmopen/Q3auHgzwzM7CXSEekbeNJCvPktf9zLJgYvtUG5ROILPfj35n6YGJ4pfxj2Gic4jWjSuIGzH2wJVpOSfb5EYlpCw/0'>";
//        exit();
        $openid = $user_info['openid'];
        
        if(UserWx::findUserByOpenid($openid))
        {
            return $this->redirect(['we-chat/member', 'openid' => $openid]);
        }else{
            $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf637ffef0c489df9&redirect_uri=http%3a%2f%2fwww.ewinjade.com%2fwe-chat%2fbind-wx&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect');
        }    
    }
    
    public function actionBindWx()
    {
        //与微信绑定
        $model = new VerifyWxForm();
        if($model->load(Yii::$app->request->post()))
        {
            //由于第一次校验用户是否绑定微信账号时,code已经使用过一次。故若用户未绑定需获取userinfo时要再次获取code！！！
            $code = Yii::$app->request->get('code');
            $web_access_token = $this->getWebAccessToken($code);
            $user_info = $this->getUserInfo($web_access_token);
            $openid = $user_info['openid'];
            if($model->verifyUser($openid))
            {
                //存储微信用户信息
                if(!WxUser::findOne(['openid' => $openid]))
                {
                    $wx_user = new WxUser();
                    $wx_user->openid = $user_info['openid'];
                    $wx_user->nickname = $user_info['nickname'];
                    $wx_user->sex = $user_info['sex'];
                    $wx_user->language = $user_info['language'];
                    $wx_user->city = $user_info['city'];
                    $wx_user->province = $user_info['province'];
                    $wx_user->country = $user_info['country'];
                    $wx_user->headimgurl = $user_info['headimgurl'];
                    if($wx_user->save())
                    {
                        return $this->redirect(['we-chat/member', 'openid' => $openid]);
                    }
                }
                return $this->redirect(['we-chat/member', 'openid' => $openid]);
            }
//            return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf637ffef0c489df9&redirect_uri=http%3a%2f%2fwww.ewinjade.com%2fwe-chat%2fauth&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect');
            return $this->redirect(['error', 'msg' => '请检查您的用户名及密码是否输入正确，或该账号已绑定过微信。如有问题请与我们取得联系。', 'url' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf637ffef0c489df9&redirect_uri=http%3a%2f%2fwww.ewinjade.com%2fwe-chat%2fauth&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect']);
        }
        return $this->render('auth', [
            'model' => $model,
        ]);
    }
    
    //关于我们
    public function actionAboutUs()
    {
        return $this->render('aboutUs');
    }
    //新闻动态
    public function actionNews()
    {
        $model = News::find()->orderBy('id desc')->all();
        return $this->render('news', [
            'model' => $model,
        ]);
    }
    //个人中心
    public function actionMember($openid)
    {
        return $this->render('member', [
            'openid' => $openid,
        ]);
    }
    
    //确认绑定成功
    public function actionConfirm()
    {
        return $this->render('confirm');
    }
    
    //新闻单页
    public function actionArticle($id)
    {
        $news = $this->findNews($id);
        return $this->render('article', [
            'model' => $news,
        ]);
    }
    
    //查看合同
    public function actionContract($openid)
    {
        $user = $this->getUserByOpenid($openid);
        $contract = Contract::find()->where(['user_id' => $user->id])->asArray()->all();
        return $this->render('contract', [
            'contract' => $contract,
            'openid' => $openid,
        ]);
    }
    
    //在售产品
    public function actionProduct($openid)
    {
        $product = Product::find()->asArray()->all();
        return $this->render('product', [
            'product' => $product,
            'openid' => $openid,
        ]);
    }
    
    //产品页
    public function actionProductView($openid, $id)
    {
        $model = Product::findOne($id);
        return $this->render('productView', [
            'model' => $model,
        ]);
    }
    
    //意见建议
    public function actionAdvice($openid)
    {
        $model = new Advice();
        $user_id = UserWx::findUserByOpenid($openid)->user_id;
        $manager_id = Contract::findOne(['user_id' => $user_id])->source;
        $ceo_id = 1;
        if($model->load(Yii::$app->request->post()))
        {
            $model->openid = $openid;
            if($model->save())
            {
                $advice = Advice::findOne($model->id);
                $to_id = $advice->to_whom;
                $to = Admin::findOne($to_id)->email;
                $user_name = UserModel::findOne($user_id)->name;
                $if_anonymous = $model->if_anonymous ? '选择匿名地' : '';
                $subject = '客户' . $user_name . $if_anonymous . '向您提出了意见建议';
                $body = $model->advice;
                $email = $this->sendEmail($to, $subject, $body);
                return $this->redirect(['we-chat/member', 'openid' => $openid]);
            }
            return false;
        }
        return $this->render('advice', [
            'model' => $model,
            'ceo_id' => $ceo_id,
            'manager_id' => $manager_id,
        ]);
    }
    
    //修改密码（验证旧密码）
    public function actionChangePassword($openid)
    {
        $model = new WxValidateOldPassword();
        if($model->load(Yii::$app->request->post()))
        {
            if(!$model->validateOldPassword($openid))
            {
                return $this->redirect(['error', 'msg' => '请检查您输入的旧密码是否正确！', 'url' => 'javascript:history.back();']);
            }
            return $this->redirect(['we-chat/set-new-password', 'openid' => $openid]);
        }
        return $this->render('changePassword', [
            'model' => $model,
            'openid' => $openid,
        ]);
    }
    
    //设置新密码
    public function actionSetNewPassword($openid)
    {
        $model = new WxSetNewPassword();
        
        if($model->load(Yii::$app->request->post()))
        {
            if(!$model->setNewPassword($openid))
            {
                return $this->redirect(['error', 'msg' => '请检查您两次输入的密码是否一致。', 'url' => 'javascript:history.back();']);
            }
            return $this->redirect(['we-chat/member', 'openid' => $openid]);
        }
        return $this->render('setNewPassword', [
            'model' => $model,
        ]);
    }
    
    //取消微信绑定页面
    public function actionUnbindWx($openid)
    {
        return $this->render('unbindWx', [
            'openid' => $openid,
        ]);
    }
    
    //取消微信绑定操作
    public function actionUnbindWxRelation($openid)
    {
        if($user_wx = $this->findUserWx($openid))
        {
            if($user_wx->delete())
            {
                if($this->findWxUser($openid)->delete())
                {
//                    echo "解绑成功！";
//                    return true;
                    exit();
                }
            }
            return null;
        }
        return null;
    }
    
    //预约财富
    public function actionCall($openid)
    {
        $user_id = UserWx::findUserByOpenid($openid)->user_id;
        $source = Contract::findOne(['user_id' => $user_id])->source;
        $admin = Admin::findOne($source);
        return $this->render('call', [
            'admin' => $admin,
        ]);
    }
    
    //合同详情页
    public function actionContractView($openid, $contract_id)
    {
        $user = $this->getUserByOpenid($openid);
        $user_id = $user->id;
        $model = $this->findContractByUser($user_id, $contract_id);
        return $this->render('contractView', [
            'model' => $model,
        ]);
    }
    
    //错误页
    public function actionError($msg, $url)
    {
        return $this->render('error', [
            'msg' => $msg,
            'url' => $url,
        ]);
    }
    
    //向微信服务器验证url
    private function ValidateUrl()
    {
        $token = 'ewinjj6688';
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $echostr = $_GET['echostr'];
        $arr = [$token, $timestamp, $nonce];
        sort($arr);
        $str = sha1(implode($arr));
        if($str === $signature)
        {
            echo $echostr;
            return true;
        }
        return false;
    }
    
    //获取access_token
    private function getAccessToken($url, $data = [])
    {
        //判断数据库中是否存在access_token记录
        $expiration = AccessToken::find()->one();
        //如果存在
        if(!empty($expiration))
        {
//            var_dump($expiration);
            $this->_timestamp = $expiration['timestamp'];
            $this->_now = date('Y-m-d H:i:s');
            $this->_timestamp = strtotime($this->_timestamp);
//            var_dump($this->_timestamp);
            $this->_now = strtotime($this->_now);
//            var_dump($this->_now);
            $this->_timeToExpires = $this->_timestamp + 7200;
//            var_dump($this->_timeToExpires);
//            var_dump($this->_timeToExpires - $this->_now);
            
            //如果离过期时间大于5分钟，则不获取新的ACCESS_TOKEN
            if($this->_timeToExpires - $this->_now > 300 )
            {
//                echo 'ACCESS_TOKEN尚未过期';
                return $expiration['access_token'];
            }else{      
                //删除旧的AT，并获取新的AT
                if($expiration->delete())
                {
//                    echo 'ACCESS_TOKEN即将过期或已过期，获取新的AT';
                    return $this->insertAccessToken($url, $data);  
                }           
            }
        }else{
            //数据库中不存在AT，获取AT
//            echo '数据库中不存在ACCESS_TOKEN，获取新的AT';
            return $this->insertAccessToken($url, $data); 
        }
    }
    
    //获取网页授权access_token
    public function getWebAccessToken($code)
    {
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $data = [
            'appid' => 'wxf637ffef0c489df9',
            'secret' => '02ee3eff9b5a5454c49b914841760f11',
            'code' => $code,
            'grant_type' => 'authorization_code',
        ];
        $web_access_token = $this->getCurl($url, $data);
        return $web_access_token;
  
    }
    
    //post的方式的curl
    public function postCurl($url, $data)
    {
        //初始化
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //post数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //执行并获取结果
        $res = json_decode(curl_exec($ch), true);
        //关闭
        curl_close($ch);
        return $res;
//        var_dump($res);
    }
    
    //get的方式的curl
    public function getCurl($url, $data)
    {
        //初始化
        $ch = curl_init();
        $url = $this->suburl($url, $data);
        //配置
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $res = json_decode(curl_exec($ch), 1);
        //关闭
        curl_close($ch); 
        return $res;
//        var_dump($res);     
    }
    
    //拼接get参数组成url
    public function suburl($url, $arr)
    {
        $str = '';
        foreach($arr as $k => $v)
        {
            $str .= $k . '=' . $v . '&';
        }
        $url = $url . '?' . $str;
        $url = substr($url, 0, strlen($url) - 1);
        return $url;
    }
    
    //生成菜单
    public function createMenu()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create';
        $access_token = AccessToken::find()->one();
//        var_dump($access_token);
//        exit();
        $access_token = $access_token['access_token'];
//        var_dump($access_token);
        $arr = ['access_token' => $access_token];
        $url = $this->suburl($url, $arr);
//        var_dump($url);
        $data = [
            'button' => [
                [
                    'name' => '关于我们',
                    'type' => 'view',
                    'url' => 'http://www.ewinjade.com/we-chat/about-us',
                ],
                [
                    'name' => '新闻动态',
                    'type' => 'view',
                    'url' => 'http://www.ewinjade.com/we-chat/news',
                ],
                [
                    'name' => '个人中心',
                    'type' => 'view',
                    'url' => $this->generateGetCodeUrl(),
                ],
            ],
        ];
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
//        var_dump($data);
        $this->postCurl($url, $data);
 
    }
    
    //将获取到的access_token存入数据库
    public function insertAccessToken($url, $data)
    {
        //获取AT
        $res = $this->getCurl($url, $data);
        var_dump($res);
        exit();
        //向数据库中存入
        $access_token = new AccessToken();
        $access_token->access_token = $res['access_token'];
        $access_token->expires_in = $res['expires_in'];
        return $access_token->save() ? $access_token->access_token : false;
    }
    
    //生成获取网页授权code的url
    public function generateGetCodeUrl()
    {
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $arr = [
            'appid' => 'wxf637ffef0c489df9',
            'redirect_uri' => 'http%3a%2f%2fwww.ewinjade.com%2fwe-chat%2fauth',
            'response_type' => 'code',
            'scope' => 'snsapi_userinfo',
            'state' => 'STATE',
        ];
        $url = $this->suburl($url, $arr);
        $url = $url . '#wechat_redirect';
        return $url;   
    }
    
    //拉取用户信息
    public function getUserInfo($web_access_token)
    {
        $url = 'https://api.weixin.qq.com/sns/userinfo';
        $data = [
            'access_token' => $web_access_token['access_token'],
            'openid' => $web_access_token['openid'],
            'lang' => 'zh_CN',
        ];
        $userinfo = $this->getCurl($url, $data);
        return $userinfo;
    }
    
    //获取新闻模型
    private function findNews($id)
    {
        if(($news = News::findOne($id)) !== 'null')
        {
            return $news;
        }else{
            return null;
        }
    }
    
    //通过openid获取系统中用户id
    private function getUserByOpenid($openid)
    {
        if($user = UserModel::findOne(UserWx::findUserByOpenid($openid)->user_id))
        {
            return $user;
        }
        return null;
    }
    
    //通过openid获取微信绑定关系
    private function findUserWx($openid)
    {
        if($user_wx = UserWx::findOne(['openid' => $openid]))
        {
            return $user_wx;
        }
        return null;
    }
    
    //通过openid获取微信用户信息
    private function findWxUser($openid)
    {
        if($wx_user = WxUser::findOne(['openid' => $openid]))
        {
            return $wx_user;
        }
        return null;
    }
    
    //某个客户的合同详情页
    private function findContractByUser($user_id, $contract_id)
    {
        if(($contract = Contract::findOne(['user_id' => $user_id, 'id' => $contract_id])) !== null)
        {
            return $contract;
        }
        return null;
    }
    
    //发送邮件
    public function sendEmail($to, $subject, $body)
    {
        $mail = Yii::$app->mailer->compose();

        $mail->setTo($to);

        $mail->setSubject($subject);

        $mail->setFrom(['mail@ewinjade.com' => '翌银玖德']);

        $mail->setHtmlBody($body);

        $mail->send();
    }

}
