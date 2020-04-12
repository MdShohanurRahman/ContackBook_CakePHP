<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<div class="center">
<div class="card">
  <h5 class="card-header"> Create Contact</h5>
  <div class="card-body">
               <?= $this->Form->create($contact, ['type'=>'file']) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('title',['class'=>'form-control mb-2','label'=>'Contact Name']);
                    echo $this->Form->control('image_file',['type'=>'file','class'=>'form-control border-0 mb-2','label'=>'Image']);
                    echo $this->Form->control('groups._ids', ['options' => $groups,'class'=>'form-control','label'=>'Contact Group']);
                ?>
            </fieldset>


                                
<h4 class="my-3">Contact details</h4>
    <div class="form-row mx-2">
      <div class="col">
        <select class="custom-select" id="title" name="details[0][title]" required>
         
          <option>Home</option>
          <option>Personal</option>
          <option>Others</option>

        </select>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="mobile" name="details[0][mobile]" placeholder="Mobile" required>
      </div>
      <div class="col">
      
        <input type="text" class="form-control" id="phone" placeholder="Phone" name=" details[0][phone]" required>
      </div>
      <div class="col">
     
      <input type="email" class="form-control" id="email" name="details[0][email]" placeholder="Email" required>
    </div>

      <div class="col">
        <input type="text" class="form-control" id="website" name="details[0][website]" placeholder="Website" required>
      </div>
        <div class="col">
        
        <input type="text" class="form-control" id="address" name="details[0][address]" placeholder="Address" required>
      </div>

        <div class="col">
          <button class="btn btn-primary add_more_button">+</button>
      </div>
    </div>

            
       <div class="input_fields_container_part container"> </div>
             <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary mt-2 btn-sm']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'mt-2 btn btn-danger btn-sm']) ?> 
            <?= $this->Form->end() ?>
            <br>
  </div>
</div>  

</div>



<script>
    $(document).ready(function() {
    let max_fields_limit = 5; //set limit for maximum input fields
    let x = 0; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container_part').append(`<div class="form-row my-2"><div class="col"><select class="custom-select" id="validationDefault04" name="details[${x}][title]" required><option>Home</option><option>Personal</option><option>Others</option></select></div><div class="col"><input type="text" class="form-control" id="mobile" name="details[${x}][mobile]" placeholder="Mobile Number" required></div><div class="col"><input type="text" class="form-control" id="phone" placeholder="Phone Number" name="details[${x}][phone]" required></div><div class="col"><input type="email" class="form-control" id="email" name="details[${x}][email]" placeholder="Email" required></div><div class="col"><input type="text" class="form-control" id="website" name="details[${x}][website]"placeholder="Website" required></div><div class="col"><input type="text" class="form-control" id="address" name="details[${x}][address]" placeholder="Address" required></div><div class="col"><button class="btn btn-danger remove_field add_more_button">--</button> </div>`); //add input field
        }
    });  
    $('.input_fields_container_part').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault();
        $(this).parents('.form-row').remove();
        x--;
    })
});


</script>