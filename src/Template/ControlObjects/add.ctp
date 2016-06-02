<?php
$this->Html->addCrumb(__('Control Objects'), '/controlObjects');
$this->Html->addCrumb(__('Add Control Object'), ['controller' => 'controlObjects', 'action' => 'add']);
?>
<div class="row">
	<div class="col-md-6">
    <?= $this->Form->create($controlObject) ?>
        <legend><?= __('Add Control Object') ?></legend>
		<div class="form-group">
			<?= $this->Form->input('parent_id', ['options' => $parentControlObjects, 'empty' => __('No parent category'), 'class' => 'form-control', 'id' => 'parent_id']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('name', ['class' => 'form-control', 'id' => 'name']) ?>
		</div>
    	<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
	</div>
</div>
