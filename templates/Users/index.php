
<div class="card">
    <div class="card-header h4">
    List Of All Users
    <div class="btn-group float-right" role="group" aria-label="Basic example">
    <form class="mr-3"  action="" method="get">
    <input type="text" name="key" class="form-control" placeholder="Search here...">
    </form>
    <?= $this->Html->link(__('Reload'), ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>

    <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    
</div>

    </div>
    <div class="card-body">
    <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
        <th><?= $this->Paginator->sort('firstName') ?></th>
        <th><?= $this->Paginator->sort('lastName') ?></th>
        <th><?= $this->Paginator->sort('email') ?></th>
        
        <th><?= $this->Paginator->sort('created') ?></th>
        <th><?= $this->Paginator->sort('modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($user->id) ?></td> -->
                    <td><?= h($user->firstName) ?></td>
                    <td><?= h($user->lastName) ?></td>


                    <td><?= h($user->email) ?></td>
                    
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete {0}?', $user->firstName)]) ?>
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


