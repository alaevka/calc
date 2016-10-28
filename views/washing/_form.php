<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
    use wbraganca\dynamicform\DynamicFormWidget;
?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.own-price').keyup(function(){
            var this_val = $(this).val();
            var result_price = this_val*1.5;
            var parent = $(this).parent().parent().parent().parent();
            parent.find('.partners-price').val(result_price.toFixed(2));
           
        });
    });
</script>
<?php $form = ActiveForm::begin([
    'id' => 'washing-form',
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'options' => ['class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'],
    'fieldConfig' => [
    'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-offset-3 col-sm-5\">{error}\n{hint}</div>",
    'labelOptions' => ['class' => 'col-sm-3 control-label'],
    ],
]); ?>

<?php echo $form->errorSummary($model); ?>

<?= $form->field($model, 'name')->textInput() ?>


            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsWashingPrices[0],
                'formId' => 'washing-form',
                'formFields' => [
                    'material_id',
                    'price',
                    'price_for_partners',
                ],
            ]); ?>

            <div class="container-items col-lg-offset-2 col-lg-10" style="margin-top: 20px;"><!-- widgetContainer -->
            <legend>Матрица ценообразования</legend>
            <div class="alert alert-info"><strong>Внимание!</strong> Цены для партнеров формируются автоматически (наценка 50%) при вводе основной цены мойки. Но вы можете изменить эту цену самостоятельно.</div>
            <?php foreach ($modelsWashingPrices as $i => $modelWashingPrices): ?>
                <div class="item col-md-12"><!-- widgetBody -->
                    
                        <?php
                            // necessary for update action.
                            if (! $modelWashingPrices->isNewRecord) {
                                echo Html::activeHiddenInput($modelWashingPrices, "[{$i}]id");
                            }
                        ?>

                        <div class="row item-content">
                            <div class="col-md-3">
                                <?= $form->field($modelWashingPrices, "[{$i}]material_id", ['template' => '{label}<div class="col-sm-8">{input}</div>', 'labelOptions' => ['class' => 'col-sm-4 control-label']])->dropDownList(yii\helpers\Arrayhelper::map(\app\models\Material::find()->asArray()->all(), 'id', 'name')) ?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($modelWashingPrices, "[{$i}]price", ['template' => '{label}<div class="col-sm-9">{input}</div>'])->textInput(['type' => 'number', 'class' => 'form-control own-price']) ?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($modelWashingPrices, "[{$i}]price_for_partners", ['template' => '{label}<div class="col-sm-7">{input}</div>', 'labelOptions' => ['class' => 'col-sm-5 control-label']])->textInput(['type' => 'number', 'class' => 'form-control partners-price']) ?>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="entypo-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="entypo-minus"></i></button>
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
     <div class="clearfix"></div>
    <hr>

    <div class="form-group">
        <div class="col-lg-offset-3 col-lg-9">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Добавить мойку' : 'Изменить данные мойки', ['class' => 'btn btn-blue']) ?><br>
        </div>
    </div>	

    <?php ActiveForm::end(); ?>