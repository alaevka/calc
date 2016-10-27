<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'material-form',
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
    'fieldConfig' => [
    'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
    'labelOptions' => ['class' => 'col-sm-3 control-label'],
    ],
]); ?>

<?php echo $form->errorSummary($model); ?>

<?= $form->field($model, 'name')->textInput() ?>

<?= $form->field($model, 'cost_price')->textInput() ?>

<?= $form->field($model, 'plywood_glue_on_1mkv')->textInput() ?>

<?= $form->field($model, 'cheat_profit_on_1mkv')->textInput() ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить материал' : 'Изменить данные материала', ['class' => 'btn btn-blue']) ?><br>
    </div>
</div>	

<?php ActiveForm::end(); ?>