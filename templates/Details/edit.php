<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detail $detail
 */
?>


<style>
.center {
  margin: auto;
  width: 70%;
  /* border: 3px solid green; */
  
}

</style>

<div class="">

<div class="card">
    <div class="card-header">
        Edit Contact Details
    </div>
    <div class="card-body">
            <div class="center">
            <?= $this->Form->create($detail) ?>
            <fieldset>
                <?php
                    // echo $this->Form->control('contact_id', ['options' => $contacts]);
                    echo $this->Form->control('title', ['class'=>'form-control']);
                    echo $this->Form->control('mobile', ['class'=>'form-control']);
                    echo $this->Form->control('phone', ['class'=>'form-control']);
                    echo $this->Form->control('email', ['class'=>'form-control']);
                    echo $this->Form->control('website', ['class'=>'form-control']);
                    echo $this->Form->control('address', ['class'=>'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


</div>