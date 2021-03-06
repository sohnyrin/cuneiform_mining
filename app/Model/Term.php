<?php
class Term extends AppModel {
public $name = 'Term';
	public $displayField = 'term';
	public $actsAs = array('Searchable','ExtendAssociations', 'Containable');
	public $order = array('Term.term' => 'ASC');
	public $validate = array(
	
		'term' => array(
			'rule' => 'notEmpty'
		)
	
	);
	public $belongsTo = array(
	);
	
	public $hasMany = array (
	'TabletTerm'
	
	
	);
	public $hasAndBelongsToMany = array(
		'Tablet' =>
			array(
                'className'              => 'Tablet',
                'joinTable'              => 'tablets_terms',
                'foreignKey'             => 'term_id',
                'associationForeignKey'  => 'tablet_id',

				),
			
		'Word' =>
		array(
                'className'              => 'Word',
                'joinTable'              => 'terms_words',
                'foreignKey'             => 'term_id',
                'associationForeignKey'  => 'word_id',

				)
	);

		
}
