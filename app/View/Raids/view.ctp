<div class="raids view">
    <h2><?php  echo __('Raid'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd><?php echo h($raid['Raid']['id']); ?>&nbsp;</dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd><?php echo h($raid['Raid']['name']); ?>&nbsp;</dd>
        <dt><?php echo __('MaxPlayer'); ?></dt>
        <dd><?php echo h($raid['Raid']['maxPlayer']); ?>&nbsp;</dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Raid'), array('action' => 'edit', $raid['Raid']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Raid'), array('action' => 'delete', $raid['Raid']['id']), null, __('Are you sure you want to delete "%s"?', $raid['Raid']['name'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Raids'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Raid'), array('action' => 'add')); ?> </li>
    </ul>
</div>