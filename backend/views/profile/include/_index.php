<?php
/** @var $model UsersProfile */
/** @var $form ActiveForm */

use backend\models\UsersProfile;
use backend\widgets\EImageField\EImageField;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Основные данные") ?></h4>

<?php
echo EImageField::widget([
    'name' => 'image',
    'form' => $form,
    'model' => $model,
    'options' => [
        'id' => 'profile-form-image'
    ]
]);
?>

<i><?= Yii::t('app', "Рекомендуемый формат: JPEG(JPG)/PNG Рекомендуемый размер: 300x300") ?></i>
