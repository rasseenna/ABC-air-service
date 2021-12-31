<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use yii\web\Session;


class SiteController extends Controller
{
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

     /*   $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) { //die("hai i am here");
            $password = User::hashPassword($model->password); 
            $username = $model->username;
            $users = User::find()
				->where(['username' => $username])
                ->andWhere(['password' => $password])
                ->all(); 
             
                if($users){ 
                    redirect('aircraft/index');
                }
            return $this->goBack();
        }*/
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
         //   $password = Yii::$app->security->generatePasswordHash($model->password); 
            $password = md5($model->password);
            $username = $model->username;
            $users = User::find()
				->where(['username' => $username])
                ->andWhere(['password_hash' => $password])
                ->count(); 
                if($users > 0){ //die("success");
                    $session = Yii::$app->session;
                   // $session['username'] = $username;
                   $session->open();
                   Yii::$app->session->set('username',$username);
                  //  return $this->goBack();
                 // return $this->redirect('aircraft');
               // return $this->redirect(array("/aircraft"));
               return $this->goHome();
                } // echo $users; die("fail");
              // return $this->goHome();
              echo Yii::$app->session->setFlash('error', "Incorrect username or Password.");
               // return false;
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
      //  Yii::$app->user->logout();
        $session = Yii::$app->session;
        $session->open();
        Yii::$app->session->set('username','guest');
       // $session->destroy();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new User();        
        if ($model->load(Yii::$app->request->post())){
        // $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
        $model->password_hash = md5($model->password_hash);
        $model->save();
        return $this->goBack();
        }
           
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
