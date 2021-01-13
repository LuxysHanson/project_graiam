<?php
/** @var $model Settings */
/** @var $form ActiveForm */

use backend\models\Settings;
use yii\bootstrap\ActiveForm;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Дополнительные настройки") ?></h4>

<?= $form->field($model, 'timetable')->textarea() ?>