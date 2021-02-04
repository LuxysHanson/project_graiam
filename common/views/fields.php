<?php
if (empty($fields) && isset($model) && method_exists($model, 'formFields')){
    $fields = $model->formFields();
}
if (!empty($fields)) {?>

    <?php foreach ($fields as $name => $field) { ?>

        <?=$this->render("@app/views/common/field", [
            'name' => $name,
            'field' => $field,
            'model' => $model
        ])?>

    <?php } ?>
<?php } ?>