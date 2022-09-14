<?php
require_once "../../classes/dbAPI.class.php";
require_once "../../classes/user.class.php";
require_once "../../classes/validator.class.php";
require_once "../../classes/idGenerator.class.php";

$db = new Database();

$fname = $lname = $dob = $email = $phoneno = $pwd = $cpwd = "";

$err = [
    'fname' => '',
    'lname' => '',
    'dob' => '',
    'email' => '',
    'phoneno' => '',
    'pwd' => '',
    'cpwd' => ''
];

if (isset($_POST['register'])) {
    $role = "SUBMITTER";
    $fname = Validator::sanitise($_POST["uFirstName"]);
    $lname = Validator::sanitise($_POST["uLastName"]);
    $dob = Validator::sanitise($_POST["uDob"]);
    $email = Validator::sanitise($_POST["uEmailAddress"]);
    $phoneno = Validator::sanitise($_POST["uPhoneNo"]);
    $pwd = Validator::sanitise($_POST["uPassword"]);
    $cpwd = Validator::sanitise($_POST["uCPassword"]);
    $id = IDGenerator::user($role, $fname, $lname);


    $user = new User($fname, $lname, $dob, $email, $phoneno, $pwd, $cpwd, $err);

    $user->validateUser();
    $err = $user->get_err();

    if (Validator::validate($err)) {
        $db->createNewUser(
            $id,
            $fname,
            $lname,
            $dob,
            $email,
            $phoneno,
            $role
        );

        $db->createPassword(
            $id,
            $salt,
            $hashpass
        );

        if ($user->validateAccount($id, $pwd)) {
            $_SESSION['valid'] = true;
        } else {
            header('Location: /register');
            $_SESSION['valid'] = false;
        }
        //exit();
    }
}

?>

<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-center h-100">
    <div style="margin: auto; width: 18rem;">
        <img src="src\images\CSMS_Logo.png" class="card-img-top" alt="CMS Logo">
    </div>
    <div class="card-body">
        <h1 class="card-title">Conference Submission Management System</h1>
        <h3 class="text-muted">Registration Page</h3>
        <br>
        <!--Start User Register Form-->
        <form id="UserRegisterForm" action="/register" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-2 mr-2">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['fname'] ?>
                                </small></div>
                            <input id="uFirstName" name="uFirstName" placeholder="First Name" type="text" required class="form-control" value="<?php echo $fname; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['lname'] ?>
                                </small></div>
                            <input id="uLastName" name="uLastName" placeholder="Last Name" type="text" required class="form-control" value="<?php echo $lname; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['dob'] ?>
                                </small></div>
                            <input id="uDob" name="uDob" placeholder="Date of Birth" type="date" required class="form-control" value="<?php echo $dob; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['email'] ?>
                                </small></div>
                            <input id="uEmailAddress" name="uEmailAddress" placeholder="Email" type="email" required class="form-control" value="<?php echo $email; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['phoneno'] ?>
                                </small></div>
                            <input id="uPhoneNo" name="uPhoneNo" placeholder="Phone Number" type="text" required class="form-control" value="<?php echo $phoneno; ?>">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['pwd'] ?>
                                </small></div>
                            <input id="uPassword" name="uPassword" placeholder="Password" type="password" required class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="text-start"><small class="text-danger">
                                    <?php echo $err['pwd'] ?>
                                </small></div>
                            <input id="uCPassword" name="uCPassword" placeholder="Confirm Password" type="password" required class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="uRemember" id="TermsConditions" type="checkbox" required>
                    <label class="form-check-label" for="flexCheckDefault">
                        By signing up, you've agreed to our <a href="">Terms & Conditions</a>
                    </label>
                </div>
            </div>
            <br>
            <div class="form-group btn-group-lg d-grid gap-2">
                <button name="register" type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
        <!--End Login Form-->
        <p class="text-muted">Already registered? <a id="displayLoginForm" href="/">Login</a></p>
    </div>
</div>