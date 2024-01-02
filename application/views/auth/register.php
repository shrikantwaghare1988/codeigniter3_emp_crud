<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Funda of Web IT</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  </head>
<body>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <?php if($this->session->flashdata('status')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>

                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registe</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('register/register') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control">
                                        <?php echo form_error('first_name','<span class="invalid-feedback d-block" role="alert"><strong>','</strong></span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control">
                                        <?php echo form_error('last_name','<span class="invalid-feedback d-block" role="alert"><strong>','</strong></span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email"  value="<?php echo set_value('email'); ?>"  class="form-control">
                                        <?php echo form_error('email','<span class="invalid-feedback d-block" role="alert"><strong>','</strong></span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <?php echo form_error('password','<span class="invalid-feedback d-block" role="alert"><strong>','</strong></span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="cpassword" class="form-control">
                                        <?php echo form_error('cpassword','<span class="invalid-feedback d-block" role="alert"><strong>','</strong></span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm px-5">Register Now</button>
                                    <a href="<?php echo base_url('login')?>" class="btn btn-primary btn-sm px-5">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
                    
</body>
</html>