<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $controlObject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $controlObject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Control Objects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Control Objects'), ['controller' => 'ControlObjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Control Object'), ['controller' => 'ControlObjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="controlObjects form large-9 medium-8 columns content">
    <?= $this->Form->create($controlObject) ?>
    <fieldset>
        <legend><?= __('Edit Control Object') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentControlObjects, 'empty' => __('No parent category')]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
