<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => '验证码',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        //重新拼接邮件内容
        $content = "<p>姓名：".$this->name."</p><br /><p>邮箱地址：".$this->email."</p><br /><p>主题：".$this->subject."</p><br /><p>正文：".$this->body."</p>";
        $_email = 'ewinjade@163.com';
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$_email => $this->name])
            ->setSubject($this->subject)
            ->setHtmlBody($content)
            ->send();
//        return Yii::$app->mailer->compose()
//            ->setTo($email)
//            ->setFrom([$this->email => $this->name])
//            ->setSubject($this->subject)
//            ->setTextBody($this->body)
//            ->send();
    }
}
