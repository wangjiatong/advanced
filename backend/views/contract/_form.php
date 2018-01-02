<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Product;
use common\models\UserModel;
use kartik\select2\Select2;

$my_id = Yii::$app->user->identity->id;
/* @var $this yii\web\View */
/* @var $model common\models\Contract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contract_number')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => UserModel::find()->select('name, id')->where(['source' => Yii::$app->user->identity->id])->indexBy('id')->column(),
        'options' => [
            'prompt' => '请选择',
            'multiple' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'capital')->textInput() ?>
    
    <?= $form->field($model, 'transfered_time')->widget(DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'found_time')->widget(DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'raise_interest_year')->textInput() ?>
    
    <?= $form->field($model, 'interest_year')->textInput() ?>
    
    <?= $form->field($model, 'if_float')->dropDownList([0 => '否', 1 => '是'], ['prompt' => '请选择']) ?>
    
    <?= $form->field($model, 'term_month')->textInput() ?>

    <?= $form->field($model, 'term')->dropDownList(
            [
                '1' => '按月',
                '3' => '季度',
                '6' => '半年',
                '12' => '按年',
                '0' => '一次性兑付',
            ],
            [
                'prompt' => '请选择',
            ]
        ) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'bank_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
        'data' => Product::find()->select('product_name, id')->indexBy('id')->column(),
        'options' => [
            'prompt' => '请选择',
            'multiple' => false,
        ],
    ]) ?>
    
    <?= $form->field($model, 'pdf')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('确定', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$capital_id = 'contractform-capital';
//将输入的数字转换为以千分位分割
$numbersFormater = <<<numberFormater
    //格式化输入数字为以千分位分割
    $('#$capital_id').bind('keyup', function(){
        var before = $('#$capital_id').val();
        var after = seprateByThousand(before);
        var originalLabel = $('label[for=$capital_id]').text();
        $('label[for=$capital_id]').text('本金：' + after + ' （单位：元）' + ' 人民币大写金额：' + upperNum(before));
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
$bank_number_id = 'contractform-bank_number';
$bankNumsFormater = <<<bankNumsFormater
$('#$bank_number_id').bind('keyup', function(){
    var before = $('#$bank_number_id').val();
    var after = before.replace(/(\d{4})(?=\d)/g,"$1"+"-");
    var originalLabel = $('label[for=$bank_number_id]').text;
    $('label[for=$bank_number_id]').text('银行账号: ' + after);        
});
bankNumsFormater;

$this->registerJs($numbersFormater);
$this->registerJs($upperNum);
$this->registerJs($bankNumsFormater);
?>
