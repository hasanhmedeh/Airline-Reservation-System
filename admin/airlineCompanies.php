<div class="admin_details_container">
    <?php
        include "./airline_modals/add_airline_modal.php";
    ?>
    <h3 class="details_title text-primary">Airline Companies</h3>

    <!-- add button -->
    <div class="d-flex justify-content-end">
        <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-airline-modal"><i class="fas fa-plus"></i> Add Company</button>
    </div>

    
    <!-- users table -->
    <table class="admin_table table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Rate</th>
                <th width="100">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- get all airline companies -->
            <?php
                require_once "./../db_connection/db_connection.php";
                // Query
                $qry = "SELECT * FROM airlineCompany";

                // Get Result
                $result = odbc_exec($conn,$qry);
                $count=1;
                while ($company = odbc_fetch_array($result))
                {
            ?>
            <tr>
                <td><?php echo $count; $count++?></td>
                <td><?php echo $company['airline_name'] ?></td>
                <td><?php echo $company['email'] ?></td>
                <td><?php echo $company['rate'] ?></td>
                <td>

<div class="modal fade" id=<?php echo "airline" . $company['airline_id'] ?> data-reset="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Edit Company</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form noValidate id='<?php echo 'edit-company' . $company['airline_id'] ?>' action="airline_modals/edit_airline_modal.php" method="POST" class="row">

                    <input
                        type="hidden"
                        class="admin_input_field"
                        name="id"
                        type="text"
                        value=<?php echo $company['airline_id'] ?>
                    />                 
                
                    <div class="col-6 mt-4">
                        <label htmlFor="name" class="admin_input_label">Name</label>
                        <input
                            class="admin_input_field"
                            name="name"
                            type="text"
                            value=<?php echo  $company['airline_name'] ?>
                            placeholder="Enter name"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="email" class="admin_input_label">Email</label>
                        <input
                            class="admin_input_field"
                            name="email"
                            type="email"
                            value=<?php echo $company['email'] ?>
                            placeholder="enter email"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="password" class="admin_input_label">Password</label>
                        <input
                            class="admin_input_field"
                            name="password"
                            type="password"
                            placeholder="new password"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="repeat_password" class="admin_input_label">Confirm Password</label>
                        <input
                            class="admin_input_field"
                            name="repeat_password"
                            type="password"
                            placeholder="confirm password"
                        /> 
                    </div>

                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button
                    form='<?php echo 'edit-company' . $company['airline_id'] ?>' 
                    type="submit"
                    name = "update"
                    class="btn btn-primary">
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
                    <button data-bs-toggle="modal" data-bs-target="#<?php echo "airline" . $company['airline_id']?>" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-edit"></i></button>
                    <a href="deleteCompany.php?company_id=<?php echo $company['airline_id']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                </td>
            </tr>

            <?php 
                }
                odbc_free_result($result);

                // Close Connection
                odbc_close($conn);

             ?>

        </tbody>
    </table>

</div>