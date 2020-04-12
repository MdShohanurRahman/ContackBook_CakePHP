<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="">
        <div class="card">
            <div class="card-header h3">
                Group Information
            <div class="btn-group float-right" role="group" aria-label="Basic example">

            <?= $this->Html->link(__('Edit'), ['action' => 'edit',$group->id], ['class' => 'btn btn-secondary btn-sm']) ?>

            <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>

            </div>
            </div>
  

          
            <table class="table">
    
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($group->title) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($group->id) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($group->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($group->modified) ?></td>
                </tr>
            </table>
        </div>

        <div class="card my-3">
            <div class="card-header h4">
            <?= __('Related Contacts') ?>
            </div>
            <div class="card-body">
            <div class="related mt-2">
                
                <?php if (!empty($group->contacts)) : ?>
                <div class="">
                    <table class="table table-hover">
                        <tr>
                        
                            <th><?= __('Title') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($group->contacts as $contacts) : ?>
                        <tr>
                            <td><?= h($contacts->title) ?></td>
                            <td><?= h($contacts->image) ?></td>
                            <td><?= h($contacts->created) ?></td>
                            <td><?= h($contacts->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contacts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contacts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
    