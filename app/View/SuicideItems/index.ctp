<div class="suicideItems index">
    <h2><?php echo __('Suicide Items'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($suicideItems as $suicideItem): ?>
        <tr>
            <td><?php echo h($suicideItem['SuicideItem']['name']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $suicideItem['SuicideItem']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $suicideItem['SuicideItem']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $suicideItem['SuicideItem']['id']), null, __('Are you sure you want to delete # %s?', $suicideItem['SuicideItem']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Suicide Item'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Characters'), array('controller' => 'characters', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Character'), array('controller' => 'characters', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Config'), array('controller' => 'configs', 'action' => 'index')); ?></li>
    </ul>
</div>