
<div class="card">
<div class="card-header h4">
All Groups List
<div class="btn-group float-right" role="group" aria-label="Basic example">

    <?= $this->Html->link(__('Reload'), ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>

    <?= $this->Html->link(__('Create'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
    
</div>

</div>

<div class="card-body">
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
        <th class=""><?= $this->Paginator->sort('title') ?></th>
        <th class=""><?= $this->Paginator->sort('created') ?></th>
        <th class=""><?= $this->Paginator->sort('modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
                <?php foreach ($groups as $group) : ?>
                    <tr> 
                        <td><?= h($group->title) ?></td>
                        <td><?= h($group->created) ?></td>
                        <td><?= h($group->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?>
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

