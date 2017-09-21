<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php $this->registerCssFile('/css/wx/weui.css') ?>
    <?php $this->registerCssFile('/css/wx/example.css') ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body ontouchstart>
<?php $this->beginBody() ?>
    <div class="container" id="container">
        <div class="page__bd" style="height: 100%;">
            <div class="weui-tab">
                <div class="weui-tab__panel">
                    <?= $content ?>
                </div>
                <div class="weui-tabbar" style="position: fixed;">
                    <a href="http://frontend.test.ewinjade.com/we-chat/about-us" class="weui-tabbar__item">
                        <span style="display: inline-block;position: relative;">
                            <img src="/img/wx/company.png" alt="" class="weui-tabbar__icon">
                            <!--<span class="weui-badge" style="position: absolute;top: -2px;right: -13px;">99</span>-->
                        </span>
                        <p class="weui-tabbar__label">关于我们</p>
                    </a>
                    <a href="http://frontend.test.ewinjade.com/we-chat/news" class="weui-tabbar__item">
                        <span style="display: inline-block;position: relative;">
                            <img src="/img/wx/news.png" alt="" class="weui-tabbar__icon">
                            <!--<span class="weui-badge weui-badge_dot" style="position: absolute;top: 0;right: -6px;"></span>-->
                        </span>
                        <p class="weui-tabbar__label">新闻动态</p>
                    </a>
                    <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf637ffef0c489df9&redirect_uri=http%3a%2f%2ffrontend.test.ewinjade.com%2fwe-chat%2fauth&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect" class="weui-tabbar__item">
                        <img src="/img/wx/me.png" alt="" class="weui-tabbar__icon">
                        <p class="weui-tabbar__label">个人中心</p>
                    </a>
                </div>
            </div>
        </div>
        <!--BEGIN actionSheet-->
        <div>
            <div class="weui-mask" id="iosMask" style="opacity: 0; display: none;"></div>
            <div class="weui-actionsheet" id="iosActionsheet">
                <div class="weui-actionsheet__title">
                    <p class="weui-actionsheet__title-text">这是一个标题，可以为一行或者两行。</p>
                </div>
                <div class="weui-actionsheet__menu">
                    <div class="weui-actionsheet__cell">示例菜单</div>
                    <div class="weui-actionsheet__cell">示例菜单</div>
                    <div class="weui-actionsheet__cell">示例菜单</div>
                    <div class="weui-actionsheet__cell">示例菜单</div>
                </div>
                <div class="weui-actionsheet__action">
                    <div class="weui-actionsheet__cell" id="iosActionsheetCancel">取消</div>
                </div>
            </div>
        </div>
        <div class="weui-skin_android" id="androidActionsheet" style="opacity: 0; display: none;">
            <div class="weui-mask"></div>
            <div class="weui-actionsheet">
                <div class="weui-actionsheet__menu">
                    <div class="weui-actionsheet__cell">示例菜单</div>
                    <div class="weui-actionsheet__cell">示例菜单</div>
                    <div class="weui-actionsheet__cell">示例菜单</div>
                </div>
            </div>
        </div>
        <!--END actionSheet-->   
        <script type="text/javascript" class="actionsheet js_show">
            // ios
            $(function(){
                var $iosActionsheet = $('#iosActionsheet');
                var $iosMask = $('#iosMask');

                function hideActionSheet() {
                    $iosActionsheet.removeClass('weui-actionsheet_toggle');
                    $iosMask.fadeOut(200);
                }

                $iosMask.on('click', hideActionSheet);
                $('#iosActionsheetCancel').on('click', hideActionSheet);
                $("#showIOSActionSheet").on("click", function(){
                    $iosActionsheet.addClass('weui-actionsheet_toggle');
                    $iosMask.fadeIn(200);
                });
            });
            // android
            $(function(){
                var $androidActionSheet = $('#androidActionsheet');
                var $androidMask = $androidActionSheet.find('.weui-mask');

                $("#showAndroidActionSheet").on('click', function(){
                    $androidActionSheet.fadeIn(200);
                    $androidMask.on('click',function () {
                        $androidActionSheet.fadeOut(200);
                    });
                });
            });
        </script>
    </div>
<?php $this->registerJsFile('/js/wx/zepto.min.js') ?>
<?php $this->registerJsFile('/js/wx/jweixin-1.0.0.js') ?>
<?php $this->registerJsFile('/js/wx/weui.min.js') ?>
<?php $this->registerJsFile('/js/wx/example.js') ?>
<?php $this->registerJsFile('/js/jquery-1.7.2.min.js') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
