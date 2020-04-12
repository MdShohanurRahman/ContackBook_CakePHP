<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */

//  debug($contact->details);
//  exit;
?>
<div class="">
<div class="card">
  <h5 class="card-header"> Edit Contact</h5>
  <div class="card-body">
               <?= $this->Form->create($contact, ['type'=>'file']) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('title',['class'=>'form-control mb-2','label'=>'Contact Name']);
                    echo $this->Form->control('change_image',['type'=>'file','class'=>'form-control border-0 mb-2','label'=>'Image']);
                    echo $this->Form->control('groups._ids', ['options' => $groups,'class'=>'form-control','label'=>'Contact Group Name']);
                ?>
            </fieldset>

                
                
            <div class=" my-2">

            <?php if (!empty($contact->details)) : ?>
            <h4>Contact details</h4>
            
                <?php 
                    // echo $this->Form->control('details.0.title',['class'=>'form-control ','custom-select','options'=>['Home'=>'Home','Personal'=>'Personal','Others'=>'Others'],'label'=>'']);
                    // echo $this->Form->control('details.0.mobile',['class'=>'form-control ','label'=>'']);

                // for($x = 0; $x < count($contact->details); $x++) {

                //     echo "<div class='form-row'>";
                //     echo "<div class='form-group col'>";
                //     echo $this->Form->control('details.'.$x.'.title',['class'=>'form-control ','custom-select','options'=>['Home'=>'Home','Personal'=>'Personal','Others'=>'Others'],'label'=>'']);
                //     echo "</div>";

                //     echo "<div class='form-group col'>";
                //     echo $this->Form->control('details.'.$x.'.mobile',['class'=>'form-control','placeholder'=>'Mobile','label'=>'']);
                //     echo "</div>";

                //     echo "<div class='form-group col'>";
                //     echo $this->Form->control('details.'.$x.'.phone',['class'=>'form-control','placeholder'=>'Phone','label'=>'']);
                //     echo "</div>";

                //     echo "<div class='form-group col'>";
                //     echo $this->Form->control('details.'.$x.'.email', ['class'=>'form-control','type'=>'email','placeholder'=>'Email','label'=>'']);
                //     echo "</div>";

                //     echo "<div class='form-group col'>";
                //     echo $this->Form->control('details.'.$x.'.website', ['class'=>'form-control','placeholder'=>'Website','label'=>'']);
                //     echo "</div>";

                //     echo "<div class='form-group col'>";
                //     echo $this->Form->control('details.'.$x.'.address', ['class'=>'form-control','placeholder'=>'Address','label'=>'']);
                //     echo "</div>";

                //     echo "</div>";
                // }
              
                  
                ?>
               
                 <?php endif; ?>
                </div>

             <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary mt-2 btn-sm']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'mt-2 btn btn-danger btn-sm']) ?> 
            <?= $this->Form->end() ?>
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