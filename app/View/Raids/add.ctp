<div class="raids form">
    <?php echo $this->Form->create('Raid'); ?>
    <fieldset>
        <legend><?php echo __('Add Raid'); ?></legend>
        <?php echo $this->Form->input('name'); ?>
        <?php echo $this->Form->input('maxPlayer'); ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Raids'), array('action' => 'index')); ?></li>
    </ul>
</div>