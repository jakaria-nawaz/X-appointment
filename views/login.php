<?php
require_once 'config/session.php';
require_once 'layout/GenerateLayout.php';
require_once 'src/Database.php';
require_once 'src/User.php';

$user = new User(new Database);
if ($user->is_loggedin() == true) {
    $user->redirect('dashboard.php');
}

// login operation
if (isset($_POST['login_btn'])) {
    $login_result = $user->login($_POST['user_name'], $_POST['password']);
    if ($login_result) {
        $user->redirect('dashboard.php');
    } else {
        $login_error = "Sorry! Wrong credential!";
    }
}

// registration operation
if (isset($_POST['register_btn'])) {
    if (empty($_POST['user_name']) || empty($_POST['password'])) {
        $register_error = "All the fileds are mandatory!";
    } else {
        $register_result = $user->register($_POST['user_name'], $_POST['password']);
        if ($register_result) {
            $register_message = "Your account has been created.";
        } else {
            $register_error = "Username already exist!";
        }
    }
}

$htmlLayout = new GenerateLayout("X-Appointment (Login)");
echo $htmlLayout->generateHeader();
?>

    <div class="jumbotron mt-3">
        <div class="row">
            <div class="col">
                <h3>Appointment Tool</h3>
                <p class="lead">
                    Your daily appointment tool.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac sapien turpis. Ut vehicula dui
                    quis tortor lobortis tincidunt. Donec auctor magna vel sapien mattis consectetur. Donec bibendum
                    nisl ut nunc volutpat, nec ultrices justo commodo. Mauris ac vehicula mauris, ac ullamcorper neque.
                    Quisque luctus euismod erat non pharetra. Mauris id quam quis magna euismod tempus. Nam dui neque,
                    mollis eu nibh et, gravida ultrices turpis. Sed cursus vitae elit at interdum. Vestibulum lobortis
                    sit amet felis a vehicula. Donec congue quis neque at bibendum. Proin eleifend malesuada interdum.
                </p>
            </div> <!-- description column ends -->

            <div class="col">
                <h3>Login Here</h3>

                <?php
                if (isset($login_error)) {
                    ?>
                    <div class="lead alert alert-danger">
                        <?php echo $login_error; ?>
                    </div>
                    <?php
                } else {
                    ?>
                    <p class="lead">
                        Lorem ipsum dolor sit amet.
                    </p>
                    <?php
                }
                ?>

                <form method="post">
                    <div class="form-group">
                        <label for="usernameInput">Username</label>
                        <input type="text" class="form-control" id="user_name" name="user_name"
                               placeholder="Your username">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" class="form-control" id="passwordInput" name="password"
                               placeholder="Password">
                    </div>
                    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                </form> <!-- login form -->

            </div> <!-- login column ends -->
        </div> <!-- row ends -->
    </div> <!-- jumbotron mt-3 -->

    <div class="row registration-form">
        <div class="col">
            <h3>Not Registered Yet?</h3>

            <?php
            if (isset($register_error)) {
                ?>
                <div class="lead alert alert-danger">
                    <?php echo $register_error; ?>
                </div>
                <?php
            } else if (isset($register_message)) {
                ?>
                <div class="lead alert alert-success">
                    <?php echo $register_message; ?>
                </div>
                <?php
            }
            ?>

            <form method="post">
                <div class="form-group">
                    <label for="usernameInput">Username</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                           placeholder="Choose a unique username">
                    <small id="usernameHelp" class="form-text text-muted">Your username has to be unique.</small>
                </div>
                <div class="form-group">
                    <label for="passwordInput">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password"
                           placeholder="Password">
                </div>
                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
            </form>

        </div> <!-- column ends -->
    </div> <!-- registration-form -->

<?php
echo $htmlLayout->generateFooter();
?>