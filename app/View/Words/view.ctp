<div class="words view">
<h2><?php  echo __('Word'); ?>: <?php echo $word['Word']['word']; ?></h2>
<?php echo $this->Html->link('edit',  array('controller' => 'words', 'action' => 'edit', $word['Word']['id'])); ?>
<?php echo $this->Html->link('delete',array('controller' => 'words', 'action' => 'delete', $word['Word']['id'])); ?>
<dl>
    <dt><?php echo __('Word Type'); ?></dt>
	<dd>
	    <?php 
		$j=0;
		foreach ($word['WordType'] as $v) {
		  if ($j!=0) {echo ' | ';}
		    echo $this->Html->link($word['WordType'][$j]['word_type'], array('controller' => 'word_types', 'action' => 'view', $word['WordType'][$j]['id'])); 
		     $j++;} ?>
	</dd>
	
	<br />
    <dt><?php echo __('Translation'); ?></dt>
	<dd>
	<?php echo $word['Word']['translation']; ?>
	&nbsp;
	</dd>
	
	
    <dt><?php echo __('Terms'); ?></dt>
	<dd>
	    <?php 
		$j=0;
		foreach ($word['Term'] as $v) {
		  if ($j!=0) {echo ' | ';}
		  echo $this->Html->link($word['Term'][$j]['term'], array('controller' => 'terms', 'action' => 'view', $word['Term'][$j]['id'])); 
		  $j++;} ?>
	</dd>
    <dt><?php echo __('Comments'); ?></dt>
	<dd>
	    <?php echo h($word['Word']['comments']); ?>
	    &nbsp;
	</dd>
    <dt><?php echo __('Bibliography'); ?></dt>
	<dd>
	  <?php echo h($word['Word']['bibliography']); ?>
		&nbsp;
	</dd>
  </dl>
</div>

<table>
<caption>Associated tablets</caption>
<tr>
<th><?php echo $this->Paginator->sort('Term');?></th>
<th><?php echo $this->Paginator->sort('no_perso');?></th>
<th><?php echo $this->Paginator->sort('no_museum');?></th>
<th><?php echo $this->Paginator->sort('no_cdli');?></th>
<th><?php echo $this->Paginator->sort('period_id');?></th>
<th><?php echo $this->Paginator->sort('ruler_id');?></th>
<th><?php echo $this->Paginator->sort('date_year');?></th>
<th><?php echo $this->Paginator->sort('date_month');?></th>
<th ><?php echo $this->Paginator->sort('official_id'); ?></th>
<th><?php echo $this->Paginator->sort('subject');?></th>
<th><?php echo $this->Paginator->sort('Words');?></th>
<th ><?php echo $this->Paginator->sort('Actions');?></th>
</tr>
	<?php
	$i = 0;
	foreach ($word['Term'] as $term):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

<?php
	$i = 0;
	foreach ($term['Tablet'] as $tablet):	?>	
<td>
  <?php echo $this->Html->link(__($term['term'], true), array('controller'=> 'terms', 'action' => 'view', $term['id'])); ?></td>
<td>
  <?php echo $this->Html->link(__($tablet['no_perso'], true), array('controller'=> 'tablets', 'action' => 'view', $tablet['id'])); ?></td>
<td>
  <?php echo $tablet['no_museum'] ?>
  </td>
<td> <a href="http://cdli.ucla.edu/<?php echo $tablet['no_cdli'];?>" title="Link to CDLI entry" target="_cdli"><?php echo $tablet['no_cdli']; ?></a></td>

<td>
			<?php echo $this->Html->link($tablet['Period']['period'], array('controller' => 'terms', 'action' => 'view', $tablet['period_id'])); ?>
		</td>	
<td>
			<?php echo $this->Html->link($tablet['Ruler']['term'], array('controller' => 'terms', 'action' => 'view', $tablet['ruler_id'])); ?>
		</td>	
	<td>
			<?php echo $tablet['date_year']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($tablet['Month']['month'], array('controller' => 'months', 'action' => 'view', $tablet['date_month'])); ?>
		</td>

		
		
		<td >
			<?php echo $this->Html->link($tablet['Official']['term'], array('controller' => 'terms', 'action' => 'view', $tablet['Official']['id'])); ?>
			 
		</td>
		
				<td><?php echo $tablet['subject']; ?></td>
				<td><?php 
				if ($tablet['Word']):
				foreach ($tablet['Word'] as $word): 
				echo $this->Html->link($word['word'], array('controller' => 'words', 'action' => 'view', $word['id']));
				echo ' ';
				;endforeach; endif; ?>
				</td>
		<td>
			
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tablet['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tablet['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tablet['Tablet']['id'])); ?>
		</td>
	</tr>
<?php endforeach;endforeach ?>
</table>















<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Word'), array('action' => 'edit', $word['Word']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Word'), array('action' => 'delete', $word['Word']['id']), null, __('Are you sure you want to delete # %s?', $word['Word']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Words'), array('action' => 'index')); ?> </li>
</div>
<div class="related">
	<h3><?php echo __('Related Terms'); ?></h3>
	<?php if (!empty($word['Terms'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Term'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Word Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($word['Terms'] as $terms): ?>
		<tr>
			<td><?php echo $terms['id']; ?></td>
			<td><?php echo $terms['term']; ?></td>
			<td><?php echo $terms['comments']; ?></td>
			<td><?php echo $terms['word_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'terms', 'action' => 'view', $terms['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'terms', 'action' => 'edit', $terms['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'terms', 'action' => 'delete', $terms['id']), null, __('Are you sure you want to delete # %s?', $terms['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Terms'), array('controller' => 'terms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
