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

    <label class="control-label d-block" for="<?= isset($options['id']) ? $options['id'] : '' ?>">
        <?= Yii::t('app', "Логотип администратора") ?>
    </label>
    <i>
        <?= Yii::t('app', "Рекомендуемый формат: {format} Рекомендуемый размер: {size}", [
            'format' => isset($options['format']) ? $options['format'] : '',
            'size' => isset($options['size']) ? $options['size'] : ''
        ]) ?>
    </i>
    <div class="row pt-2">
        <div class="col-xl-4 col-lg-5">
            <?= $form->field($model, $name)->fileInput($options)->label(false) ?>
        </div>
    </div>

</div>