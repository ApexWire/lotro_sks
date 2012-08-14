<div class="characters index">
    <h2><?php echo __('Characters'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Race'); ?></th>
            <th><?php echo __('Class'); ?></th>
            <th><?php echo __('Level'); ?></th>
            <th><?php echo __('Player'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($characters as $character): ?>
        <tr>
            <td><?php echo h($character['Character']['characterName']); ?>&nbsp;</td>
            <td><?php echo h($character['Character']['characterRace']); ?>&nbsp;</td>
            <td><?php echo h($character['Character']['characterClass']); ?>&nbsp;</td>
            <td><?php echo h($character['Character']['characterLevel']); ?>&nbsp;</td>
            <td><?php echo $this->Html->link($character['Player']['name'], array('controller' => 'players', 'action' => 'view', $character['Player']['id'])); ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $character['Character']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $character['Character']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $character['Character']['id']), null, __('Are you sure you want to delete # %s?', $character['Character']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Character'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Suicide Items'), array('controller' => 'suicideItems', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Suicide Item'), array('controller' => 'suicideItems', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Config'), array('controller' => 'configs', 'action' => 'index')); ?></li>
    </ul>
</div>