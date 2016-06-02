<?php
$this->Html->addCrumb(__('Control Objects'), '/controlObjects');
?>
<div class="row">
	<div class="col-md-6">
    <h3><?= __('Control Objects') ?></h3>
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($controlObjects as $controlObject): ?>
            <tr>
                <td><?= $controlObject->has('parent_control_object') ? $this->Html->link($controlObject->parent_control_object->id, ['controller' => 'ControlObjects', 'action' => 'view', $controlObject->parent_control_object->id]) : '' ?></td>
                <td><?= h($controlObject->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $controlObject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $controlObject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $controlObject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controlObject->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
	</div>
</div>
