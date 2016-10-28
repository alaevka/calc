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
		$('#calculation-cut_under_the_hob').bind('keyup change mouseup', function() {
			var cut_under_the_hob_total = $('#calculation-hidden_cut_under_the_hob_for_one').val()*$(this).val();
			$('#cut_under_the_hob_total').text('Итого, руб: '+cut_under_the_hob_total.toFixed(2));
		});
		$('#calculation-cut_under_the_sink').bind('keyup change mouseup', function() {
			var cut_under_the_sink_total = $('#calculation-hidden_cut_under_the_sink_for_one').val()*$(this).val();
			$('#cut_under_the_sink_total').text('Итого, руб: '+cut_under_the_sink_total.toFixed(2));
		});
		$('#calculation-skirting').bind('keyup change mouseup', function() {
			var skirting_total = $('#calculation-hidden_skirting_for_one').val()*$(this).val();
			$('#skirting_total').text('Итого, руб: '+skirting_total.toFixed(2));
		});

		$('#calculation-edge').bind('keyup change mouseup', function() {
			var edge_total = $('#calculation-hidden_edge_for_one').val()*$(this).val();
			$('#edge_total').text('Итого, руб: '+edge_total.toFixed(2));
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
					$('#edge_total').text('Итого, руб: '+edge_total.toFixed(2));
				}
			});
		});
		$('#calculation-hem').bind('keyup change mouseup', function() {
			var hem_total = $('#calculation-hidden_hem_for_one').val()*$(this).val();
			$('#hem_total').text('Итого, руб: '+hem_total.toFixed(2));
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
					$('#hem_total').text('Итого, руб: '+hem_total.toFixed(2));
				}
			});
		});
		$('#calculation-radius_elements').bind('keyup change mouseup', function() {
			var radius_elements_total = $('#calculation-hidden_radius_elements_for_one').val()*$(this).val();
			$('#radius_elements_total').text('Итого, руб: '+radius_elements_total.toFixed(2));
		});
		$('#calculation-product_surface_area').bind('keyup change mouseup', function() {
			var product_surface_area = $(this).val();
			var wall_panel_surface_area = $('#calculation-wall_panel_surface_area').val();
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/calculation/installprice',
				data: 'product_surface_area='+product_surface_area+'&wall_panel_surface_area='+wall_panel_surface_area,
				success: function(data,status){
					$('#product_and_wall_panel_install_for_one').text('Цена за ед, руб: '+data.toFixed(2));
					$('#calculation-hidden_product_and_wall_panel_install_for_one').val(data);
					var product_and_wall_panel_install = $('#calculation-product_and_wall_panel_install').val();
					var total_install = product_and_wall_panel_install*data;
					$('#product_and_wall_panel_install_total').text('Итого, руб: '+total_install.toFixed(2));
				}
			});
		});

		$('#calculation-wall_panel_surface_area').bind('keyup change mouseup', function() {
			var product_surface_area = $('#calculation-product_surface_area').val();
			var wall_panel_surface_area = $(this).val();
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '/calculation/installprice',
				data: 'product_surface_area='+product_surface_area+'&wall_panel_surface_area='+wall_panel_surface_area,
				success: function(data,status){
					$('#product_and_wall_panel_install_for_one').text('Цена за ед, руб: '+data.toFixed(2));
					$('#calculation-hidden_product_and_wall_panel_install_for_one').val(data);
					var product_and_wall_panel_install = $('#calculation-product_and_wall_panel_install').val();
					var total_install = product_and_wall_panel_install*data;
					$('#product_and_wall_panel_install_total').text('Итого, руб: '+total_install.toFixed(2));
				}
			});
		});

		$('#calculation-product_and_wall_panel_install').bind('keyup change mouseup', function() {
			if($('#calculation-hidden_product_and_wall_panel_install_for_one').val() != 0) {
				var product_and_wall_panel_install_total = $('#calculation-hidden_product_and_wall_panel_install_for_one').val()*$(this).val();
				$('#product_and_wall_panel_install_total').text('Итого, руб: '+product_and_wall_panel_install_total.toFixed(2));
			}
		});

		$('#calculation-shipment').bind('keyup change mouseup', function() {
			var shipment_total = $('#calculation-hidden_shipment_for_one').val()*$(this).val();
			$('#shipment_total').text('Итого, руб: '+shipment_total.toFixed(2));
		});
		$('#calculation-washing').bind('keyup change mouseup', function() {
			var washing_total = $('#calculation-hidden_washing_for_one').val()*$(this).val();
			$('#washing_total').text('Итого, руб: '+washing_total.toFixed(2));
		});

		$('#calculation-protochka_stoka_vody').bind('keyup change mouseup', function() {
			var protochka_stoka_vody_total = $('#calculation-hidden_protochka_stoka_vody_for_one').val()*$(this).val();
			$('#protochka_stoka_vody_total').text('Итого, руб: '+protochka_stoka_vody_total.toFixed(2));
		});
		$('#calculation-podstavka_goryachee').bind('keyup change mouseup', function() {
			var podstavka_goryachee_total = $('#calculation-hidden_podstavka_goryachee_for_one').val()*$(this).val();
			$('#podstavka_goryachee_total').text('Итого, руб: '+podstavka_goryachee_total.toFixed(2));
		});
		$('#calculation-demontaj_izdelia').bind('keyup change mouseup', function() {
			var demontaj_izdelia_total = $('#calculation-hidden_demontaj_izdelia_for_one').val()*$(this).val();
			$('#demontaj_izdelia_total').text('Итого, руб: '+demontaj_izdelia_total.toFixed(2));
		});
		$('#calculation-montaj_podokonnikov').bind('keyup change mouseup', function() {
			var montaj_podokonnikov_total = $('#calculation-hidden_montaj_podokonnikov_for_one').val()*$(this).val();
			$('#montaj_podokonnikov_total').text('Итого, руб: '+montaj_podokonnikov_total.toFixed(2));
		});
		$('#calculation-podlojka_fanera').bind('keyup change mouseup', function() {
			var podlojka_fanera_total = $('#calculation-hidden_podlojka_fanera_for_one').val()*$(this).val();
			$('#podlojka_fanera_total').text('Итого, руб: '+podlojka_fanera_total.toFixed(2));
		});
		$('#calculation-kreplenia').bind('keyup change mouseup', function() {
			var kreplenia_total = $('#calculation-hidden_kreplenia_for_one').val()*$(this).val();
			$('#kreplenia_total').text('Итого, руб: '+kreplenia_total.toFixed(2));
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

				<legend class="col-lg-offset-3 col-lg-9">Основные данные</legend>

				<?= $form->field($model, 'material')->widget(Select2::classname(), [
					    'data' => yii\helpers\Arrayhelper::map(\app\models\Material::find()->asArray()->all(), 'id', 'name'),
					    'language' => 'ru',
					    'options' => ['placeholder' => 'Укажите материал изделия...'],
					    'pluginOptions' => [
					        'allowClear' => true
					    ],
					]);
				?>

				<?= $form->field($model, 'product_surface_area')->textInput(['type' => 'number']) ?>

				<?= $form->field($model, 'wall_panel_surface_area')->textInput(['type' => 'number']) ?>

				<legend class="col-lg-offset-3 col-lg-9">Параметры расчета</legend>
				
				<?= $form->field($model, 'hidden_cut_under_the_hob_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'cut_under_the_hob', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert">Цена за ед, руб: '.$cut_under_the_hob_for_one.'</div><div class="col-sm-2 central-vert total-price" id="cut_under_the_hob_total">Итого, руб: '.$cut_under_the_hob_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
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
										$('#cut_under_the_sink_total').text('Итого, руб: '+cut_under_the_sink_total.toFixed(2));
									}
								});

					    	}",
					    ]
					]);
				?>
				
				<?= $form->field($model, 'hidden_cut_under_the_sink_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'cut_under_the_sink', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="cut_under_the_sink_for_one_price">Цена за ед, руб: '.$cut_under_the_sink_for_one.'</div><div class="col-sm-2 central-vert total-price" id="cut_under_the_sink_total">Итого, руб: '.$cut_under_the_sink_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>

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
										$('#skirting_total').text('Итого, руб: '+skirting_total.toFixed(2));
									}
								});

					    	}",
					    ]
					]);
				?>

				<?= $form->field($model, 'hidden_skirting_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'skirting', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="skirting_for_one_price">Цена за ед, руб: '.$skirting_for_one.'</div><div class="col-sm-2 central-vert total-price" id="skirting_total">Итого, руб: '.$skirting_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>

				
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
											$('#edge_total').text('Итого, руб: '+edge_total.toFixed(2));
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
				<?= $form->field($model, 'edge', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="edge_for_one_price">Цена за ед, руб: '.$edge_for_one.'</div><div class="col-sm-2 central-vert total-price" id="edge_total">Итого, руб: '.$edge_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
				
				<?= $form->field($model, 'hem_size')->dropDownList([40 => '40 мм', 50 => '50 мм', 60 => '60 мм', 70 => '70 мм', 80 => '80 мм', 90 => '90 мм', 100 => '100 мм']) ?>
				<?= $form->field($model, 'hidden_hem_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'hem', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="hem_for_one_price">Цена за ед, руб: '.$hem_for_one.'</div><div class="col-sm-2 central-vert total-price" id="hem_total">Итого, руб: '.$hem_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
				<?= $form->field($model, 'hidden_radius_elements_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'radius_elements', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert">Цена за ед, руб: '.$radius_elements_for_one.'</div><div class="col-sm-2 central-vert total-price" id="radius_elements_total">Итого, руб: '.$radius_elements_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>

				<?= $form->field($model, 'hidden_product_and_wall_panel_install_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'product_and_wall_panel_install', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="product_and_wall_panel_install_for_one">Цена за ед, руб: '.$product_and_wall_panel_install_for_one.'</div><div class="col-sm-2 central-vert total-price" id="product_and_wall_panel_install_total">Итого, руб: '.$product_and_wall_panel_install_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>

				<?= $form->field($model, 'hidden_shipment_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'shipment', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="shipment_for_one">Цена за ед, руб: '.$shipment_for_one.'</div><div class="col-sm-2 central-vert total-price" id="shipment_total">Итого, руб: '.$shipment_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>



				<?= $form->field($model, 'washing_type', ['template' => '{label}<div class="col-sm-6">{input}<div><div id="washing_comment" style="color: #ff0000;"></div></div></div>'])->widget(Select2::classname(), [
					    'data' => yii\helpers\Arrayhelper::map(\app\models\Washing::find()->asArray()->all(), 'id', 'name'),
					    'language' => 'ru',
					    'options' => ['placeholder' => 'Укажите мойку...'],
					    'pluginOptions' => [
					        'allowClear' => true,
					    ],
					    'pluginEvents' => [
						    	"change" => "function(e) { 
						    		var washing_type = $(this).val(); 
						    		var material = $('#calculation-material').val();
						    		$.ajax({
										type: 'POST',
										dataType: 'json',
										url: '/calculation/washingprice',
										data: 'washing_type='+washing_type+'&material='+material,
										success: function(data,status){
											if(data != 'error') {
												$('#washing_comment').text('');
												$('#calculation-hidden_washing_for_one').val(data);
												$('#washing_for_one_price').text('Цена за ед, руб: '+data);
												var washing_total = data*$('#calculation-washing').val();
												$('#washing_total').text('Итого, руб: '+washing_total.toFixed(2));
											} else {
												$('#washing_comment').text('Для выбранной мойки и указанного материала цена не доступна');
												$('#washing_for_one_price').text('Цена за ед, руб: 0');
												$('#washing_total').text('Итого, руб: 0');
											}
										}
									});

						    	}",
						    ]
					]);
				?>

				
				<?= $form->field($model, 'hidden_washing_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'washing', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="washing_for_one_price">Цена за ед, руб: '.$washing_for_one.'</div><div class="col-sm-2 central-vert total-price" id="washing_total">Итого, руб: '.$washing_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>


				<hr>
	
				<?= $form->field($model, 'hidden_protochka_stoka_vody_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'protochka_stoka_vody', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="protochka_stoka_vody_for_one_price">Цена за ед, руб: '.$protochka_stoka_vody_for_one.'</div><div class="col-sm-2 central-vert total-price" id="protochka_stoka_vody_total">Итого, руб: '.$protochka_stoka_vody_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
				<?= $form->field($model, 'hidden_podstavka_goryachee_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'podstavka_goryachee', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="podstavka_goryachee_for_one_price">Цена за ед, руб: '.$podstavka_goryachee_for_one.'</div><div class="col-sm-2 central-vert total-price" id="podstavka_goryachee_total">Итого, руб: '.$podstavka_goryachee_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
				<?= $form->field($model, 'hidden_demontaj_izdelia_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'demontaj_izdelia', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="demontaj_izdelia_for_one_price">Цена за ед, руб: '.$demontaj_izdelia_for_one.'</div><div class="col-sm-2 central-vert total-price" id="demontaj_izdelia_total">Итого, руб: '.$demontaj_izdelia_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>

				<?= $form->field($model, 'hidden_montaj_podokonnikov_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'montaj_podokonnikov', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="montaj_podokonnikov_for_one_price">Цена за ед, руб: '.$montaj_podokonnikov_for_one.'</div><div class="col-sm-2 central-vert total-price" id="montaj_podokonnikov_total">Итого, руб: '.$montaj_podokonnikov_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
				<?= $form->field($model, 'hidden_podlojka_fanera_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'podlojka_fanera', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="podlojka_fanera_for_one_price">Цена за ед, руб: '.$podlojka_fanera_for_one.'</div><div class="col-sm-2 central-vert total-price" id="podlojka_fanera_total">Итого, руб: '.$podlojka_fanera_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>
				
				<?= $form->field($model, 'hidden_kreplenia_for_one', ['template'=>'{input}'])->hiddenInput() ?>
				<?= $form->field($model, 'kreplenia', ['template' => '{label}<div class="col-sm-2">{input}</div><div class="col-sm-2 central-vert" id="kreplenia_for_one_price">Цена за ед, руб: '.$kreplenia_for_one.'</div><div class="col-sm-2 central-vert total-price" id="kreplenia_total">Итого, руб: '.$kreplenia_total.'</div><div class="col-sm-offset-3 col-sm-6">{error}{hint}</div>'])->textInput(['type' => 'number']) ?>


				<hr>

				<?= $form->field($model, 'comment')->textArea(['rows' => 8]) ?>

				<hr>
				<div class="submit-button col-lg-offset-3 col-sm-6">
					<?= Html::submitButton('Создать расчет', ['class' => 'btn btn-blue']) ?> <?= Html::submitButton('Сохранить как черновик', ['class' => 'btn btn-default']) ?> <a class="btn btn-red pull-right" href="<?= Url::to(['/calculation/create']) ?>">Очистить форму калькулятора</a>
				</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>