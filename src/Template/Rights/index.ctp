<?php
$this->Html->addCrumb(__('Rights'), '/rights');
?>
<div class="row">
    <div class="col-md-6">
    <h3><?= __('Rights') ?></h3>
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rights as $right): ?>
            <tr>
                <td><?= h($right->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $right->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $right->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $right->id], ['confirm' => __('Are you sure you want to delete # {0}?', $right->id)]) ?>
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
