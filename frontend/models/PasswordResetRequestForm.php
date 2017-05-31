<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\UserModel;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\UserModel',
                'filter' => ['status' => UserModel::STATUS_ACTIVE],
                'message' => '不存在拥有此邮箱的用户！'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = UserModel::findOne([
            'status' => UserModel::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!UserModel::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => '翌银玖德'])
            ->setTo($this->email)
            ->setSubject('修改密码： ' . Yii::$app->user->identity->name)
            ->send();
    }
}
