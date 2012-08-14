<div class="configs form">
    <?php echo $this->Form->create('Config'); ?>
    <fieldset>
        <legend><?php echo __('Add LotRO API Config'); ?></legend>
        <?php echo $this->Form->input('developer_name'); ?>
        <?php echo $this->Form->input('api_key'); ?>
        <?php echo $this->Form->input('url'); ?>
        <?php echo $this->Form->input('worldname'); ?>
        <?php echo $this->Form->input('maxLevel', array('value' => 75)); ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Configs'), array('action' => 'index')); ?></li>
    </ul>
</div>