<!--<label>Project</label>-->
<?php echo $this->Form->input('Tablet.project_id', array('empty' => '     ')); ?>
<div class="clr"></div>
<?php echo $this->Html->link('Add New Project', array('controller' => 'projects', 'action' => 'add'), array('target' => '_blank')); ?> <br />
<?php echo $this->Ajax->link(
'Refresh...',
array( 'controller' => 'tablets', 'action' => 'update_tablet_projects'),
array( 'update' => 'project' )
);
?>