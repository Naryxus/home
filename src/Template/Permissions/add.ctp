<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Control Objects'), ['controller' => 'ControlObjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Control Object'), ['controller' => 'ControlObjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Objects'), ['controller' => 'RequestObjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Object'), ['controller' => 'RequestObjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissions form large-9 medium-8 columns content">
    <?= $this->Form->create($permission) ?>
    <fieldset>
        <legend><?= __('Add Permission') ?></legend>
        <?php
            echo $this->Form->input('control_object_id', ['options' => $controlObjects]);
            echo $this->Form->input('request_object_id', ['options' => $requestObjects]);
            echo $this->Form->input('permitted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
