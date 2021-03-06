<?php
class SignPaleo extends AppModel
{
	var $name = 'SignPaleo';
	var $displayField = 'sign_paleo';

var $hasAndBelongsToMany = array(
		'Tablet' => array(
			'className' => 'Tablet',
			'joinTable' => 'sign_paleos_tablets',
			'foreignKey' => 'sign_paleo_id',
			'associationForeignKey' => 'tablet_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);	

}
?>