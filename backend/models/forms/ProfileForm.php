<?php

namespace backend\models\forms;

use backend\models\UsersProfile;
use common\components\core\helpers\AttributeHelper;
use common\components\core\helpers\ImageHelper;
use common\components\Model;
use Yii;
use yii\db\Exception;
use yii\web\UploadedFile;

class ProfileForm extends Model
{
    public $image = null;
    public $password;
    public $last_name = null;
    public $first_name = null;
    public $middle_name = null;

    /* Временное хранение размер загружаемого фото */
    protected $image_size;

    public function rules()
    {
        return [
            ['image', 'file', 'extensions' => ['jpeg', 'jpg', 'png']],
            [['image'], 'required', 'when' => function () {
                return $this->image ? false : true;
            }]
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => Yii::t('app', "Логотип администратора"),
            'last_name' => Yii::t('app', "Фамилия"),
            'first_name' => Yii::t('app', "Имя"),
            'middle_name' => Yii::t('app', "Отчество")
        ];
    }

    /**
     * @param UploadedFile|null $img
     * @return bool
     * @throws Exception
     */
    public function imgUpload($img)
    {
        if (!is_null($img)) {
            $this->image_size = $img->size;
            $tempName = Yii::$app->security->generateRandomString().".{$img->extension}";
            $tempImage = '/uploads/profile/' . $tempName;
            $fullPath = ImageHelper::getFullPathUploadedImage($tempImage);

            if ($this->photoUploadLimit()) {
                $this->addError('image', Yii::t('app', "Размер загружаемого фото не должен превышать 1мб"));
                return false;
            }

            if ($img->saveAs($fullPath)) {
                $this->image = $tempImage;
                return true;
            }
        }

        if ($this->image) return true;

        Yii::$app->session->setFlash('error', "Ошибка при загрузке фото");
        return false;
    }

    /**
     * @param UsersProfile|null $user
     * @return bool
     * @throws Exception
     */
    public function save(UsersProfile $user)
    {
        if (!$this->validate()) return false;

        $transaction = Yii::$app->db->beginTransaction();

        $model = new UsersProfile();
        if ($user) {
            $model = $user;
        }
        $this->deleteUnusedImage($this->image, $model->image);
        AttributeHelper::loadAttributes($model, $this->attributes);
        if (!$model->save()) {
            $transaction->rollBack();
            return false;
        }

        $transaction->commit();
        return true;
    }

    /**
     * При загрузке нового фото удаляет старую
     *
     * @param string $currentimage
     * @param string $newImage
     */
    protected function deleteUnusedImage(string $currentImage, string $oldImage): void
    {
        $fullPath = ImageHelper::getFullPathUploadedImage($oldImage);
        if ($oldImage && !stristr($currentImage, $oldImage) && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    /**
     * Ограничение на размер загружаемого фото
     *
     * @return bool
     */
    protected function photoUploadLimit()
    {
        return $this->image_size > 1024*1024;
    }

}