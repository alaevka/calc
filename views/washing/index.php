<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\Html;

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
					<li class="active">
						<strong>Список интегрированных моек</strong>
					</li>
				</ol>
				<div class="clear"></div>

				<a href="<?= Url::to(['/washing/create']) ?>" class="btn btn-success pull-right">Добавить мойку</a>
				<div class="clear"></div>
				<div class="grid-block">
					<?= GridView::widget([
					    'dataProvider' => $dataProvider,
					    'filterModel' => $searchModel,
					    'rowOptions' => function ($model, $key, $index, $grid) {
					        return ['data-sortable-id' => $model->id];
					    },
					    'tableOptions' => ['class'=>'table table-striped table-bordered table-hover dataTables-example'],
					    'layout' => "<div class=\"pull-right\">{summary}</div>\n{items}\n{pager}",
					    'columns' => [
					        [
					            'attribute' => 'name',
					        ],
				            [
				                'class' => 'yii\grid\ActionColumn',
				                'contentOptions' => ['class' => 'actions_row'],
				                'template' => '{update} {delete}',
				                'buttons' => [
				                    'update' => function ($url, $model) {
				                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', $url, [
				                            'class' => 'btn btn-xs btn-primary',
				                            'title' => Yii::t('yii', 'Update'),
				                        ]);
				                    },
				                    'delete' => function ($url, $model) {
				                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
				                            'class' => 'btn btn-xs btn-danger',
				                            'data-method' => 'post',
				                            'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?',
				                            'title' => Yii::t('yii', 'Delete'),
				                        ]);
				                    },
				                ]
				            ],
					    ],
					]); ?>	
				</div>
			</div>
		</div>
	</div>
</div>