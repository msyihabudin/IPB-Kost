<div class="col-lg-4 col-lg-offset-4">
    <h2>Hello There</h2>
    <h5>Please enter the required information below.</h5>     
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open('/user/register', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array('name'=>'fullname', 'id'=> 'fullname', 'placeholder'=>'Full Name', 'class'=>'form-control', 'value' => set_value('fullname'))); ?>
      <?php echo form_error('fullname');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'username', 'id'=> 'username', 'placeholder'=>'Username', 'class'=>'form-control', 'value'=> set_value('username'))); ?>
      <?php echo form_error('username');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
      <?php echo form_error('email');?>
    </div>
    <?php echo form_submit(array('value'=>'Sign up', 'class'=>'btn btn-md btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>