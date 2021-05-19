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
		$currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
		if(!$currency->validate($data)){
			$currency->getErrors();
			redirect();
		}

		if($currency->save('currency')){
			$_SESSSION['success'] = 'Валюта добавлена';
			redirect();
		}

	}
	$this->setMeta('Новая валюта');
}

public function editAction(){
	if(!empty($_POST)){
		$id = $this->getRequestID(false);
		$currency = new Currency;
		$data = $_POST;
		$currency->load($data);
		$currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
		if(!$currency->validate($data)){
			$currrency->getErrors();
			redirect();
		}
		if($currency->update('currency', $id)){
			$_SESSION['success'] = 'Изменения сохранены';
			redirect();

		}
	}
	$id = $this->getRequestID(false);
	$currency = \R::load('currency', $id);
	$this->setMeta('Редактирование валюты', {$currency->title});
	$this->set(compact('currency'));
}


public function editAction(){
	if(!empty($_POST)){
		$id = $this->getRequestID(false);
		$currency = new Currency();
		$data = $_POST;
		$currency->load($data);
		$currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
		if(!$currency->validate($data)){
			$currency->getErrors();
			redirect();
		}

		if($currency->update('currency', $id)){
			$_SESSION['success'] = 'Изменения сохранены';
			redirect();
		}

	}

	$id = $this->getRequestID();
	$currency = \R::load('currency', $id);
	$this->setMeta('Редактирование валюты', {$currency->title});
	$this->set(compact('currency'));
}


public function editAction(){
	if(!empty($_POST)){
		$id = $this->getRequestID(false);
		$currency = new Currency;
		$data = $_POST;
		$currency->load($data);
		if(!$currency->validate($data)){
			$currency->getErrors();
			redirect;

		}
		if($currency->update('currency', $id)){
			$_SESSION['success'] = 'Изменения сохранены';
			redirect();
		}


	}

	$id = $this->getRequestID();
	$currency->load('currency', $id);
	$this->setMeta('Редактирование валюты', {$currency->title});
	$this->set(compact('currency'));
}

public function deleteAction(){
	$id = $this->getRequestID();
	$currency = \R::load('currency', $id);
	\R::trash($currency);
	$_SESSION['success'] = 'Успешно удалено';
	redirect();
}
