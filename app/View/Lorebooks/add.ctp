<div class="lorebooks form">
<?php echo $this->Form->create('Lorebook'); ?>
	<fieldset>
		<legend><?php echo __('Add Lorebook'); ?></legend>
	<?php
		echo $this->Form->input('itemid');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lorebooks'), array('action' => 'index')); ?></li>
	</ul>
</div>
