<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

	<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'text')->widget(CKEditor::className(), [
		'options' => ['rows' => 9],
		'preset' => 'full'
		]) ?>

		<?= $form->field($model, 'img')->fileInput() ?>
		<?php if(!$model->isNewRecord){ ?>
		<div class="form-group">
			<img src="<?=$model->img?>" width="380" height="220">
		</div>
		<?php } ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

</div>
