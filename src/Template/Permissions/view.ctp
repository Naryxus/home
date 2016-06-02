<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Control Objects'), ['controller' => 'ControlObjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Control Object'), ['controller' => 'ControlObjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Objects'), ['controller' => 'RequestObjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Object'), ['controller' => 'RequestObjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissions view large-9 medium-8 columns content">
    <h3><?= h($permission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Control Object') ?></th>
            <td><?= $permission->has('control_object') ? $this->Html->link($permission->control_object->id, ['controller' => 'ControlObjects', 'action' => 'view', $permission->control_object->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Request Object') ?></th>
            <td><?= $permission->has('request_object') ? $this->Html->link($permission->request_object->id, ['controller' => 'RequestObjects', 'action' => 'view', $permission->request_object->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($permission->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Permitted') ?></th>
            <td><?= $permission->permitted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
