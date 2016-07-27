<div class="tablets form">
<?php
echo $this->Form->create('Tablet', array('action' => 'edit', 'type' => 'file'));?>
	<h2><?php __('Edit Tablet'); ?></h2>
	<fieldset>
		<legend>Identification</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('no_perso');
		echo $this->Form->input('no_cdli');
		echo $this->Form->input('no_museum');
		?>
		<div id="collection" class="updatable">
		<?php echo $this->element('tablet_collection_div'); ?>
		</div>
<div class="clr"></div>
<div id="arch_site" class="updatable">
<?php echo $this->element('tablet_arch_site_div'); ?>
<?php echo $this->Form->input('arch_site_uncertain'); ?></div>
<div id="arch_loc" class="updatable">
<?php echo $this->element('tablet_arch_loc_div'); ?></div>
<?php 	echo $this->Form->input('no_arch');		?>
<?php	echo $this->Form->input('no_etcsl');	?>
<?php	echo $this->Form->input('size');		?>
</fieldset>
<fieldset>
<legend>Epigraphic Information</legend>
<?php
echo $this->Form->input('object_type_id', array('empty' => '     '));
echo $this->Form->input('no_size');
echo $this->Form->input('size_class_id', array('empty' => '     '));
echo $this->Form->input('edge_id', array('empty' => '     '));
echo $this->Form->input('corner_id', array('empty' => '     '));
echo $this->Form->input('shape_id', array('empty' => '     '));
echo $this->Form->input('SignPaleo.sign_paleo', array('type' => 'select', 'multiple' => 'true','empty' => '     '));
echo $this->Form->input('epi_notes');
?>
</fieldset>
<fieldset>
<legend>Home Classification</legend>
<div id="project" class="updatable">		<?php echo $this->element('tablet_project_div'); ?>		</div>
<div id="group" class="updatable">			<?php echo $this->element('tablet_group_div'); ?>	</div>
<div id="keyword" class="updatable">		<?php echo $this->element('tablet_keyword_div'); ?>		</div>
<div id="tag" class="updatable">			<?php echo $this->element('tablet_tag_div'); ?>		</div>
<div id="action" class="updatable">			<?php echo $this->element('tablet_action_div'); ?>		</div>
</fieldset>
<fieldset>
<legend>Contents - General</legend>

<?php echo $this->Form->input('period_id', array('empty' => '     ')); ?>
<?php echo $this->Form->input('period_uncertain'); ?>
<?php echo $this->Form->input('Language', array('empty' => '     ')); ?>

<div id="genre" class="updatable"> 			<?php echo $this->element('tablet_genre_div'); ?>	</div>
<?php echo $this->Form->input('genre_uncertain'); ?>

<?php echo $this->Form->input('subject');?>
<?php echo $this->Form->input('abstract');?>

</fieldset>
<fieldset>
<legend>Contents - Specific</legend>
<?php echo $this->Form->input('date_day');?>
<?php echo $this->Form->input('date_month');?>
<div id="month" class="updatable">			<?php echo $this->element('tablet_month_div'); ?>
<?php echo $this->Form->input('date_year');?>
<?php echo $this->Form->input('year_id', array('empty' => '     '));?>
</div>


<div id="ruler" class="updatable">			<?php echo $this->element('tablet_ruler_div'); ?>	</div>
<div id="official" class="updatable">		<?php echo $this->element('tablet_official_div'); ?>		</div>
<div class="clr"></div>

<div id="from_person" class="updatable">	<?php echo $this->element('tablet_from_person_div'); ?>		</div>
<div id="to_person" class="updatable"> 		<?php echo $this->element('tablet_to_person_div'); ?>		</div>
<div id="from_location" class="updatable">	<?php echo $this->element('tablet_from_location_div'); ?>	</div>
<div id="to_location" class="updatable">	<?php echo $this->element('tablet_to_location_div'); ?> 	</div>

<div class="clr"></div>

<div id="main_action" class="updatable">	<?php echo $this->element('tablet_main_action_div'); ?>		</div>
<div id="main_verb" class="updatable">		<?php echo $this->element('tablet_main_verb_div'); ?>		</div>

<div class="clr"></div>

<?php echo $this->Form->input('translit', array('cols' =>'60', 'rows' => '30','class'=>'large_text')); ?>
<?php echo $this->Form->input('translation', array('cols' =>'60','rows' => '30','class'=>'large_text')); ?>

<div class="clr"></div>

<?php
echo $this->Form->input('publications', array('rows' => '11','class'=>'ckeditor'));
echo $this->Form->input('comments');
?>
</fieldset>
<?php echo $this->Form->end(__('Save', true));
foreach (glob('/alty/htdocs/adab/app/webroot/tablet_files/'.$tablet['Tablet']['no_cdli'].'*') as $img): ?>
<a href="/tablet_files/<?php echo basename($img); ?>"><img src="/tablet_files/<?php echo basename($img); ?>" style="width:400px;height:auto;"></a>
<?php endforeach;?>
</div>
