<div class="characters view">
    <h2><?php  echo __('Character'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd><?php echo h($character['Character']['id']); ?>&nbsp;</dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd><?php echo h($character['Character']['characterName']); ?>&nbsp;</dd>
        <dt><?php echo __('Player'); ?></dt>
        <dd><?php echo $this->Html->link($character['Player']['name'], array('controller' => 'players', 'action' => 'view', $character['Player']['id'])); ?>&nbsp;</dd>
        <dt><?php echo __('Race'); ?></dt>
        <dd><?php echo h($character['Character']['characterRace']); ?></dd>
        <dt><?php echo __('Class'); ?></dt>
        <dd><?php echo h($character['Character']['characterClass']); ?></dd>
        <dt><?php echo __('Level'); ?></dt>
        <dd><?php echo h($character['Character']['characterLevel']); ?></dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Character'), array('action' => 'edit', $character['Character']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Character'), array('action' => 'delete', $character['Character']['id']), null, __('Are you sure you want to delete # %s?', $character['Character']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Characters'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Character'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
    </ul>
</div>