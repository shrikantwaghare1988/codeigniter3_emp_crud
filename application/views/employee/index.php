<div class="container">
  <!-- Content here -->
    
        <div class="row justify-content-center mt-3">
            <div class="col-lg-12 my-5">
            <h2 class="text-center mb-3">Codeigniter 3 CRUD (Create-Read-Update-Delete) Application</h2>
            </div>            
        </div>

        <div class="text-left">
        <a href="employee/create" class="btn btn-primary mt-2">New Employee</a>
        </div>

        <div class="mt-3">
        <?php echo $this->session->flashdata('message'); ?>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Department</th>
                <th scope="col">Profile Pic</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($data as $d)
                { ?>
                <tr>
                    <th scope="row"><?php echo $d->id; ?></th>
                    <td><?php echo $d->name; ?></td>
                    <td><?php echo $d->mobile; ?></td>
                    <td><?php echo $d->email; ?></td>
                    <td><?php echo $d->city; ?></td>
                    <td><?php echo $d->dept; ?></td>
                    <td><?php echo $d->profile_pic; ?></td>
                    <td>
                    <a href="<?php echo base_url('employee/edit/'.$d->id)?>" class="btn btn-primary mt-2" >Edit</a>
                    <a href="<?php echo base_url('employee/delete/'.$d->id)?>" class="btn btn-danger mt-2" >Delete</a>
                    </td>
                </tr>
                <?php } 
                ?>
                
              
            </tbody>
        </table>
   

</div>