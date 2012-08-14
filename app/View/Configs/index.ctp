<div class="configs index">
    <h2><?php echo __('LotRO API Configs'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Developer name'); ?></th>
            <th><?php echo __('Api key'); ?></th>
            <th><?php echo __('URL'); ?></th>
            <th><?php echo __('Worldname'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($configs as $config): ?>
        <tr>
            <td><?php echo h($config['Config']['developer_name']); ?>&nbsp;</td>
            <td><?php echo h($config['Config']['api_key']); ?>&nbsp;</td>
            <td><?php echo h($config['Config']['url']); ?>&nbsp;</td>
            <td><?php echo h($config['Config']['worldname']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $config['Config']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $config['Config']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $config['Config']['id']), null, __('Are you sure you want to delete the config for developer "%s"?', $config['Config']['developer_name'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Config'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Characters'), array('controller' => 'characters', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Character'), array('controller' => 'characters', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Suicide Items'), array('controller' => 'suicideItems', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Suicide Item'), array('controller' => 'suicideItems', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?></li>
    </ul>
</div>