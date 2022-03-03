<?php
    if(isset($_POST['submit']))
    {
        require_once './../db_connection/db_connection.php';
        $username = $_POST['username'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $balance = rand(100,10000);
        $sql = "
            declare @credit_card int, @CVV int
            exec createPassenger '$username', '$name', '$phone_number','$email', '$password', $balance, @credit_card out, @CVV out
        ";
        $success = odbc_exec($conn,$sql);
    }
?>

<div class="modal fade" id="add-user-modal" data-reset="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form noValidate id="add-user" action="usersPage.php" method="POST" class="row">
                    
                    <div class="col-6 mt-4">
                        <label htmlFor="username" class="admin_input_label">Username</label>
                        <input
                            class="admin_input_field"
                            name="username"
                            type="text"
                            placeholder="Enter username"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="name" class="admin_input_label">Name</label>
                        <input
                            class="admin_input_field"
                            name="name"
                            type="text"
                            placeholder="Enter name"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="phone_number" class="admin_input_label">phone number</label>
                        <input
                            class="admin_input_field"
                            name="phone_number"
                            type="text"
                            placeholder="Enter phone number"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="email" class="admin_input_label">Email</label>
                        <input
                            class="admin_input_field"
                            name="email"
                            type="email"
                            placeholder="enter email"
                        /> 
                    </div>

                    <div class="col-6 mt-4">
                        <label htmlFor="password" class="admin_input_label">Password</label>
                        <input
                            class="admin_input_field"
                            name="password"
                            type="password"
                            placeholder="enter password"
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
                    form="add-user"
                    type="submit"
                    name = "submit"
                    class="btn btn-primary">
                    Add User
                </button>
            </div>
        </div>
    </div>
</div>
