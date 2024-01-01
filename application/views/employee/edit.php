<div class="container">
  <!-- Content here -->

  <div class="row justify-content-center mt-3">
           
    <h2 class="text-center mb-1">Edit Employee</h2>
             
  </div>

  <?php //echo validation_errors(); ?>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-6 mt-1">
                <form action="<?php echo base_url('employee/update/'.$data->id)?>" method="post">
                <?php //echo validation_errors(); ?>  
                <div class="mb-3">
                    <label  class="form-label">Name</label>
                    <input type="text" class="form-control <?= form_error('name')?'is-invalid':''; ?>" id="" name="name" value="<?php echo set_value('name',$data->name)?>">
                    <?php if (form_error('name')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('name'); ?></strong>
                      </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="" name="mobile" value="<?php echo set_value('mobile',$data->mobile)?>">
                    <?php if (form_error('mobile')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('mobile'); ?></strong>
                      </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="text" class="form-control" id="" name="email" value="<?php echo set_value('email',$data->email)?>">
                    <?php if (form_error('email')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('email'); ?></strong>
                      </span>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label  class="form-label">City</label>
                    <input type="text" class="form-control" id="" name="city" value="<?php echo set_value('city',$data->city)?>">
                    <?php if (form_error('city')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('city'); ?></strong>
                      </span>
                    <?php } ?>
                </div>


                <div class="mb-3">
                    <label  class="form-label">Department</label>
                    <select class="form-select" aria-label="Default select example" name="dept">
                    <option value="" <?php echo  ($data->dept == '') ? 'selected="selected"' : '' ?> >Select Department</option>
                    <option value="Admin" <?php echo  ($data->dept == 'Admin') ? 'selected="selected"' : '' ?>>Admin</option>
                    <option value="Hr" <?php echo  ($data->dept == 'Hr') ? 'selected="selected"' : '' ?>>Hr</option>
                    <option value="Development" <?php echo  ($data->dept == 'Development') ? 'selected="selected"' : '' ?>>Development</option>
                    <option value="Testing" <?php echo  ($data->dept == 'Testing') ? 'selected="selected"' : '' ?>>Testing</option>
                    </select>
                    <?php if (form_error('dept')){ ?>
                      <span class="invalid-feedback d-block" role="alert">
                        <strong><?= form_error('dept'); ?></strong>
                      </span>
                    <?php } ?>
                </div>


                <input type="submit" class="btn btn-primary mt-2 me-2" id="">
                <a href="<?php echo base_url()?>" class="btn btn-primary mt-2" >Back</a>      
   
                </form>
            </div>            
        </div>
</div>