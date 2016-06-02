<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Control Object'), ['action' => 'edit', $controlObject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Control Object'), ['action' => 'delete', $controlObject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controlObject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Control Objects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Control Object'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Control Objects'), ['controller' => 'ControlObjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Control Object'), ['controller' => 'ControlObjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="controlObjects view large-9 medium-8 columns content">
    <h3><?= h($controlObject->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Control Object') ?></th>
            <td><?= $controlObject->has('parent_control_object') ? $this->Html->link($controlObject->parent_control_object->id, ['controller' => 'ControlObjects', 'action' => 'view', $controlObject->parent_control_object->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($controlObject->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($controlObject->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($controlObject->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($controlObject->rght) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Control Objects') ?></h4>
        <?php if (!empty($controlObject->child_control_objects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($controlObject->child_control_objects as $childControlObjects): ?>
            <tr>
                <td><?= h($childControlObjects->id) ?></td>
                <td><?= h($childControlObjects->parent_id) ?></td>
                <td><?= h($childControlObjects->lft) ?></td>
                <td><?= h($childControlObjects->rght) ?></td>
                <td><?= h($childControlObjects->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ControlObjects', 'action' => 'view', $childControlObjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ControlObjects', 'action' => 'edit', $childControlObjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ControlObjects', 'action' => 'delete', $childControlObjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childControlObjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
