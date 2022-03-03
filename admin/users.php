<div class="admin_details_container">
    <?php
        include "./user_modals/add_user_modal.php";
    ?>
    <h3 class="details_title text-primary">Users</h3>

    <!-- add button -->
    <div class="d-flex justify-content-end">
        <button class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-user-modal"><i class="fas fa-plus"></i> Add User</button>
    </div>

    
    <!-- users table -->
    <table class="admin_table table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th width="100">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- get all passenger -->
            <?php
                require_once "./../db_connection/db_connection.php";
                // Query
                $qry = "SELECT * FROM passenger";

                // Get Result
                $result = odbc_exec($conn,$qry);
                
                while ($passenger = odbc_fetch_array($result))
                {
            ?>
               <tr>
                    <td><?php echo $passenger['passenger_username'] ?></td>
                    <td><?php echo $passenger['passenger_name'] ?></td>
                    <td><?php echo $passenger['email'] ?></td>
                    <td><?php echo $passenger['telphone_num'] ?></td>
                    <td>

<div class="modal fade" id=<?php echo $passenger['passenger_username'] ?> data-reset="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form noValidate id='<?php echo 'edit-user' . $passenger['passenger_username'] ?>' action="user_modals/edit_user_modal.php" method="POST" class="row">

                    <input
                        type="hidden"
                        class="admin_input_field"
                        name="username"
                        type="text"
                        value=<?php echo $passenger['passenger_username'] ?>
                    />                 
                    
                    <div class="col-6 mt-4">
                        <label htmlFor="name" class="admin_input_label">Name</label>
                        <input
                            class="admin_input_field"
                            name="name"
                            type="text"
                            
                            <?php echo "value= '".$passenger['passenger_name']."'"; ?>
                            placeholder="Enter name"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="phone_number" class="admin_input_label">phone number</label>
                        <input
                            class="admin_input_field"
                            name="phone_number"
                            type="text"
                            value=<?php echo $passenger['telphone_num'] ?>
                            placeholder="Enter phone number"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="email" class="admin_input_label">Email</label>
                        <input
                            class="admin_input_field"
                            name="email"
                            type="email"
                            value=<?php echo $passenger['email'] ?>
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
                    form='<?php echo 'edit-user' . $passenger['passenger_username'] ?>' 
                    type="submit"
                    name = "update"
                    class="btn btn-primary">
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
                        <button data-bs-toggle="modal" data-bs-target="#<?php echo $passenger['passenger_username'] ?>" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-edit"></i></button>
                        <a href="deletePassenger.php?username=<?php echo $passenger['passenger_username']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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