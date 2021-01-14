<?php
/** @var $model UsersProfile */
/** @var $form ActiveForm */

use backend\models\UsersProfile;
use yii\bootstrap\ActiveForm;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Основные данные") ?></h4>

<div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>

<?= $form->field($model, 'image')->fileInput(['accept' => 'image/*']) ?>
