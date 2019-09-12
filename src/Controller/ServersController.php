<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;

/**
* Servers Controller
*
*
* @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class ServersController extends AppController
{
  /**
  * Index method
  *
  * @return \Cake\Http\Response|null
  */
  public function index()
  {
    $http = new Client();
    $servers = $http->get('http://localhost:3000/servers')->body();
    $this->set(compact('servers'));
  }

  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $http = new Client();
    $users = $http->get('http://localhost:3000/users')->body();
    $usersList = [];
    foreach(json_decode($users) as $user){
      $usersList[$user->_id] = "$user->_id - $user->level";
    }
    $server = null;
    if ($this->request->is('post')) {
      $server = $http->post("http://localhost:3000/servers", $this->request->getData());
      if ($server) {
        $this->Flash->success(__('Operação efetuada com sucesso'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Não foi possível salvar, o usuário verifique os dados'));
    }
    $this->set(compact('server', 'usersList'));
  }

  /**
  * Edit method
  *
  * @param string|null $id Server id.
  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $http = new Client();
    $users = $http->get('http://localhost:3000/users')->body();
    $usersList = [];
    foreach(json_decode($users) as $user){
      $usersList[$user->_id] = "$user->_id - $user->level";
    }

    if ($this->request->is(['patch', 'post', 'put'])) {
      $server = $http->put("http://localhost:3000/servers/$id", $this->request->getData());
      if ($server) {
        $this->Flash->success(__('Operação efetuada com sucesso'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Não foi possível salvar, o usuário verifique os dados'));
    }else{
      $server = json_decode($http->get("http://localhost:3000/servers/$id")->body());
    }

    $this->set(compact('server', 'usersList'));
  }

  /**
  * Delete method
  *
  * @param string|null $id Server id.
  * @return \Cake\Http\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $http = new Client();
    $server = json_decode($http->delete("http://localhost:3000/servers/$id")->body());

    if ($server) {
      $this->Flash->success(__('Operação efetuada com sucesso'));
    } else {
      $this->Flash->error(__('Não foi possível remover o objeto'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
