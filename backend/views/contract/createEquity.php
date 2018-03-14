<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Product;
use common\models\UserModel;
use kartik\select2\Select2;
use light\widgets\LockBsFormAsset;
use backend\models\Admin;
use yii\helpers\Url;

$my_id = Yii::$app->user->identity->id;
/* @var $this yii\web\View */
/* @var $model common\models\Contract */
/* @var $form yii\widgets\ActiveForm */
$this->title = '股权投资';
?>
<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
    
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "<div class='form-group'>{label}<div class='col-sm-4'>{input}</div><div class='col-sm-2'>{error}</div></div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                'inputOptions' => ['class' => 'form-control1'],
            ],
        ]); ?>
    
        <?= $form->field($model, 'contract_number')->textInput(['maxlength' => true, 'placeholder' => '如果不填则会自动生成']) ?>
            
        <?php 
//             var_dump(Admin::find()->select('name, admin.id')->indexBy('id')
//                 ->joinWith('userRole', false)
// 			    ->where(['user_role.role_id' => 3])
// 			    ->column());
            if(in_array('contract/create-all', Yii::$app->session['allowed_urls']))
            {
                echo $form->field($model, 'source')->widget(Select2::classname(), [
                    'data' => Admin::find()->select('name, admin.id')->indexBy('id')->joinWith('userRole', false)
            			    ->where(['user_role.role_id' => 3])
            			    ->column(),
                    'options' => [
                        'prompt' => '请选择销售姓名',
                        'multiple' => false,
                    ],
                ]);
            }
        ?>
            
        <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => in_array('contract/create-all', Yii::$app->session['allowed_urls']) ? 
                []
                : UserModel::find()->select('name, id')
                ->where(['source' => Yii::$app->user->identity->id])
                ->indexBy('id')->column(),
            'options' => [
                'prompt' => '请选择客户姓名',
                'multiple' => false,
            ],
        ]) ?>
    
        <?= $form->field($model, 'capital', [
                'template' => "<div class='form-group'>{label}<div class='col-sm-4'>{input}</div><div class='col-sm-4' id='div_capital' style='display: none;'><p id='p_capital'></p></div><div class='col-sm-2'>{error}</div></div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                'inputOptions' => ['class' => 'form-control1'],
            ])->textInput(['placeholder' => '单位：元']) ?>
        
        <?= $form->field($model, 'transfered_time')->widget(DatePicker::className(), [
            'options' => [
                'class' => 'form-control1',
            ],
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
    
        <?= $form->field($model, 'found_time')->widget(DatePicker::className(), [
            'options' => [
                'class' => 'form-control1',
            ],
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        
        <?= $form->field($model, 'predic_term_invest')->textInput(['placeholder' => '单位：月']) ?>         
    
        <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'bank_user')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'bank_number', [
                'template' => "<div class='form-group'>{label}<div class='col-sm-4'>{input}</div><div class='col-sm-4' id='div_bank_number' style='display: none;'><p id='p_bank_number'></p></div><div class='col-sm-2'>{error}</div></div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                'inputOptions' => ['class' => 'form-control1'],
            ])->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
            'data' => Product::find()->select('product_name, id')->where(['status' => 1])->indexBy('id')->column(),
            'options' => [
                'prompt' => '请选择产品名称',
                'multiple' => false,
            ],
        ]) ?>
        
        <?= $form->field($model, 'pdf')->fileInput() ?>
    
        <div class="form-group">
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?= Html::submitButton('确定', [
                            'class' => 'btn btn-success',
                            'data-loading-text' => '合同创建中...',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
        
    </div>
</div>

<?php 
$capital_id = 'equitycontract-capital';
//将输入的数字转换为以千分位分割
$numbersFormater = <<<numberFormater
    //格式化输入数字为以千分位分割
    $('#$capital_id').bind('keyup', function(){
        var before = $('#$capital_id').val();
        var after = seprateByThousand(before);
        $('#div_capital').show();
        $('#p_capital').html('数额：' + after + "<br />" + ' 大写金额：' + upperNum(before));    
    });
    //JS千分位分割函数
    function seprateByThousand(num) 
    {
        var num = (num || 0).toString(), result = '';
        while (num.length > 3) 
        {
            result = ',' + num.slice(-3) + result;
            num = num.slice(0, num.length - 3);
        }
        if (num) { result = num + result; }
        return result;
    }
numberFormater;

//金额转大写
$upperNum = <<<upperNum
    function upperNum(n)   
    {  
        var fraction = ['角', '分'];  
        var digit = ['零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖'];  
        var unit = [ ['元', '万', '亿'], ['', '拾', '佰', '仟']  ];  
        var head = n < 0? '欠': '';  
        n = Math.abs(n);  
    
        var s = '';  
    
        for (var i = 0; i < fraction.length; i++)   
        {  
            s += (digit[Math.floor(n * 10 * Math.pow(10, i)) % 10] + fraction[i]).replace(/零./, '');  
        }  
        s = s || '整';  
        n = Math.floor(n);  
    
        for (var i = 0; i < unit[0].length && n > 0; i++)   
        {  
            var p = '';  
            for (var j = 0; j < unit[1].length && n > 0; j++)   
            {  
                p = digit[n % 10] + unit[1][j] + p;  
                n = Math.floor(n / 10);  
            }  
            s = p.replace(/(零.)*零$/, '').replace(/^$/, '零')  + unit[0][i] + s;  
        }  
        return head + s.replace(/(零.)*零元/, '元').replace(/(零.)+/g, '零').replace(/^整$/, '零元整');  
    } 
upperNum;

//银行卡号分割
$bank_number_id = 'equitycontract-bank_number';
$bankNumsFormater = <<<bankNumsFormater
$('#$bank_number_id').bind('keyup', function(){
    var before = $('#$bank_number_id').val();
    var after = before.replace(/(\d{4})(?=\d)/g,"$1"+"-");
    $('#div_bank_number').show();
    $('#p_bank_number').html('银行账号：' + after);       
});
bankNumsFormater;

$this->registerJs($numbersFormater);
$this->registerJs($upperNum);
$this->registerJs($bankNumsFormater);
LockBsFormAsset::register($this);

$url = Url::to(['get-users-by-source'], true);
?>

<script>
// 当有为所有人录合同的权限时，ajax加载客户姓名
$(document).ready(function(){
	
    var source = $('#equitycontract-source');//销售姓名
    var user_id = $('#equitycontract-user_id');//客户姓名
    var users = [];//根据销售获取的对应客户返回集
    
    //当选择销售姓名后执行ajax获取客户姓名列表
    source.on('select2:select', function(e){
        user_id.empty();//当重新选择销售姓名，清空客户姓名，防止出错
        user_id.append("<option value=''>请选择客户姓名</option>");//添加未选时的prompt
        $.ajax({
            method: 'get',
            url: '<?= $url ?>?source=' + source.val(),
            dataType: 'json',
            success: function(data){
                $.each(data, function(name,value){
                    user_id.append("<option value=" + name +">" + value + "</option>");
                });
            }
        });  
    }); 

    //当没有选择销售姓名就选择客户姓名时提醒
    user_id.on('select2:opening', function(e){
        if(source.val() == "")
        {
            alert('您还未选择销售姓名！');
        }
    });
    
});
</script>
