<?php
/** @var $model UsersProfile */
/** @var $form ActiveForm */

use backend\models\UsersProfile;
use backend\widgets\EImageField\EImageField;
use yii\bootstrap\ActiveForm;

?>

<h4 class="card-title mb-4"><?= Yii::t('app', "Основные данные") ?></h4>

<?php
echo EImageField::widget([
    'name' => 'image',
    'form' => $form,
    'model' => $model,
    'options' => [
        'id' => 'profile-form-image',
        'size' => '150*150',
        'format' => 'JPEG(JPG)/PNG'
    ]
]);
?>
