<?php
/** @var $model mixed */
/** @var $template string */
/** @var $_params_ string */
/** @var $options array */

use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$modelClass = $model::tableName() != "settings" ? 'profile' : $model::tableName();
$options = array_merge(['data[pjax]' => true], $options);
?>

<div class="row">
    <div class="col-12">

        <div class="email-leftbar card">
            <?= $this->render("@backend/views/{$modelClass}/menu", [ 'template' => $template ]) ?>
        </div>

        <div class="email-rightbar mb-3">
            <div class="card">
                <div class="card-body">

                    <?php Pjax::begin(); ?>

                    <?php $form = ActiveForm::begin([
                        'id' => "{$template}-form",
                        'options' => $options
                    ]); ?>

                    <?= $this->render("@backend/views/{$modelClass}/include/_".$template, array_merge($_params_, [
                        'form' => $form
                    ])) ?>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success w-lg waves-effect waves-light">
                                <?= Yii::t('app', "Сохранить") ?>
                            </button>
                        </div>
                    </div>

                    <?php ActiveForm::end() ?>

                    <?php Pjax::end() ?>

                </div>
            </div>
        </div>

    </div>
</div>