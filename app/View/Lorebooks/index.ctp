<div class="lorebooks index">
    <h2><?php echo __('Lorebooks'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('itemid'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($lorebooks as $lorebook): ?>
        <tr>
            <td><?php echo h($lorebook['Lorebook']['id']); ?>&nbsp;</td>
            <td><?php echo h($lorebook['Lorebook']['itemid']); ?>&nbsp;</td>
            <td><?php echo h($lorebook['Lorebook']['name']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $lorebook['Lorebook']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lorebook['Lorebook']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $lorebook['Lorebook']['id']), null, __('Are you sure you want to delete # %s?', $lorebook['Lorebook']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Lorebook'), array('action' => 'add')); ?></li>
    </ul>
</div>