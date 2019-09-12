<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Listar usuários'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Criar usuário'), ['action' => 'add']) ?></li>
        <li><?= $this->Form->postLink(
                __('Apagar este usuário'),
                ['action' => 'delete', $user->_id],
                ['confirm' => __('Deseja realmente apagar o registro # {0}?', $user->_id)]
            )
        ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __("Editando Usuário: $user->_id") ?></legend>
        <?php
            echo $this->Form->select('level', ['admin' => 'Administrador', 'mantenedor' => 'Mantenedor'],['empty' => '-- Escolha o Nível --', 'default' => $user->level, 'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
