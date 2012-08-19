<div class="rankings index">
    <h2><?php echo __('New Suicide List for %s', $raid['Raid']['name']); ?></h2>

    <?php echo $this->Form->input('Raid.id', array('type' => 'hidden', 'value' => $raid['Raid']['id'])); ?>

    <div class="characterList">
        <label for="characterList"><?php echo __('Characters available'); ?>:</label>
        <select id="characterList" name="characterList" multiple="multiple" size="20">
            <?php foreach ($players as $player): ?>
            <optgroup label="<?php echo $player['Player']['name']; ?>">
                <?php foreach ($player['Character'] as $character): ?>
                <option value="<?php echo $character['characterName']; ?>" onclick="moveToSuicideList(this)" data-id="<?php echo $player['Player']['id']; ?>" data-player="<?php echo $player['Player']['name']; ?>"><?php echo $character['characterName']; ?></option>
                <?php endforeach; ?>
            </optgroup>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="suicideList">
        <label for="suicideList"><?php echo __('Suicidelist'); ?>:</label>
        <select id="suicideList" name="suicideList" multiple="multiple" size="20"></select>
    </div>

    <div class="loadRankings">
        <button id="loadRankings"><?php echo __('Load rankings for selected players'); ?></button>
    </div>

    <div class="rankingList">
        <label for="rankingList"><?php echo __('RankingList') ?></label>
        <select id="rankingList" name="rankingList" size="20"></select>
    </div>

    <div class="itemList">
        <label for="itemList"><?php echo __('ItemList'); ?></label>
        <select id="itemList" name="itemList">
            <?php foreach ($items as $item): ?>
            <option value="<?php echo $item['SuicideItem']['id'] ?>"><?php echo $item['SuicideItem']['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="killPlayer">
        <button id="killPlayer"></button>
    </div>
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