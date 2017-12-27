<?php
use backend\assets\LoginAsset;
LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<head>
	<title><?= $this->title ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->head() ?>
</head>
<body class="templatemo-bg-image-1">
    <?php $this->beginBody() ?>
    	<div class="container">
    		<div class="col-md-6 col-md-offset-3">			
    	       <?= $content ?>
    		</div>
    	</div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>