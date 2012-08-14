<div class="rankings form">
<?php echo $this->Form->create('Ranking'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ranking'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('raid_id');
		echo $this->Form->input('player_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ranking.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ranking.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
