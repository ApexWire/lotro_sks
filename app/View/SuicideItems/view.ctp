<div class="suicideItems view">
<h2><?php  echo __('Suicide Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($suicideItem['SuicideItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($suicideItem['SuicideItem']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Suicide Item'), array('action' => 'edit', $suicideItem['SuicideItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Suicide Item'), array('action' => 'delete', $suicideItem['SuicideItem']['id']), null, __('Are you sure you want to delete # %s?', $suicideItem['SuicideItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Suicide Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Suicide Item'), array('action' => 'add')); ?> </li>
	</ul>
</div>
