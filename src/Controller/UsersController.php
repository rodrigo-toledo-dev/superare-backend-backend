<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;

/**
* Users Controller
*
*
* @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class UsersController extends AppController
{
  /**
  * Index method
  *
  * @return \Cake\Http\Response|null
  */
  public function index()
  {
    $http = new Client();
    $users = $http->get('http://localhost:3000/users')->body();
    $this->set(compact('users'));
  }

  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $user = null;
    if ($this->request->is('post')) {
      $http = new Client();
      $user = $http->post("http://localhost:3000/users", $this->request->getData());
      if ($user) {
        $this->Flash->success(__('Operação efetuada com sucesso'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Não foi possível salvar, o usuário verifique os dados'));
    }
    $this->set(compact('user'));
  }

  /**
  * Edit method
  *
  * @param string|null $id User id.
  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $http = new Client();

    if ($this->request->is(['patch', 'post', 'put'])) {
      $user = $http->put("http://localhost:3000/users/$id", $this->request->getData());
      if ($user) {
        $this->Flash->success(__('Operação efetuada com sucesso'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Não foi possível salvar, o usuário verifique os dados'));
    }else{
      $user = json_decode($http->get("http://localhost:3000/users/$id")->body());
    }
    $this->set(compact('user'));
  }

  /**
  * Delete method
  *
  * @param string|null $id User id.
  * @return \Cake\Http\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $http = new Client();
    $user = json_decode($http->delete("http://localhost:3000/users/$id")->body());

    if ($user) {
      $this->Flash->success(__('Operação efetuada com sucesso'));
    } else {
      $this->Flash->error(__('Não foi possível remover o objeto'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
