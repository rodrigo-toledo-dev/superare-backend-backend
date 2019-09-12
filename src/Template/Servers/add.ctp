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
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($server) ?>
    <fieldset>
        <legend><?= __('Criando servidor') ?></legend>
        <?php
            echo $this->Form->text('client',['placeholder' => '-- Digite o nome do Cliente --', 'required' => true]);
            echo $this->Form->text('serverIp',['placeholder' => '-- Digite o IP do Servidor --', 'required' => true]);
            echo $this->Form->select('status',['ativo' => 'Ativo', 'inativo' => 'Inativo'], ['empty' => '-- Selecione o Status do Servidor --', 'required' => true]);
            echo $this->Form->select('user', $usersList, ['empty' => '-- Selectione o Usuário --', 'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
