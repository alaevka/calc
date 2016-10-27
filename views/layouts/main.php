<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\View;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page-body">
<?php $this->beginBody() ?>

<div class="page-container horizontal-menu">
	<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		<div class="navbar-inner">
			<!-- logo -->
			<div class="navbar-brand">
				<a href="<?= Url::to(['/site/index']) ?>">
					Система расчета изделий из искуственного камня
				</a>
			</div>
			
			<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">
				<!-- dropdowns -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-mail"></i>
						<span class="badge badge-secondary">10</span>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li>
						<ul class="dropdown-menu-list scroller">
							<li class="active">
								<a href="#">
									
									
									<span class="line">
										<strong>Администратор</strong>
										- вчера
									</span>
									
									<span class="line desc small">
										Омега 813 и др. интегрированные мойки  никогда не вписаны в наряд заказ, нужно тоже чтобы калькулятор их туда заносил..
									</span>
								</a>
							</li>
							
							<li class="active">
								<a href="#">
									
									
									<span class="line">
										<strong>Администратор</strong>
										- 2 дня назад
									</span>
									
									<span class="line desc small">
										Проточки тоже нужно вписывать в наряд заказ..
									</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									
									
									<span class="line">
										<strong>Администратор</strong>
										- неделю назад
									</span>
									
									<span class="line desc small">
										Стоимость за монтаж  1 500р. минимум..
									</span>
								</a>
							</li>
							
							<li>
								<a href="#">
									
									
									<span class="line">
										<strong>Администратор</strong>
										- 16 дней назад
									</span>
									
									<span class="line desc small">
										Этажи в наряд заказе не вписаны, соответственно монтаж план никогда не соответствует действительности..
									</span>
								</a>
							</li>
					</ul>
				</li>

				<li class="external">
					<a href="mailbox.html">Все новости..</a>
				</li>					
				</ul>
					
				</li>
				
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-globe"></i>
						<span class="badge badge-warning">3</span>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li class="top">
	<p class="small">
		У вас имеется <strong>3</strong> не отправленных в CRM расчета
	</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-forward pull-right"></i>
				
				<span class="line">
					<strong>Расчет id 7238492</strong>
				</span>
				
				<span class="line small">
					создан 16.09.2016 17:33
				</span>
			</a>
		</li>
		
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-forward pull-right"></i>
				
				<span class="line">
					<strong>Расчет id 7232492</strong>
				</span>
				
				<span class="line small">
					создан 14.09.2016 10:23
				</span>
			</a>
		</li>
		
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-forward pull-right"></i>
				
				<span class="line">
					<strong>Расчет id 2332492</strong>
				</span>
				
				<span class="line small">
					создан 10.09.2016 13:10
				</span>
			</a>
		</li>
		
		
	</ul>
</li>

<li class="external">
	<a href="#">Показать все не отправленные в CRM расчеты</a>
</li>					</ul>
				
				</li>
				
				<!-- raw links -->
				<li>
					<a href="">Вы вошли как: <?= Yii::$app->user->identity->username ?></a>
				</li>
		
				
				<li class="sep"></li>
				
				<li>
					<a data-method="post" href="<?= Url::to(['/user/security/logout']) ?>">
						Выйти из системы <i class="entypo-logout right"></i>
					</a>
				</li>
				
				
				<!-- mobile only -->
				<li class="visible-xs">	
				
					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>
					
				</li>
				
			</ul>
	
		</div>
		
	</header>
	<div class="main-content">

		<?= $content ?>

		<!-- Footer -->
		<footer class="main">

			&copy; 2016 <strong>ООО "МК" Группа компаний</strong> Система расчета изделий из искуственного камня

		</footer>
	</div>
</div>
<?php if (Yii::$app->getSession()->hasFlash('flash_message')): ?>
    <?=
        $this->registerJs(
            "
            	toastr.info('".Yii::$app->getSession()->getFlash('flash_message')."');
            ", 
            View::POS_END, 
            'flash_message'
        );
    ?>
<?php endif; ?>   

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
