<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'options-form',
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
    'fieldConfig' => [
    'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
    'labelOptions' => ['class' => 'col-sm-3 control-label'],
    ],
]); ?>

<?php echo $form->errorSummary($model); ?>

<?= $form->field($model, 'usd_current_value')->textInput() ?>

<?= $form->field($model, 'wrapping_of_the_retail_price')->textInput() ?>

<?= $form->field($model, 'cut_under_the_hob')->textInput() ?>

<?= $form->field($model, 'cut_under_the_sink_type1')->textInput() ?>

<?= $form->field($model, 'cut_under_the_sink_type2')->textInput() ?>

<?= $form->field($model, 'cut_under_the_sink_type3')->textInput() ?>

<?= $form->field($model, 'cut_under_the_sink_type4')->textInput() ?>

<?= $form->field($model, 'cut_under_the_sink_type5')->textInput() ?>

<?= $form->field($model, 'skirting_type1')->textInput() ?>

<?= $form->field($model, 'skirting_type2')->textInput() ?>

<?= $form->field($model, 'edge_type1')->textInput() ?>

<?= $form->field($model, 'edge_type2')->textInput() ?>

<?= $form->field($model, 'edge_type3')->textInput() ?>

<?= $form->field($model, 'radius_elements')->textInput() ?>

<?= $form->field($model, 'product_install')->textInput() ?>

<?= $form->field($model, 'wall_panel_install')->textInput() ?>

<?= $form->field($model, 'shipment')->textInput() ?>


<?= $form->field($model, 'protochka_stoka_vody')->textInput() ?>

<?= $form->field($model, 'podstavka_goryachee')->textInput() ?>

<?= $form->field($model, 'demontaj_izdelia')->textInput() ?>

<?= $form->field($model, 'montaj_podokonnikov')->textInput() ?>

<?= $form->field($model, 'podlojka_fanera')->textInput() ?>

<?= $form->field($model, 'kreplenia')->textInput() ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= \yii\helpers\Html::submitButton('Сохранить изменения', ['class' => 'btn btn-blue']) ?><br>
    </div>
</div>	

<?php ActiveForm::end(); ?>