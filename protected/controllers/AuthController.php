<?php

class AuthController extends Controller
{
	public function actionLogin()
	{
		$error = '';
		$p = $_POST;
		if(isset($p['submit']))
		{
			$return = Yii::app()->user->returnUrl;
			if(empty($p['login']))
			{
				$error = 'Enter login';
			}
			else if(empty($p['password']))
			{
				$error = 'Enter password';
			}
			if(!$error)
			{
				$iden = new UserIdentity($p['login'], $p['password']);
				if($iden->authenticate())
				{
					Yii::app()->user->login($iden);
					$url = explode('/', $return);
					if($url[sizeof($url)-1]!='logout')
						$this->redirect($return);
					else
						$this->redirect('/yii/');
				}
			}
		}
		$this->render('login', array('err'=>$error));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/yii/');
	}
        public function actionRegistration()
        {
            // тут думаю все понятно
            $form = new User();
            // Проверяем являеться ли пользователь гостем
            // ведь если он уже зарегистрирован - формы он не должен увидеть.
            if (!Yii::app()->user->isGuest) {
                 throw new CException('Вы уже зарегистрированны!');
            } else {
                // Если $_POST['User'] не пустой массив - значит была отправлена форма
                // следовательно нам надо заполнить $form этими данными
                 // и провести валидацию. Если валидация пройдет успешно - пользователь
                // будет зарегистрирован, не успешно - покажем ошибку на экран
                if (!empty($_POST['User'])) {
                    
                     // Заполняем $form данными которые пришли с формы
                    $form->attributes = $_POST['User'];                    
                        // В validate мы передаем название сценария. Оно нам может понадобиться
                        // когда будем заниматься созданием правил валидации [читайте дальше]
                         if($form->validate()) {
                            // Если валидация прошла успешно...
                            // Тогда проверяем свободен ли указанный логин..

                                if ($form->model()->count("email = :email", array(':email' => $form->email))) {
                                     // Указанный логин уже занят. Создаем ошибку и передаем в форму
                                    $form->addError('login', 'Логин уже занят');
                                    $this->render("registration", array('form' => $form));
                                 } else {
                                    // Выводим страницу что "все окей"
                                    $form->image = CUploadedFile::getInstance($form, 'image');
                                    $form->photo = '/upload/'.$form->image->name;
                                    if($form->save())
                                    {
                                        $form->image->saveAs(Yii::app()->basePath.'/../upload/'.$form->image->name);
                                    }
                                    $this->render("login");
                                }

                        } else {
                            // Если введенные данные противоречат 
                            // правилам валидации (указаны в rules) тогда
                            // выводим форму и ошибки.
                             // [Внимание!] Нам ненадо передавать ошибку в отображение,
                            // Она автоматически после валидации цепляеться за 
                            // $form и будет [автоматически] показана на странице с 
                             // формой! Так что мы тут делаем простой рэндер.

                            $this->render("registration", array('form' => $form));
                        }
                 } else {
                    // Если $_POST['User'] пустой массив - значит форму некто не отправлял.
                    // Это значит что пользователь просто вошел на страницу регистрации
                    // и ему мы должны просто показать форму.

                    $this->render("registration", array('form' => $form));
                }
            }
        }
	
	public function accessRules()
    {
        return array(            
            array('allow',
                'actions'=>array(
                    'login','registration',),
                'users'=>array('*'),
            ),
			array('allow',
                'actions'=>array(
                    'logout',),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    public function filters()
    {
            return array(
                    'accessControl',
            );
    }
}
