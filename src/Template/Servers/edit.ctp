<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $server
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Listar usuários'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Criar usuário'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar servidores'), ['controller' => 'Servers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Criar servidor'), ['controller' => 'Servers', 'action' => 'add']) ?></li>
        <li><?= $this->Form->postLink(
                __('Apagar este servidor'),
                ['action' => 'delete', $server->_id],
                ['confirm' => __('Deseja realmente apagar o registro # {0}?', $server->_id)]
            )
        ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($server) ?>
    <fieldset>
        <legend><?= __("Editando Servidor: $server->_id") ?></legend>
        <?php
            echo $this->Form->text('client',['placeholder' => '-- Digite o nome do Cliente --', 'default' => $server->client, 'required' => true]);
            echo $this->Form->text('serverIp',['placeholder' => '-- Digite o IP do Servidor --', 'default' => $server->serverIp, 'required' => true]);
            echo $this->Form->select('status',['ativo' => 'Ativo', 'inativo' => 'Inativo'], ['empty' => '-- Selecione o Status do Servidor --', 'default' => $server->status, 'required' => true]);
            echo $this->Form->select('user', $usersList, ['empty' => '-- Selectione o Usuário --', 'default' => $server->user, 'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
