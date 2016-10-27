<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Система расчета изделий из искуственного камня';
?>


<div class="row">
	<div class="col-md-12">	
	<?= $this->render('@app/views/_top_menu', ['tab' => 1]) ?>
		<div class="tab-content">
			<div class="tab-pane active" id="tab1-data">
				
				<ol class="breadcrumb bc-3 pull-right">
					<li>
						<a href="<?= Url::to(['/site/index']) ?>"><i class="fa-home"></i>Система расчета изделий</a>
					</li>
					<li class="active">
						<strong>Мои расчеты</strong>
					</li>
				</ol>
				<div class="clear"></div>
				<div class="col-sm-12"><a href="<?= Url::to(['/calculation/create']) ?>" class="btn btn-success pull-right">Создать расчет</a></div>
				<div>
					
				</div>
			</div>
		</div>
	</div>
</div>