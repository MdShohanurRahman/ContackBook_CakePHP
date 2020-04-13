<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 */
?>
<style>
.img {
  border-radius: 50%;
  height: 40px;
  width: 40px;

}

</style>

<div class="card">
        <div class="card-header h4">
        All Contacts Lists
            <div class="btn-group float-right" role="group" aria-label="Basic example">
    <form class='mr-3' action="" method="get">
     <input  type="text" name="key" value= "<?= $this->request->getQuery('key')?>" class="form-control" placeholder="Search here...">
    </form>
    <?= $this->Html->link(__('Reload'), ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>

    <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>

            </div>
        </div>

        <div class="card-body">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?= @$this->Html->image($contact->image,['class'=>'img mr-auto'])?></td>
           
                    <!-- <td><?= $contact->has('user') ? $this->Html->link($contact->user->id, ['controller' => 'Users', 'action' => 'view', $contact->user->id]) : '' ?></td> -->
                    <td><?= h($contact->title) ?></td>
                    <td><?= h($contact->created) ?></td>
                    <td><?= h($contact->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contact->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


</div>

<div class="card-footer bg-white">
<ul class="pagination">
    <?= $this->Paginator->prev("Previous") ?> 
    <?= $this->Paginator->numbers() ?> 
    <?= $this->Paginator->next("Next") ?> 

</ul>
</div>
</div>

