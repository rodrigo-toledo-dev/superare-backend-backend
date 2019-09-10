<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class UserForm extends Form
{

  protected function _buildSchema(Schema $schema)
  {
    return $schema->addField('type', 'string');
  }

  protected function _buildValidator(Validator $validator)
  {
    return $validator->add('type', 'length', [
      'rule' => ['minLength', 10],
      'message' => 'O campo tipo é obrigatório'
      ]);
    }

    protected function _execute(array $data)
    {
      return true;
    }
  }
?>
