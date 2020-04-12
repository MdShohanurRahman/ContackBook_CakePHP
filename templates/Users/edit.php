<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<style>
.center {
  margin: auto;
  width: 70%;
  /* border: 3px solid green; */
  
}
</style>

<div class="center">
<div class="card">
    <div class="card-header h4">
        Edit User
    </div>
    <div class="card-body">
<div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
               
                <?php
                    echo $this->Form->control('firstName', ['class'=>'form-control my-2']);
                    echo $this->Form->control('lastName', ['class'=>'form-control my-2']);
                    echo $this->Form->control('email', ['class'=>'form-control my-2']);
                   
                ?>
            </fieldset>
            <?= $this->Form->button('Update', ['class'=>'btn btn-primary mt-2']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    </div>
</div>
</div>
