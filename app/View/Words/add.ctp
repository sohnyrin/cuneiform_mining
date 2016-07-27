<div class="words form">
<?php echo $this->Form->create('Word'); ?>
	<fieldset>
		<legend><?php echo __('Add Word'); ?></legend>
	<?php
echo $this->Form->input('WordType.WordType', array('type' => 'select', 'multiple' => 'true', 'empty' => '     ')); 
		echo $this->Form->input('word');
		echo $this->Form->input('translation');
		echo $this->Form->input('comments');
		echo $this->Form->input('bibliography');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Words'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Word Types'), array('controller' => 'word_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Word Type'), array('controller' => 'word_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terms'), array('controller' => 'terms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terms'), array('controller' => 'terms', 'action' => 'add')); ?> </li>
	</ul>
</div>
