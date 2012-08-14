<div class="rankings view">
<h2><?php  echo __('Ranking'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Raid'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Raid']['name'], array('controller' => 'raids', 'action' => 'view', $ranking['Raid']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Player']['name'], array('controller' => 'players', 'action' => 'view', $ranking['Player']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ranking'), array('action' => 'edit', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ranking'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
