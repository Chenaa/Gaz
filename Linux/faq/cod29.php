<?php

public function attributeAction(){
	$attrs = \R::getAssoc("SELECT attribute_value.*, attribute_group.title FROM attribute_value JOIN attribute_group ON attribute_group.id = attribute_value.attr_group_id");
	$this->setMeta('Фильтры');
	$this->set(compact('attrs'));
}

public function attributeAddAction(){
	if(!empty($_POST)){
		$attr = new FilterAttr();
		$data = $_POST;
		$attr->load($data);
		if(!group->validate($data)){
			$attr->getErrors();
			redirect();
		}
		if($attr->save('attribute_value', false)){
			$_SESSION['success'] = 'Атрибут добавлен';
			redirect();
		}
	}
	$attr = \R::findAll('attribute_group');
	$this->setMeta('Новый фильтр');
	$this->set(compact('group'));

}


?>
<h1>
	Фильтры
</h1>
<li><a href="<?=ADMIN;?>/filter/attribute-group">Группы фильтров</a></li>
<li class="active"></li>


<?php foreach($attrs as $id => $item):?>
<tr>
	<td><?=$item['value'];?></td>
	<td><?=$item['title'];?></td>
	<td>
		<a href="<?=ADMIN;?>/filter/attribute-edit?id=<?=$id;?>"><i class="fa-fw fa-pencil"></i></a>
		<a href="<?=ADMIN;?>/filter/attribute-delete?id=<?=$id;?>"><i class="fa fa-fw fa-close text-danger"></i></a>
	</td>
</tr>