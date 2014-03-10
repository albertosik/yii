<?php

class SiteController extends CController
{
	public function actionIndex($page=1)
	{
            $pageSize = 3;
            $count = Goods::model()->count();
            $goods = Goods::model()->findAll(array('limit'=>$pageSize, 'offset'=>$pageSize*($page-1)));
            $pag = new CPagination($count);
            $pag->pageSize = $pageSize;
            $pag->currentPage = $page-1;
            $this->render('index', array('goods'=>$goods,'pag'=>$pag));
	}

	public function accessRules()
        {
            return array(
                array('allow',
                    'actions'=>array(
                        'index',
                        ),
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