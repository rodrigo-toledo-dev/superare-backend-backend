<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Listar usuários'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Criar usuário'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar servidores'), ['controller' => 'Servers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Criar servidor'), ['controller' => 'Servers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Lista de Servidores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Cliente') ?></th>
                <th scope="col"><?= __('IP') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Usuário') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (json_decode($servers) as $server): ?>
            <tr>
                <td><?= $server->_id ?></td>
                <td><?= $server->client ?></td>
                <td><?= $server->serverIp ?></td>
                <td><?= $server->status ?></td>
                <td><?= $server->user ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $server->_id]) ?>
                    <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $server->_id], ['confirm' => __('Deseja realmente apagar o registro # {0}?', $server->_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
