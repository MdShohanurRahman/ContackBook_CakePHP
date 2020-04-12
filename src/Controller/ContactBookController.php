<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;


class ContactBookController extends AppController
{
    public function initialize(): void{
        parent::initialize();
        $this->Auth->allow(['logout','index']);
    }
    

    public function index()
    {
        
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
    $contactbook = $this->ContactBook->get($id);
    if ($contactbook->user_id == $user['id']) {
        return true;
    }
    return parent::isAuthorized($user);
}


}
