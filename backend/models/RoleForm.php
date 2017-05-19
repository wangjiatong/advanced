<?php
namespace backend\models;

use yii\base\Model;
use backend\models\Role;


class RoleForm extends Model
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public $role_name;
    public $status;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            
            [['created_at', 'updated_at'], 'safe'],
            [['role_name'], 'string', 'max' => 20],
            [['role_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_name' => '角色名称',
        ];
    }
    public function create()
    {
        $now = date('Y-m-d H:i:s');
        $role = new Role();
        $role->role_name = $this->role_name;
        $role->created_at = $now;
        return $role->save() ?  $role : null;
    }
    
}
