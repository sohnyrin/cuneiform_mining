<?php
class Tablet extends AppModel {
var $displayField = 'no_museum';
var $actsAs = array ('ExtendAssociations');
var $belongsTo = array( 'ObjectType','Shape','Corner','SizeClass','Edge', 'Collection', 'Period', 'ArchLoc', 'ArchSite', 'Genre','Month', 'Year','Project', 'Collection','Ruler', 'Official');
var $hasMany = array('TabletFile', 'TabletTerm', 'ReadingTablet');

var $hasAndBelongsToMany = array(
        'Tag' =>
            array(
                'className'              => 'Tag',
                'joinTable'              => 'tablets_tags',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'tag_id',
                'unique'                 => true,
				),
		'SignPaleo' =>
            array(
                'className'              => 'SignPaleo',
                'joinTable'              => 'sign_paleos_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'sign_paleo_id',
                'unique'                 => true,
				),
		'FromPerson' =>
            array(
                'className'              => 'FromPerson',
                'joinTable'              => 'from_people_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'term_id',
                'unique'                 => true,
				),
		'ToPerson' =>
            array(
                'className'              => 'ToPerson',
                'joinTable'              => 'tablets_to_people',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'term_id',
                'unique'                 => true,
				),
		'FromLocation' =>
            array(
                'className'              => 'FromLocation',
                'joinTable'              => 'from_locations_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'term_id',
                'unique'                 => true,
				),
		'ToLocation' =>
            array(
                'className'              => 'ToLocation',
                'joinTable'              => 'tablets_to_locations',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'term_id',
                'unique'                 => true,
				),
		'Language' =>
            array(
                'className'              => 'Language',
                'joinTable'              => 'languages_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'language_id',
                'unique'                 => true,
				),
		'Group' =>
			array(
                'className'              => 'Group',
                'joinTable'              => 'groups_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'group_id',
                'unique'                 => true,
				),
		'Term' =>
			array(
                'className'              => 'Term',
                'joinTable'              => 'tablets_terms',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'term_id',
                'unique'                 => true,
				),
		'Reading' =>
			array(
                'className'              => 'Reading',
                'joinTable'              => 'readings_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'reading_id',
                'unique'                 => true,
				),
		'Keyword' =>
			array(
                'className'              => 'Keyword',
                'joinTable'              => 'keywords_tablets',
                'foreignKey'             => 'tablet_id',
                'associationForeignKey'  => 'keyword_id',
                'unique'                 => true,
				),
    		'Transac' => array(
    			'className' => 'Transac',
    			'joinTable' => 'tablets_transacs',
    			'foreignKey' => 'tablet_id',
    			'associationForeignKey' => 'transac_id',
    			'unique' => 'keepExisting',
    			'conditions' => '',
    			'fields' => '',
    			'order' => '',
    			'limit' => '',
    			'offset' => '',
    			'finderQuery' => '',
    		)
      );


public function beforeSave() {
	parent::beforeSave();
	$termIds = $this->_getTermIds();
	if(!empty($termIds)) {
		if(!isset($this->data['Term']['Term'])) {
			$this->data['Term']['Term'] = $termIds;
		 }
		else {
			foreach($termIds as $termId) {
				$this->data['Term']['Term'][] = $termId;
				}
			}
		}
	return true;
	}

function _getTermIds() {
	mb_internal_encoding("UTF-8");
	mb_regex_encoding("UTF-8");
	$terms=$this->data['Tablet']['translit'];
	$terms = preg_replace('/^[0-9]*(\')?\./m', '', $terms); // remove line numbering, including with '
	$terms = preg_replace('/^[>@$&#].*(\s*)?/m','', $terms); // remove atf structure markers
	$terms= str_replace(array('\r\n', '\r', '\n','\n\r','\t'), ' ', $terms); // remove returns and new lines
	$terms= str_replace(array('~','"','[', ']', '#','_'), '', $terms); // remove broken markings
	$terms= str_replace(array('[x]'), 'x', $terms); // remove broken markings
	$terms = trim($terms, chr(173));
	$terms = mb_ereg_replace('\s+', ' ', $terms);
	$terms = explode(" ", $terms);
	$terms = array_map('trim', $terms);
	foreach ($terms as $key=>$term){
	  if (preg_match("/\s/", $term)){
	  unset($terms[$key]);
	  }
	}

		if(Set::filter($terms)) {
		foreach($terms as $term) {
			$existingTerm = $this->Term->find('first', array('conditions' => array('Term.term' => $term)));
			if(!$existingTerm) {
			$this->Term->create();
				$this->Term->saveField('term', $term);
				$termIds[] = $this->Term->id;
				}
			else {
					$termIds[] = $existingTerm['Term']['id'];
         }
				 }
      return array_unique($termIds);
			}
			return false;
 }

 function list_periods() // list a related model for the filter plugin
{
	return $this->Period->find('list');
}
 function list_collections() // list a related model for the filter plugin
{
	return $this->Collection->find('list');
}
 function list_projects() // list a related model for the filter plugin
{
	return $this->Project->find('list');
}
 function list_arch_sites() // list a related model for the filter plugin
{
	return $this->ArchSite->find('list');
}
 function list_genres() // list a related model for the filter plugin
{
	return $this->Genre->find('list');
}
function list_tags() // list a related model for the filter plugin
{
	return $this->Tag->find('list');
}
 //function list_rulers() // list a related model for the filter plugin
//{
//	return $this->Ruler->find('list');
//}
// function list_officials() // list a related model for the filter plugin
//{
//	return $this->Official->find('list');
//}


/*
 function _getReadingsIds() {
	$readings=$this->data['Tablet']['translit'];
	$readings= str_replace(array('\r\n', '\r', '\n','\n\r','\t'), ' ', $readings);
	$readings= str_replace('-', ' ', $readings);
	$readings = trim($readings, chr(173));
	mb_internal_encoding("UTF-8");
	mb_regex_encoding("UTF-8");
	$readings = mb_ereg_replace('\s+', ' ', $readings);
	$readings = explode(" ", $readings);
	$readings=array_map('trim', $readings);
	$anti_readings = array('@tablet','1.','2.','3.','4.','5.','6.','7.','7.','9.','10.','11.','12.','13.','14.','15.','16.','17.','18.','19.','20.','1\'.','2\'.','3\'.','4\'.','5\'.','Rev.',
	'Obv.','@tablet','@obverse','@reverse','S1','S2','C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11', '\r', '\n','\r\n', '\t',''. ' ', null, chr(173), 'x', '[x]','[...]','9#','8#','7#','6#', 'x#','...' );
	foreach($readings as $key => $readings) {
		if(in_array($readings, $anti_readings) || is_numeric($readings)) {
			unset($readings[$key]);
			}
		}

     if(Set::filter($readings)) {
        foreach($readings as $reading) {
					$this->Tablet->Reading = $this->Reading;
					$existingReading = $this->Tablet->Reading->find('first', array('conditions' => array('Reading.reading' => $reading)));

             if(!$existingReading) {
                 $this->Reading->create();
                 $this->Reading->saveField('reading', $reading);

                 $readingIds[] = $this->Reading->id;
             }
             else {
                 $ReadingIds[] = $existingReading['Reading']['id'];
             }
         }

         return array_unique($readingIds);
     }

     return false;
 }

 */
}
