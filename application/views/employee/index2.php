<div class="container">
  <!-- Content here -->
    
        <div class="row justify-content-center mt-3">
            <div class="col-lg-12 my-3">
            <h2 class="text-center mb-3">DataTables AJAX Pagination with Search and Sort in CodeIgniter 3</h2>
            </div>            
        </div> 

        <table id='empTable' class='display dataTable'>

            <thead>
                <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Dob</th>                
                </tr>
            </thead>
        </table>
</div>

<!-- Script -->
<script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>Employee/autherList'
          },
          'columns': [
             { data: 'id' },
             { data: 'first_name' },
             { data: 'last_name' },
             { data: 'email' },
             { data: 'birthdate' },
          ]
        });
     });
     </script>