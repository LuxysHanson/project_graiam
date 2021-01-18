<?php
/**
 * @var $model mixed
 * @var $form ActiveForm
 * @var $name string
 * @var $options array
 */

use yii\bootstrap\ActiveForm;

?>

<div class="image-field-wrap">
    <div class="row">
        <div class="col-4">
            <?= $form->field($model, $name)->fileInput($options) ?>
        </div>
    </div>
</div>