<?php
$this->Html->addCrumb(__('Permissions'), '/permissions');
?>
<div class="row">
    <?php print_r($requestObjects) ?>
    <div class="col-md-6">
    <h3><?= __('Permissions') ?></h3>
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('control_object_id') ?></th>
                <th><?= $this->Paginator->sort('request_object_id') ?></th>
                <th><?= $this->Paginator->sort('permitted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissions as $permission): ?>
            <tr>
                <td><?= $this->Number->format($permission->id) ?></td>
                <td><?= $permission->has('control_object') ? $this->Html->link($permission->control_object->id, ['controller' => 'ControlObjects', 'action' => 'view', $permission->control_object->id]) : '' ?></td>
                <td><?= $permission->has('request_object') ? $this->Html->link($permission->request_object->id, ['controller' => 'RequestObjects', 'action' => 'view', $permission->request_object->id]) : '' ?></td>
                <td><?= h($permission->permitted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
