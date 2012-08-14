<div class="characters form">
    <?php echo $this->Form->create('Character'); ?>
    <fieldset>
        <legend><?php echo __('Edit Character'); ?></legend>
        <?php echo $this->Form->input('id'); ?>
        <?php echo $this->Form->input('characterName'); ?>
        <?php echo $this->Form->input('player_id'); ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Character.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Character.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Characters'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
    </ul>
</div>