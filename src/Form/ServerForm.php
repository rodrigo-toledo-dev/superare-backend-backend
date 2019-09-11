<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ServerForm extends Form
{

  protected function _buildSchema(Schema $schema)
  {
    return $schema->addField('client', 'string')
      ->addField('serverIp','string')
      ->addField('status','string')
      ->addField('user','string');
  }

  protected function _buildValidator(Validator $validator)
  {
    return $validator->requirePresence('client')
      ->notEmpty('client', 'Favor preencher o Nome do Cliente')
      ->requirePresence('serverIp')
      ->notEmpty('serverIp', 'Favor preencher o IP do Servidor')
      ->requirePresence('status')
      ->notEmpty('status', 'Favor preencher a Situação do Servidor')
      ->requirePresence('user')
      ->notEmpty('user', 'Favor preencher a qual Usuário este Servidor pertence');
  }

  protected function _execute(array $data)
  {
    return true;
  }

  protected function create()
  {
    return true;
  }

  protected function update()
  {
    return true;
  }

  public function findAll()
  {
    return true;
  }

  public function destroy($id)
  {
    return true;
  }
}
?>
