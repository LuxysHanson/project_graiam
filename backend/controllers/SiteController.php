<?php
namespace backend\controllers;

use common\components\enums\UsersStateEnum;
use common\components\services\UserService;
use common\controllers\BaseController;
use Yii;
use yii\filters\VerbFilter;
use common\models\forms\LoginForm;

/**
 * Class SiteController
 * @package backend\controllers
 */
class SiteController extends BaseController
{
    /** @var UserService */
    private $userService;

    public function __construct($id, $module, UserService $userService, $config = [])
    {
        $this->userService = $userService;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $parent = parent::behaviors();
        return array_merge($parent, [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->is_blocked == UsersStateEnum::STATE_BLOCKED && $action->id != 'blocked') {
            return $this->redirect(['/site/blocked']);
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Блокировка экрана
     *
     */
    public function actionBlocked()
    {
        $this->layout = 'blank';

        $model = new LoginForm();
        $model->username = Yii::$app->user->identity->username;

        if ($model->load(Yii::$app->request->post()) && $this->userService->login($model)) {
            $this->userService->changeState(UsersStateEnum::STATE_UNBLOCKED);
            return $this->goBack();
        }

        $this->userService->changeState(UsersStateEnum::STATE_BLOCKED);

        return $this->render('blocked', [
            'model' => $model
        ]);
    }

    public function actionLogin()
    {
        $this->layout = 'blank';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $this->userService->login($model)) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
