<?php
$this->Html->addCrumb(__('Rights'), '/rights');
$this->Html->addCrumb(__('Add Right'), ['controller' => 'rights', 'action' => 'add']);
?>
<div class="row">
    <div class="col-md-6">
    <?= $this->Form->create($right) ?>
        <legend><?= __('Add Right') ?></legend>
        <div class="form-group">
            <?= $this->Form->input('name', ['class' => 'form-control', 'id' => 'name']) ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
