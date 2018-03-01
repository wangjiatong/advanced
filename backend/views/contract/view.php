<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Admin;
use common\models\Product;
use common\models\UserModel;
use common\models\Contract;

$pdfUrl = "<embed width='1000' height='750' src='/$model->pdf'></embed>";


/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '合同详情：'.$model->contract_number;

?>
<div class="contract-view">

    <h3><?= Html::encode($this->title) ?>        
        <?= Html::a('删除合同', ['my-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该合同吗？',
                'method' => 'post',
            ],
        ]) ?>
    </h3>
    <p></p>
    <div class='table table-condensed'>
        <table class="table table-bordered" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <td class="info">客户姓名</td>
                    <td><?= UserModel::findOne($model->user_id)->name ?></td>
                    <td class="info">客户经理</td>
                    <td><?= Admin::findOne($model->source)->name ?></td>
                    <td class="info">产品名称</td>
                    <td><?= Product::findOne($model->product_id)->product_name ?></td>
                </tr>
                <tr>
                	<td class="info">本金</td>
                    <td><?= number_format($model->capital) . ' (' . num2rmb($model->capital) . ')' ?></td>
                    <td class="info">到账时间</td>
                    <td><?= $model->transfered_time ?></td>
                    <td class="info">成立时间</td>
                    <td><?= $model->found_time ?></td>
                </tr>
                <tr>
                    <td class="info">募集天数</td>
                    <td><?= $model->raise_day ?>天</td>
                    <td class="info">募集期年利率</td>
                    <td><?= $model->raise_interest_year ?>%</td>
                    <td class="info">募集期利息</td>
                    <td><?= $model->raise_interest ?>元</td>
                </tr>
                <tr>
                    <td class="info">期限</td>
                    <td><?= $model->term_month ?>个月</td>
                    <td class="info">年利率</td>
                    <td><?= $model->interest_year ?>%</td>
                    <td class="info">成立期利息</td>
                    <td><?= number_format($model->interest, 2) . ' (' . num2rmb($model->interest) . ')' ?></td>
                </tr>
                <tr>
                    <td class="info">开户行</td>
                    <td><?= $model->bank ?></td>
                    <td class="info">开户名</td>
                    <td><?= $model->bank_user ?></td>
                    <td class="info">银行账号</td>
                    <td><?= $model->bank_number ?></td>
                </tr>
                <tr>
                    <td class="info">合同状态</td>
                    <td colspan="2">
                        <?php 
                            echo Contract::contractValidation($model->status);
                        ?>
                    </td>
                    <td class="info">创建时间</td>
                    <td colspan="2"><?= $model->created_at ?></td>
                </tr>
                <tr>
                    <td class="info">是否含有浮动利率</td>
                    <td colspan="2">
                    <?= $model->if_float == 0 ? "否" : "是" ?>
                    <?php
                        if($model->if_float == 0)
                        {
                            echo Html::a('改为浮动利率', ['contract/set-float', 'id' => $model->id, 'status' => 1], [
                                'class' => 'btn btn-success', 
                                'data' => [
                                    'confirm' => '你确定要改为含浮动利率吗？',
                                    'method' => 'post',
                                ],
                            ]);
                        }else{
                            echo Html::a('取消', ['contract/set-float', 'id' => $model->id, 'status' => 0], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => '你确定要取消浮动利率吗？',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ?>
                    </td> 
                    <td class="info">浮动利息</td>
                    <td colspan="2">
                    <?= $model->float_interest == 0 ? "尚未追加" : $model->float_interest ?>
                    <?php
                        if($model->if_float == 0)
                        {
                            echo Html::a('改为浮动利率', ['contract/set-float', 'id' => $model->id, 'status' => 1], [
                                'class' => 'btn btn-success',
                                'data' => [
                                    'confirm' => '你确定要改为含浮动利率吗？',
                                    'method' => 'post',
                                ],
                            ]);
                        }else{
                            if($model->float_interest == 0)
                            {
                                echo Html::a('追加', ['contract/set-float-interest', 'id' => $model->id], [
                                    'class' => 'btn btn-success',
                                    'data' => [
                                        'confirm' => '你确定要追加浮动利息吗？',
                                        'method' => 'post',
                                    ],
                                ]);
                            }else{
                                echo Html::a('修改', ['contract/set-float-interest', 'id' => $model->id], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                        'confirm' => '你确定要修改浮动利息吗？',
                                        'method' => 'post',
                                    ],
                                ]);
                            }
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td class="info">应付利息总额</td>
                    <td colspan="2"><?= number_format($model->total_interest, 2) . ' (' . num2rmb($model->total_interest) .')' ?></td>
                    <td class="info">兑付总额</td>
                    <td colspan="2"><?= number_format($model->total, 2) . ' (' .num2rmb($model->total) . ')' ?></td>
                </tr>
                <tr>
                    <td class="info">付息频率</td>
                    <td colspan="5">
                        <?php
                        switch($model->term)
                        {
                            case 1: echo '按月';                            break;
                            case 3: echo '季度';                            break;
                            case 6: echo '半年';                            break;
                            case 0: echo '一次性';                          break;
                        }
                        ?>
                    </td> 
                </tr>
                <tr>
                    <td class="info">每期到期时间</td>
                    <?php
                        $eve_time = explode(', ', $model->every_time);
                        $eve_int = explode(', ', $model->every_interest);
                        $eve_time_int = array_combine($eve_time, $eve_int);
                        foreach($eve_time_int as $key => $val):
                    ?>
                    <td><?= $key ?></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td class="info">每期应付利息</td>
                    <?php
                        foreach($eve_time_int as $key => $val):
                    ?>
                    <td><?= number_format($val, 2) ?></td>
                    <?php endforeach; ?>
                </tr> 
            </tbody>
        </table>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => '确认函扫描件',
                'format' => 'raw',
                'value' => $model->pdf == null ? Html::a('上传', ['contract/upload-confirmation', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) : $pdfUrl,
            ],
            [
                'label' => '删除确认函扫描件',
                'format' => 'raw',
                'value' => $model->pdf !== null ? Html::a('删除确认函', ['contract/delete-confirmation', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => '您确定要删除该确认函吗？',
                    ],
                ]) : '暂未上传，无法删除。',
            ],
        ],
    ]) ?>
    <?php 
        /** 
         * 人民币小写转大写 
         * 
         * @param string $number 数值 
         * @param string $int_unit 币种单位，默认"元"，有的需求可能为"圆" 
         * @param bool $is_round 是否对小数进行四舍五入 
         * @param bool $is_extra_zero 是否对整数部分以0结尾，小数存在的数字附加0,比如1960.30， 
         *             有的系统要求输出"壹仟玖佰陆拾元零叁角"，实际上"壹仟玖佰陆拾元叁角"也是对的 
         * @return string 
         */ 
        function num2rmb($number = 0, $int_unit = '元', $is_round = TRUE, $is_extra_zero = FALSE) 
        { 
            // 将数字切分成两段 
            $parts = explode('.', $number, 2); 
            $int = isset($parts[0]) ? strval($parts[0]) : '0'; 
            $dec = isset($parts[1]) ? strval($parts[1]) : ''; 
         
            // 如果小数点后多于2位，不四舍五入就直接截，否则就处理 
            $dec_len = strlen($dec); 
            if (isset($parts[1]) && $dec_len > 2) 
            { 
                $dec = $is_round 
                        ? substr(strrchr(strval(round(floatval("0.".$dec), 2)), '.'), 1) 
                        : substr($parts[1], 0, 2); 
            } 
         
            // 当number为0.001时，小数点后的金额为0元 
            if(empty($int) && empty($dec)) 
            { 
                return '零'; 
            } 
         
            // 定义 
            $chs = array('0','壹','贰','叁','肆','伍','陆','柒','捌','玖'); 
            $uni = array('','拾','佰','仟'); 
            $dec_uni = array('角', '分'); 
            $exp = array('', '万'); 
            $res = ''; 
         
            // 整数部分从右向左找 
            for($i = strlen($int) - 1, $k = 0; $i >= 0; $k++) 
            { 
                $str = ''; 
                // 按照中文读写习惯，每4个字为一段进行转化，i一直在减 
                for($j = 0; $j < 4 && $i >= 0; $j++, $i--) 
                { 
                    $u = $int{$i} > 0 ? $uni[$j] : ''; // 非0的数字后面添加单位 
                    $str = $chs[$int{$i}] . $u . $str; 
                } 
                //echo $str."|".($k - 2)."<br>"; 
                $str = rtrim($str, '0');// 去掉末尾的0 
                $str = preg_replace("/0+/", "零", $str); // 替换多个连续的0 
                if(!isset($exp[$k])) 
                { 
                    $exp[$k] = $exp[$k - 2] . '亿'; // 构建单位 
                } 
                $u2 = $str != '' ? $exp[$k] : ''; 
                $res = $str . $u2 . $res; 
            } 
         
            // 如果小数部分处理完之后是00，需要处理下 
            $dec = rtrim($dec, '0'); 
         
            // 小数部分从左向右找 
            if(!empty($dec)) 
            { 
                $res .= $int_unit; 
         
                // 是否要在整数部分以0结尾的数字后附加0，有的系统有这要求 
                if ($is_extra_zero) 
                { 
                    if (substr($int, -1) === '0') 
                    { 
                        $res.= '零'; 
                    } 
                } 
         
                for($i = 0, $cnt = strlen($dec); $i < $cnt; $i++) 
                { 
                    $u = $dec{$i} > 0 ? $dec_uni[$i] : ''; // 非0的数字后面添加单位 
                    $res .= $chs[$dec{$i}] . $u; 
                } 
                $res = rtrim($res, '0');// 去掉末尾的0 
                $res = preg_replace("/0+/", "零", $res); // 替换多个连续的0 
            } 
            else 
            { 
                $res .= $int_unit . '整'; 
            } 
            return $res; 
    } ?>
</div>
