<div class="rankings index">
    <h2><?php echo __('SKS Ranking for %s', $raid['Raid']['name']); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Position'); ?></th>
            <th><?php echo __('Player'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($sks as $key => $position): ?>
        <tr>
            <td><?php echo $key + 1; ?>&nbsp;</td>
            <td><?php echo h($position['Player']['name']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View Player'), array('controller' => 'players', 'action' => 'view', $position['Player']['id'])); ?>
                <?php echo $this->Html->link(__('Edit Player'), array('controller' => 'players', 'action' => 'edit', $position['Player']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?> </li>
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
        <li><?php echo $this->Html->link(__('List Config'), array('controller' => 'configs', 'action' => 'index')); ?></li>
    </ul>
</div>