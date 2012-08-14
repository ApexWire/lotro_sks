<div class="configs form">
    <?php echo $this->Form->create('Config'); ?>
    <fieldset>
        <legend><?php echo __('Edit LotRO API Config'); ?></legend>
        <?php echo $this->Form->input('id'); ?>
        <?php echo $this->Form->input('developer_name'); ?>
        <?php echo $this->Form->input('api_key'); ?>
        <?php echo $this->Form->input('url'); ?>
        <?php echo $this->Form->input('worldname'); ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Config.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Config.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Configs'), array('action' => 'index')); ?></li>
    </ul>
</div>