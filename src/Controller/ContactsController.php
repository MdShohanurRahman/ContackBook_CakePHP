<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

class ContactsController extends AppController
{
    
    public function index()
    {
         $this->paginate = [
            'contain' => ['Users'],
            'conditions' => [
            'Contacts.user_id' => $this->Auth->user('id'),
        ]
        ];

        $key = $this->request->getQuery('key');
        if($key){
            //  $query = $this->Users->findByUsernameOrEmail($key,$key);
            $query = $this->Contacts->find('all')
             ->where(['Or'=>['title like'=>'%'.$key.'%']]);

        }else {
            $query = $this->Contacts;
            $key = '';
        }
        $contacts = $this->paginate($query);

        $this->set(compact('contacts','key'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Users', 'Groups', 'Details'],
        ]);

        $this->set('contact', $contact);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            $contact->user_id = $this->Auth->user('id');

            // get image
            $image = $this->request->getData('image_file');
            // upload image
            if (!$contact->getErrors) {
            
            if ($image) {
                // first change name
                $parts = explode(" ", $contact->title);
                $name = $parts[0].$image->getClientFilename();
            }

            if (!is_dir(WWW_ROOT.'img'.DS.'contact-img')) {
                mkdir(WWW_ROOT.'img'.DS.'contact-img',0075);
            }

            $targetPath = WWW_ROOT.'img'.DS.'contact-img'.DS.$name;

            if ($name) {
                // then move 
                $image->moveTo($targetPath);
                $contact->image = 'contact-img/'.$name;
            }
        }


            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $users = $this->Contacts->Users->find('list', ['limit' => 200]);
        $groups = $this->Contacts->Groups->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'users', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Groups','Details','Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
        
            $contact->user_id = $this->Auth->user('id');

                        // get image
            $image = $this->request->getData('change_image');
            // upload image
            if (!$contact->getErrors) {
            
            $name = $image->getClientFilename();

            if ($name) {
                if (!is_dir(WWW_ROOT.'img'.DS.'contact-img')) {
                    mkdir(WWW_ROOT.'img'.DS.'contact-img',0075);
                }

                $targetPath = WWW_ROOT.'img'.DS.'contact-img'.DS.$name;
                $image->moveTo($targetPath);

                // if exit then delete it
                $imagepath = WWW_ROOT.'img'.DS.$contact->image;
                if(file_exists($imagepath)){
                    unlink($imagepath);
                }
                $contact->image = 'contact-img/'.$name;

            }
        }

            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $users = $this->Contacts->Users->find('list', ['limit' => 200]);
        $groups = $this->Contacts->Groups->find('list', ['limit' => 200]);
        $details = $this->Contacts->Details->find('list', ['limit' => 200]);

        $this->set(compact('contact', 'users', 'groups','details'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        $imagepath = WWW_ROOT.'img'.DS.$contact->image;
        if ($this->Contacts->delete($contact)) {
            if($contact->image){
                if(file_exists($imagepath)){
                    unlink($imagepath);
                }      
                $this->Flash->success(__('The contact has been deleted.'));
            }

        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
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

    // Check that the contacts belongs to the current user.
    $id = $this->request->getParam('pass.0');
    $contact = $this->Contacts->get($id);
    if ($contact->user_id == $user['id']) {
        return true;
    }
    return parent::isAuthorized($user);
}


}
