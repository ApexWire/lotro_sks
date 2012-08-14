<div class="statuses view">
    <h2><?php  echo __('Player Status'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd><?php echo h($status['Status']['id']); ?>&nbsp;</dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd><?php echo h($status['Status']['status']); ?>&nbsp;</dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), null, __('Are you sure you want to delete "%s"?', $status['Status']['status'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Players'); ?></h3>
    <?php if (!empty($status['Player'])): ?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php $i = 0; ?>
        <?php foreach ($status['Player'] as $player): ?>
        <tr>
            <td><?php echo $player['name']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'players', 'action' => 'view', $player['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'players', 'action' => 'edit', $player['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'players', 'action' => 'delete', $player['id']), null, __('Are you sure you want to delete "%s"?', $player['name'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>