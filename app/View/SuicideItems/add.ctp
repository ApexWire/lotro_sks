<div class="suicideItems form">
<?php echo $this->Form->create('SuicideItem'); ?>
	<fieldset>
		<legend><?php echo __('Add Suicide Item'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Suicide Items'), array('action' => 'index')); ?></li>
	</ul>
</div>
