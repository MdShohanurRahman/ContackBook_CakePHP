<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<style>
.center {
  margin: auto;
  width: 50%;
  /* border: 3px solid green; */
  
}

</style>

<div class="center">
<div class="card">
    <div class="card-header h4">
        Registration Form
    </div>
    <div class="card-body">
<div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
               
                <?php
                    echo $this->Form->control('firstName', ['class'=>'form-control']);
                    echo $this->Form->control('lastName', ['class'=>'form-control']);
                    echo $this->Form->control('email', ['class'=>'form-control']);
                    echo $this->Form->control('password', ['class'=>'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button('Submit', ['class'=>'btn btn-primary mt-2']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    </div>
</div>
</div>
