<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="center">
<div class="card">
  <h5 class="card-header"> Create Contact Group</h5>
  <div class="card-body">
   <fieldset>
       <?= $this->Form->create($group) ?>
        <?php
        echo $this->Form->control('title', ['class'=>'form-control','label'=>'Title']);
        ?>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary mt-2 btn-sm']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'mt-2 btn btn-danger btn-sm']) ?>  
  </fieldset>
        <?= $this->Form->end() ?>
  </div>
</div>  

</div>