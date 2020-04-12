<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void{
        parent::initialize();
            $this->Auth->allow(['logout','login', 'add','edit','delete','view','index','dashboard']);
    }

    
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();

            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
                $this->Flash->success(__('Successfully logged in'));
                // return $this->redirect(['action'=>'dashboard']);
             
            }
            $this->Flash->error('Your username or password is incorrect');
        }
    }

    public function logout(){
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    
    public function index()
    {
        $key = $this->request->getQuery('key');
        $k = $this->request->getQuery('select');

        if($key){
            $query = $this->Users->find('all')
                ->where(['Or'=>['firstName like'=>'%'.$key.'%',
                        'lastName like'=>'%'.$key.'%',
                        'email like'=>'%'.$key.'%', ]]);
        }else{
            $query = $this->Users;
        }
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Contacts', 'Groups'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved. Please login'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
       
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function dashboard(){
        
        $id = $this->Auth->user('id');
        if ($id) {
            $user = $this->Users->get($id, [
            'contain' => ['Contacts', 'Groups'],
            ]);

            $this->set('user', $user);
        }else{
            return $this->redirect(['action' => 'login']);
        }
      

    }



}
