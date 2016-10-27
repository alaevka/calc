<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;

$this->title = 'Система расчета изделий из искуственного камня';
?>
<script type="text/javascript">
	jQuery(document).ready(function () {
		$('#calculation-cut_under_the_hob').keyup(function() {
			var cut_under_the_hob_total = $('#calculation-hidden_cut_under_the_hob_for_one').val()*$(this).val();
			$('#cut_under_the_hob_total').text('Итоговая цена, руб: '+cut_under_the_hob_total.toFixed(2));
		});
		$('#calculation-cut_under_the_sink').keyup(function() {
			var cut_under_the_sink_total = $('#calculation-hidden_cut_under_the_sink_for_one').val()*$(this).val();
			$('#cut_under_the_sink_total').text('Итоговая цена, руб: '+cut_under_the_sink_total.toFixed(2));
		});
		$('#calculation-skirting').keyup(function() {
			var skirting_total = $('#calculation-hidden_skirting_for_one').val()*$(this).val();
			$('#skirting_total').text('Итоговая цена, руб: '+skirting_total.toFixed(2));
		});

		$('#calculation-edge').keyup(function() {
			var edge_total = $('#calculation-hidden_edge_for_one').val()*$(this).val();
			$('#edge_total').text('Итоговая цена, руб: '+edge_total.toFixed(2));
		});
		$('#calculation-edge_size').change(function(){
			var edge_type = $('#calculation-edge_type').val();
    		var edge_size = $(this).val(); 
    		var material = $('#calculation-material').val();
    		$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/calculation/edgetypeprice',
				data: 'type_id='+edge_type+'&edge_size='+edge_size+'&material='+material,
				success: function(data,status){
					$('#calculation-hidden_edge_for_one').val(data);
					$('#edge_for_one_price').text('Цена за ед, руб: '+data);
					var edge_total = data*$('#calculation-edge').val();
					$('#edge_total').text('Итоговая цена, руб: '+edge_total.toFixed(2));
				}
			});
		});
		$('#calculation-hem').keyup(function() {
			var hem_total = $('#calculation-hidden_hem_for_one').val()*$(this).val();
			$('#hem_total').text('Итоговая цена, руб: '+hem_total.toFixed(2));
		});
		$('#calculation-hem_size').change(function(){
    		var hem_size = $(this).val(); 
    		var material = $('#calculation-material').val();
    		$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/calculation/hemprice',
				data: 'hem_size='+hem_size+'&material='+material,
				success: function(data,status){
					$('#calculation-hidden_hem_for_one').val(data);
					$('#hem_for_one_price').text('Цена за ед, руб: '+data);
					var hem_total = data*$('#calculation-hem').val();
					$('#hem_total').text('Итоговая цена, руб: '+hem_total.toFixed(2));
				}
			});
		});
		$('#calculation-radius_elements').keyup(function() {
			var radius_elements_total = $('#calculation-hidden_radius_elements_for_one').val()*$(this).val();
			$('#radius_elements_total').text('Итоговая цена, руб: '+radius_elements_total.toFixed(2));
		});

	});
</script>

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
						Мои расчеты
					</li>
					<li class="active">
						<strong>Создание расчета</strong>
					</li>
				</ol>
				<div class="clear"></div>
				<div class="alert alert-info"><strong>Внимание!</strong> Все поля являются обязательными для заполнения.</div>

				<?php $form = ActiveForm::begin([
				    'id' => 'create-calculation-form',
				    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
				    'fieldConfig' => [
		        		'template' => "{label}\n<div class=\"col-sm-6\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-6\">{error}\n{hint}</div>",
		        		'labelOptions' => ['class' => 'col-sm-3 control-label'],
		        	],
				]); ?>

				<?= $form->field($model, 'material')->widget(Select2::classname(), [
					    'data' => yii\helpers\Arrayhelper::map(\app\models\Material::find()->asArray()->all(), 'id', 'name'),
					    'language' => 'ru',
					    'options' => ['placeholder' => 'Укажите материал изделия...'],
					    'pluginOptions' => [
					        'allowClear' => true
					    ],
					]);
				?>

				<?= $form->field($model, 'product_surface_area')->textInput() ?>

				<?= $form->field($model, 'wall_panel_surface_area')->textInput() ?>

				<legend class="col-lg-offset-3 col-lg-9">Параметры расчета</legend>
				
				<?= $form->field($model, 'hidden_cut_under_the_hob_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'cut_under_the_hob', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert">Цена за ед, руб: '.$cut_under_the_hob_for_one.'</div><div class="col-sm-2 central-vert total-price" id="cut_under_the_hob_total">Итоговая цена, руб: '.$cut_under_the_hob_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput() ?>
				
				<?= $form->field($model, 'cut_under_the_sink_type')->widget(Select2::classname(), [
					    'data' => [1 => 'без монтажа мойки', 2 => 'под накладной монтаж мойки', 3 => 'с подстольным монтажом мойки', 4 => 'под монтаж в уровень', 5 => 'с монтажом интегрированной мойки'],
					    'language' => 'ru',
					    'options' => ['placeholder' => 'Укажите тип выреза под мойку...'],
					    'pluginOptions' => [
					        'allowClear' => true,
					    ],
					    'pluginEvents' => [
					    	"change" => "function(e) { 
					    		var cut_under_the_sink_type = $(this).val(); 
					    		$.ajax({
									type: 'POST',
									dataType: 'json',
									url: '/calculation/sinktypeprice',
									data: 'type_id='+cut_under_the_sink_type,
									success: function(data,status){
										$('#calculation-hidden_cut_under_the_sink_for_one').val(data);
										$('#cut_under_the_sink_for_one_price').text('Цена за ед, руб: '+data);
										var cut_under_the_sink_total = data*$('#calculation-cut_under_the_sink').val();
										$('#cut_under_the_sink_total').text('Итоговая цена, руб: '+cut_under_the_sink_total.toFixed(2));
									}
								});

					    	}",
					    ]
					]);
				?>
				
				<?= $form->field($model, 'hidden_cut_under_the_sink_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'cut_under_the_sink', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="cut_under_the_sink_for_one_price">Цена за ед, руб: '.$cut_under_the_sink_for_one.'</div><div class="col-sm-2 central-vert total-price" id="cut_under_the_sink_total">Итоговая цена, руб: '.$cut_under_the_sink_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput() ?>

				<?= $form->field($model, 'skirting_type')->widget(Select2::classname(), [
					    'data' => [1 => 'накладной', 2 => 'интегрированный'],
					    'language' => 'ru',
					    'options' => ['placeholder' => 'Укажите бортик...'],
					    'pluginOptions' => [
					        'allowClear' => true,
					    ],
					    'pluginEvents' => [
					    	"change" => "function(e) { 
					    		var skirting_type = $(this).val(); 
					    		$.ajax({
									type: 'POST',
									dataType: 'json',
									url: '/calculation/skirtingtypeprice',
									data: 'type_id='+skirting_type,
									success: function(data,status){
										$('#calculation-hidden_skirting_for_one').val(data);
										$('#skirting_for_one_price').text('Цена за ед, руб: '+data);
										var skirting_total = data*$('#calculation-skirting').val();
										$('#skirting_total').text('Итоговая цена, руб: '+skirting_total.toFixed(2));
									}
								});

					    	}",
					    ]
					]);
				?>

				<?= $form->field($model, 'hidden_skirting_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'skirting', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="skirting_for_one_price">Цена за ед, руб: '.$skirting_for_one.'</div><div class="col-sm-2 central-vert total-price" id="skirting_total">Итоговая цена, руб: '.$skirting_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput() ?>

				
				<div class="form-group field-calculation-edge_type">
					<label class="col-sm-3 control-label" for="calculation-edge_type">Кромка</label>
					<div class="col-sm-3">
						<?= $form->field($model, 'edge_type', ['options' => ['class' =>'sdsd'], 'template' => '{input}'])->widget(Select2::classname(), [
						    'data' => [1 => 'стандартная', 2 => 'фигурная', 3 => 'антиперелив'],
						    'language' => 'ru',
						    'options' => ['placeholder' => 'Укажите кромку...'],
						    'pluginOptions' => [
						        'allowClear' => true,
						    ],
						    'pluginEvents' => [
						    	"change" => "function(e) { 
						    		var edge_type = $(this).val(); 
						    		var edge_size = $('#calculation-edge_size').val();
						    		var material = $('#calculation-material').val();
						    		$.ajax({
										type: 'POST',
										dataType: 'json',
										url: '/calculation/edgetypeprice',
										data: 'type_id='+edge_type+'&edge_size='+edge_size+'&material='+material,
										success: function(data,status){
											$('#calculation-hidden_edge_for_one').val(data);
											$('#edge_for_one_price').text('Цена за ед, руб: '+data);
											var edge_total = data*$('#calculation-edge').val();
											$('#edge_total').text('Итоговая цена, руб: '+edge_total.toFixed(2));
										}
									});

						    	}",
						    ]
						])->label(false);
					?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'edge_size', ['template' => '{label}<div class="col-sm-6">{input}</div>', 'labelOptions' => ['class' => 'col-sm-6 control-label']])->dropDownList([40 => '40 мм', 50 => '50 мм', 60 => '60 мм', 70 => '70 мм', 80 => '80 мм', 90 => '90 мм', 100 => '100 мм']) ?>
					</div>
				</div>

				<?= $form->field($model, 'hidden_edge_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'edge', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="edge_for_one_price">Цена за ед, руб: '.$edge_for_one.'</div><div class="col-sm-2 central-vert total-price" id="edge_total">Итоговая цена, руб: '.$edge_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput() ?>
				
				
				<?= $form->field($model, 'hem_size')->dropDownList([40 => '40 мм', 50 => '50 мм', 60 => '60 мм', 70 => '70 мм', 80 => '80 мм', 90 => '90 мм', 100 => '100 мм']) ?>
				<?= $form->field($model, 'hidden_hem_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'hem', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="hem_for_one_price">Цена за ед, руб: '.$hem_for_one.'</div><div class="col-sm-2 central-vert total-price" id="hem_total">Итоговая цена, руб: '.$hem_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput() ?>
				
				<?= $form->field($model, 'hidden_radius_elements_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'radius_elements', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert">Цена за ед, руб: '.$radius_elements_for_one.'</div><div class="col-sm-2 central-vert total-price" id="radius_elements_total">Итоговая цена, руб: '.$radius_elements_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput() ?>

				


				<hr>
				<div class="submit-button col-lg-offset-3 col-sm-6">
					<?= Html::submitButton('Создать расчет', ['class' => 'btn btn-blue']) ?> <?= Html::submitButton('Сохранить как черновик', ['class' => 'btn btn-default']) ?> <a class="btn btn-red pull-right" href="<?= Url::to(['/calculation/create']) ?>">Очистить форму калькулятора</a>
				</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>