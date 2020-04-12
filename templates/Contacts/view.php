<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<style>
.card-img-top{
    /* height: 200px; */
    border-radius: 90%;
}

</style>
 <div class="card">
                <div class="card-header h3 text-capitalize">
                    Contact Information
            <div class="btn-group float-right " role="group" aria-label="Basic example">

            <?= $this->Html->link(__('Edit'), ['action' => 'edit',$contact->id], ['class' => 'btn btn-secondary btn-sm']) ?>

            <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>

            </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-8">
                    <table class="table">
                <!-- <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $contact->has('user') ? $this->Html->link($contact->user->id, ['controller' => 'Users', 'action' => 'view', $contact->user->id]) : '' ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($contact->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($contact->image) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contact->id) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contact->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contact->modified) ?></td>
                </tr>
            </table>
                    </div>
                    <div class="col-md-4">
                        <?= @$this->Html->image($contact->image,['class'=>'card-img-top'])?>
                    </div>
                    </div>
                </div>
            </div>


            <div class="card mt-3">
                <div class="card-header h4">
                   <?= __('Related Groups') ?>
                </div>
                <div class="card-body">
               <div>
              
                <?php if (!empty($contact->groups)) : ?>
                <div>
                    <table class="table table-hover">
                        <tr>
                           
                            <th><?= __('Title') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contact->groups as $groups) : ?>
                        <tr>
                    
                            <td><?= h($groups->title) ?></td>
                            <td><?= h($groups->created) ?></td>
                            <td><?= h($groups->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
                </div>
            </div>


<div class="card my-3">
    <div class="card-header h4">
       <?= __('Contact Details') ?>
    </div>
    <div class="card-body">
            <div class="related mt-2">
                
                <?php if (!empty($contact->details)) : ?>
                <div>
                    <table class="table table-hover">
                        <tr>
                            
                            <th><?= __('Title') ?></th>
                            <th><?= __('Mobile') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Address') ?></th>
                          
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contact->details as $details) : ?>
                        <tr>
                            
                            <td><?= h($details->title) ?></td>
                            <td><?= h($details->mobile) ?></td>
                            <td><?= h($details->phone) ?></td>
                            <td><?= h($details->email) ?></td>
                            <td><?= h($details->website) ?></td>
                            <td><?= h($details->address) ?></td>
                          
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Details', 'action' => 'view', $details->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Details', 'action' => 'edit', $details->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Details', 'action' => 'delete', $details->id], ['confirm' => __('Are you sure you want to delete # {0}?', $details->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
    </div>
</div>