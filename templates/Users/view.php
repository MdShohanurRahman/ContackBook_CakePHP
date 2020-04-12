<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="card">
            <div class="card-header h3">
            <?= h($user->firstName) ?>
            <div class="btn-group float-right" role="group" aria-label="Basic example">

            <?= $this->Html->link(__('Edit'), ['action' => 'edit',$user->id], ['class' => 'btn btn-info btn-sm']) ?>
            <?= $this->Html->link(__('Delete'), ['action' => 'delete',$user->id], ['class' => 'btn btn-secondary btn-sm']) ?>
            <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
            <?= $this->Html->link(__('Lists'), ['action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>


            </div>
            </div>
    <div class="card-body">
        <table class="table">
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header h4">
        <?= __('Related Contacts') ?>
    </div>
    <div class="card-body">
<div class="related">
                
                <?php if (!empty($user->contacts)) : ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->contacts as $contacts) : ?>
                        <tr>
                            <td><?= h($contacts->id) ?></td>
                            <td><?= h($contacts->user_id) ?></td>
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

<div class="card mt-3">
    <div class="card-header h4 ">
        <?= __('Related Groups') ?>
    </div>
    <div class="card-body">
            <div class="related">
              
                <?php if (!empty($user->groups)) : ?>
                <div class="">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->groups as $groups) : ?>
                        <tr>
                            <td><?= h($groups->id) ?></td>
                            <td><?= h($groups->user_id) ?></td>
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
