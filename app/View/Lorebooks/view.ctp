<div class="lorebooks view">
<h2><?php  echo __('Lorebook'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lorebook['Lorebook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Itemid'); ?></dt>
		<dd>
			<?php echo h($lorebook['Lorebook']['itemid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($lorebook['Lorebook']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lorebook'), array('action' => 'edit', $lorebook['Lorebook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lorebook'), array('action' => 'delete', $lorebook['Lorebook']['id']), null, __('Are you sure you want to delete # %s?', $lorebook['Lorebook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lorebooks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lorebook'), array('action' => 'add')); ?> </li>
	</ul>
</div>
