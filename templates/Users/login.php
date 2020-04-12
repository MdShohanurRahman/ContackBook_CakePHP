<style>
.center {
  margin: auto;
  width: 50%;
  /* border: 3px solid green; */
  
}

</style>

<div class="center">
<div class="card ">
    <div class="card-header h4">
       Log In 
    </div>
    <div class="card-body center">
        <?= $this->Form->create() ?>
        <?= $this->Form->control('email',['class'=>'form-control']) ?>
        <?= $this->Form->control('password', ['class'=>'form-control']) ?>
        <?= $this->Form->button('Sign In', ['class'=>'btn btn-primary mt-2 ml-5']) ?>
        <?= $this->Html->link(__('Sign Up'), ['controller'=>'Users', 'action' => 'add'], ['class' => 'btn btn-success mt-2']) ?>

        <?= $this->Form->end() ?>

    </div>
</div>
</div>