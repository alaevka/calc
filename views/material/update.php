<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
$this->title = 'Система расчета изделий из искуственного камня';
?>


<div class="row">
	<div class="col-md-12">	
	<?= $this->render('@app/views/_top_menu', ['tab' => 7]) ?>
		<div class="tab-content">
			<div class="tab-pane active" id="tab1-data">
				<ol class="breadcrumb bc-3 pull-right">
					<li>
						<a href="<?= Url::to(['/site/index']) ?>"><i class="fa-home"></i>Система расчета изделий</a>
					</li>
					<li>
						Настройки
					</li>
					<li>
						<a href="<?= Url::to(['/material/index']) ?>">Список материалов</a>
					</li>
					<li class="active">
						<strong>Изменение материала</strong>
					</li>
				</ol>
				<div class="clear"></div>
				
				<div class="grid-block">
					<?= $this->render('_form', [
				        'model' => $model,
				    ]) ?>		
				</div>
			</div>
		</div>
	</div>
</div>