<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'characteristics')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name')))?>

    <?= $form->field($model, 'rating')->input('number', ['min' => 1, 'max' => 5, 'step' => 1]) ?>

    <?= $form->field($model, 'category')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name')))?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'is_discounted')->checkbox() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'create_at')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'modificated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
