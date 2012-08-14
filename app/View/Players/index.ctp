<div class="players index">
    <h2><?php echo __('Players'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Number of Characters'); ?></th>
            <th><?php echo __('Status'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($players as $player): ?>
        <tr>
            <td><?php echo h($player['Player']['name']); ?>&nbsp;</td>
            <td><?php echo count($player['Character']); ?></td>
            <td><?php echo $this->Html->link($player['Status']['status'], array('controller' => 'statuses', 'action' => 'view', $player['Status']['id'])); ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $player['Player']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $player['Player']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $player['Player']['id']), null, __('Are you sure you want to delete "%s"?', $player['Player']['name'])); ?>
                <?php echo $this->Html->link(__('Show Characters'), array('controller' => 'characters', 'action' => 'showCharactersByPlayer', $player['Player']['id'])); ?>
                <?php echo $this->Html->link(__('Add Character'), array('controller' => 'characters', 'action' => 'add')); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Characters'), array('controller' => 'characters', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Character'), array('controller' => 'characters', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Suicide Items'), array('controller' => 'suicideItems', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Suicide Item'), array('controller' => 'suicideItems', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Config'), array('controller' => 'configs', 'action' => 'index')); ?></li>
    </ul>
</div>