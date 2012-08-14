<div class="rankings index">
    <h2><?php echo __('Rankings'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Parent Id'); ?></th>
            <th><?php echo __('Left'); ?></th>
            <th><?php echo __('Right'); ?></th>
            <th><?php echo __('Name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($rankings as $ranking): ?>
        <tr>
            <td><?php echo h($ranking['Ranking']['id']); ?>&nbsp;</td>
            <td><?php echo h($ranking['Ranking']['parent_id']); ?>&nbsp;</td>
            <td><?php echo h($ranking['Ranking']['lft']); ?>&nbsp;</td>
            <td><?php echo h($ranking['Ranking']['rght']); ?>&nbsp;</td>
            <td><?php echo (!is_null($ranking['Ranking']['parent_id']) && !$ranking['Ranking']['is_player']) ? $this->Html->link(h($ranking['Ranking']['name']), array('action' => 'showSKS', $ranking['Ranking']['id'])) : h($ranking['Ranking']['name']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $ranking['Ranking']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ranking['Ranking']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Init Rankings'), array('action' => 'initTree')); ?> </li>
        <li><?php echo $this->Html->link(__('Insert Raids'), array('action' => 'initRaids')); ?> </li>
        <li><?php echo $this->Html->link(__('Insert Players'), array('action' => 'initPlayers')); ?> </li>
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