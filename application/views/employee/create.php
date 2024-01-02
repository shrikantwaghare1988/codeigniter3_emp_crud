<div class="container">
  <!-- Content here -->

  <div class="row justify-content-center mt-3">
           
    <h2 class="text-center mb-1">New Employee</h2>
             
  </div>
  <?php //echo validation_errors(); ?>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-6 mt-1">
                <form action="<?php echo base_url('employee/store')?>" method="post" enctype="multipart/form-data">
                <?php //echo validation_errors(); ?>  
                <div class="mb-3">
                    <label  class="form-label">Name</label>
                    <input type="text" class="form-control <?= form_error('name')?'is-invalid':''; ?>" id="" name="name" value="<?php echo set_value('name')?>">
                    <?php if (form_error('name')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('name'); ?></strong>
                      </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="" name="mobile" value="<?php echo set_value('mobile')?>">
                    <?php if (form_error('mobile')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('mobile'); ?></strong>
                      </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="text" class="form-control" id="" name="email" value="<?php echo set_value('email')?>">
                    <?php echo form_error('email','<span class="invalid-feedback d-block" role="alert"><strong>','</strong></span>'); ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">City</label>
                    <input type="text" class="form-control" id="" name="city" value="<?php echo set_value('city')?>">
                    <?php if (form_error('city')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('city'); ?></strong>
                      </span>
                    <?php } ?>
                </div>


                <div class="mb-3">
                    <label  class="form-label">Department</label>
                    <select class="form-select" aria-label="Default select example" name="dept">
                    <option value="" selected>Select Department</option>
                    <option value="Admin">Admin</option>
                    <option value="Hr">Hr</option>
                    <option value="Development">Development</option>
                    <option value="Testing">Testing</option>
                    </select>
                    <?php if (form_error('dept')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('dept'); ?></strong>
                      </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">Profile Pic</label>
                    <input type="file" class="form-control" id="" name="profile_pic" >
                    <?php if (form_error('profile_pic')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('profile_pic'); ?></strong>
                      </span>
                    <?php } ?>
                </div>



                <input type="submit" class="btn btn-primary mt-2 me-2" id="">
                <a href="<?php echo base_url()?>" class="btn btn-primary mt-2" >Back</a>      
   
                </form>
            </div>            
        </div>
</div>