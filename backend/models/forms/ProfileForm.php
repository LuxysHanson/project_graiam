<?php

namespace backend\models\forms;

use backend\models\UsersProfile;
use common\components\core\helpers\ImageHelper;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\web\UploadedFile;

class ProfileForm extends Model
{
    public $image = null;
    public $password;

    public function rules()
    {
        return [
            ['image', 'file', 'extensions' => ['jpeg', 'jpg', 'png']],
            [['image'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => Yii::t('app', "Логотип администратора")
        ];
    }

    public function imgUpload(UploadedFile $img)
    {
        if (!is_null($img)) {
            $tempName = Yii::$app->security->generateRandomString().".{$img->extension}";
            $this->image = '/uploads/profile/' . $tempName;
            $fullPath = ImageHelper::getFullPathUploadedImage($this->image);

            if ($img->saveAs($fullPath)) {
                return true;
            }
        }
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
        $model->attributes = $this->attributes;
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
        if (!stristr($currentImage, $oldImage) && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

}