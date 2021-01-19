<?php

namespace backend\widgets\EImageField;

use common\widgets\FileUploaded;
use yii\widgets\ActiveForm;

/**
 * Class EImageField
 * @package backend\widgets\EImageField
 */
class EImageField extends FileUploaded
{
    /** @var ActiveForm */
    public $form;

    /** Версия bootstrap 4.x.x */
    public $bsVersion = 4;

    public $assets_path = '@app/widgets/EImageField/assets';
    public $js = [
        'EImageField.js'
    ];
    public $css = [
        'EImageField.css'
    ];

    protected $defaultData = [
        'data-default' => '/images/default-avatar-male.png',
        'accept' => 'image/*'
    ];

    public function run()
    {
        $this->optionsConfig();
        return $this->render('index', [
            'name' => $this->name,
            'form' => $this->form,
            'model' => $this->model,
            'options' => $this->options
        ]);
    }

    protected function optionsConfig()
    {
        if ($this->options) {
            $id = isset($this->options['id']) ? $this->options['id'] : null;
            if ($id && !isset($this->options['data-id'])) {
                $this->options['data-id'] = $id;
            }
            if (!isset($this->defaultData['data-url'])) {
                $this->options['data-url'] = isset($this->model->{$this->name}) ? $this->model->{$this->name} : '';
            }
            $this->options = array_merge($this->options, $this->defaultData);
        } else {
            $this->options = $this->defaultData;
        }
    }
}
