<div class="terms view">
<h2>Term: <?php echo $term['Term']['term']; ?> </h2>
<?php echo $this->Html->link('edit', array('controller' => 'terms', 'action' => 'edit', $term['Term']['id'])); ?>
<?php echo $this->Html->link('delete', array('controller' => 'terms', 'action' => 'delete', $term['Term']['id'])); ?>
<?php
if (!empty($term['Word'][0])): ?>
<table>
<caption>Associated word(s)</caption>
<tr>
<th>Word</th>
<th>Word type(s)</th>
<th>Translation</th>
<th>Comments</th>
<th>Bibliography</th>
</tr>
<?php
$i = 0;
foreach ($term['Word'] as $word):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
<td>
<?php echo $this->Html->link($word['word'], array('controller' => 'words', 'action' => 'view', $word['id']));?>
</td>
<td>
<?php
foreach ($word['WordType'] as $word_type) {
echo $this->Html->link($word_type['word_type'], array('controller' => 'word_types', 'action' => 'view', $word_type['id']));
echo ' ';
}
?>
</td>
<td><?php echo $word['translation']?></td>
<td><?php echo $word['comments']?></td>
<td><?php echo $word['bibliography']?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<table>
<caption>Associated tablets</caption>
<tr>
<th><?php echo $this->Paginator->sort('no_perso');?></th>
<th><?php echo $this->Paginator->sort('no_museum');?></th>
<th><?php echo $this->Paginator->sort('no_cdli');?></th>
<th><?php echo $this->Paginator->sort('period_id');?></th>
<th><?php echo $this->Paginator->sort('ruler_id');?></th>
<th><?php echo $this->Paginator->sort('date_year');?></th>
<th><?php echo $this->Paginator->sort('date_month');?></th>
<th ><?php echo $this->Paginator->sort('official_id'); ?></th>
<th><?php echo $this->Paginator->sort('subject');?></th>
<th><?php echo $this->Paginator->sort('Word');?></th>
<th class="actions"><?php __('Actions');?></th>
</tr>
	<?php
	$i = 0;
	foreach ($term['Tablet'] as $tablet):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
<td>
<?php echo $this->Html->link(__($tablet['no_perso'], true), array('controller' => 'tablets', 'action' => 'view', $tablet['id'])); ?></td>
		<td>
<?php echo $tablet['no_museum'] ?></td>
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
				endforeach; endif; ?>

				</td>
		<td class="actions">

			<?php echo $this->Html->link(__('Edit', true), array('controller' => 'tablets', 'action' => 'edit', $tablet['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('controller' => 'tablets', 'action' => 'delete', $tablet['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tablet['Tablet']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
