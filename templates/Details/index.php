<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detail[]|\Cake\Collection\CollectionInterface $details
 */
?>

<div class="card">
        <div class="card-header h4">
        All Contact Details Lists
            <div class="btn-group float-right" role="group" aria-label="Basic example">

            <?= $this->Html->link(__('Reload'), ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>

            <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>

            </div>
        </div>
    <div class="card-body">
<table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    
                    <th><?= $this->Paginator->sort('contact_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('mobile') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('website') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                   
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $detail): ?>
                <tr>
                  
                    <td><?= $detail->has('contact') ? $this->Html->link($detail->contact->title, ['controller' => 'Contacts', 'action' => 'view', $detail->contact->id]) : '' ?></td>
                    <td><?= h($detail->title) ?></td>
                    <td><?= h($detail->mobile) ?></td>
                    <td><?= h($detail->phone) ?></td>
                    <td><?= h($detail->email) ?></td>
                    <td><?= h($detail->website) ?></td>
                    <td><?= h($detail->address) ?></td>
               
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detail->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<div class="center">
<ul class="pagination">
    <?= $this->Paginator->prev("Previous") ?> 
    <?= $this->Paginator->numbers() ?> 
    <?= $this->Paginator->next("Next") ?> 

</ul>
</div>
</div>


