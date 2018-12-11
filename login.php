<!--library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php session_start(); ?>
<!-- design login page -->
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-info">
            <h2 class="text-center">Login</h2>
            <form id="lofinForm" action="loginController.php">
                <?php
                if(isset($_SESSION['error_empty'])){
                    echo $_SESSION['error_empty'];
                    unset($_SESSION['error_empty']);
                }
                ?>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
                        <select class="form-control" id="userType" name="userType">
                            <option value="" selected>Select User Type</option>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                            <option value="304">304(LA)</option>
                            <option value="404">404(LA)</option>
                            <option value="405">405(LA)</option>
                            <option value="605">605(LA)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> </span>
                        <input class="form-control" type="email" name="email" id="loginEmail" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
                        <input class="form-control" type="password" name="password" id="loginPassword"
                               placeholder="Password" required>
                    </div>
                </div>
            <div class="form-group">
                <button class="form-control btn btn-info" name="login" type="submit"><i class="glyphicon glyphicon-log-in"></i> Login
                </button>
            </div>
            <div class="form-group">
                <a style="float: left"></a><a style="float: right; cursor: pointer" onclick="SignUp()">SignUp</a>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- registration design using modal -->

<div class="modal fade" id="mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal">&times;</a>
                <h3>Registration Form</h3>
            </div>
            <div class="modal-body">
                <form id="registrationForm" method="post" action="loginController.php">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
                            <input class="form-control" type="text" name="userName" id="RegUserName"
                                   placeholder="User Name">
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> </span>
                                <input class="form-control" type="email" name="email" id="RegEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
                                <input class="form-control" type="password" name="password" id="RegPassword" placeholder="Password">
                            </div>
                        </div>
						<select class="form-control" id="progress" name="progress" style="width: 100%">
                                            <option value="Test1">Test 1</option>
                                            <option value="Test2" >Test 2</option>
                                            <option value="Test3" >Test 3</option>
                                        </select>
                <div class="form-group">
                    <button class="btn btn-info form-control" name="registration" type="submit" onclick="saveForm()"><i class="glyphicon glyphicon-registration-mark"></i> Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    function SignUp() {
        $("#mymodal").modal();
    }
</script>