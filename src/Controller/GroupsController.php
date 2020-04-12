<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => [
            'Groups.user_id' => $this->Auth->user('id'),
        ]
        ];
        $groups = $this->paginate($this->Groups,['limit'=>'5']);

        $this->set(compact('groups'));
    }


    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Users', 'Contacts'],
        ]);

        $this->set('group', $group);
    }


    public function add()
    {
        $group = $this->Groups->newEmptyEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            $group->user_id = $this->Auth->user('id');
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200]);
        $contacts = $this->Groups->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('group', 'users', 'contacts'));
    }


    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Contacts'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            $group->user_id = $this->Auth->user('id');
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $users = $this->Groups->Users->find('list', ['limit' => 200]);
        $contacts = $this->Groups->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('group', 'users', 'contacts'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

        public function isAuthorized($user)
{
    $action = $this->request->getParam('action');

    // The add and index actions are always allowed.
    if (in_array($action, ['index', 'add', 'groups'])) {
        return true;
    }
    // All other actions require an id.
    if (!$this->request->getParam('pass.0')) {
        return false;
    }

    // Check that the group belongs to the current user.
    $id = $this->request->getParam('pass.0');
    $group = $this->Groups->get($id);
    if ($group->user_id == $user['id']) {
        return true;
    }
    return parent::isAuthorized($user);
}
}
