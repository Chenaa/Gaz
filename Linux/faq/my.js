$('#add').on('submit', function(){
	if(!isNumeric($('#category_id').val() )){
		alert('Выберите категорию');
		return false;
	}
});

function isNumeric(){
	return !isNaN(parseFloat(n)) && isFinite(n);
}

//add.php attribute-add.php

<form id="add">

