<?php
	$this->Html->addCrumb(__('Users'), '/users');
	$this->Html->addCrumb(__('Add User'), ['controller' => 'Users', 'action' => 'add']);
?>
<div class="row">
	<div class="col-md-6">
	<?= $this->Form->create($user) ?>
		<legend><?= __('Add User') ?></legend>
		<div class="form-group">
			<?= $this->Form->input('username', ['class' => 'form-control', 'id' => 'username']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('password', ['class' => 'form-control', 'id' => 'password']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('right_id', ['options' => $rights, 'class' => 'form-control', 'id' => 'right_id']) ?>
		</div>
		<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
	<?= $this->Form->end() ?>
	</div>
</div>