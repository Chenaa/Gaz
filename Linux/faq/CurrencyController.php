<?php

namespace app\controllers\admin;

class CurrencyController extends AppController{
	$currencies = \R::findAll('currency');
	$this->setMeta('Валюты магазин');
	$this->set(compact('currencies'));
}

public function addAction(){
	if(!empty($_POST)){
		$currency = new Currency();
		$data = $_POST;
		$currency->load($data);
		$currency->attribute['base'] = $currency->attribute['base'] ? '1' : '0';
		if(!$currency->validate($data)){
			$currency->getError();
			redirect();
		}

		if($currency->save('currency')){
			$_SESSSION['success'] = 'Валюта добавлена';
			redirect();
		}

	}
	$this->setMeta('Новая валюта');
}