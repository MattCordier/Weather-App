<?php
ini_set('error_reporting', E_ALL);

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start(); 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
            <div > 
                <form action="includes/process_login.php" method="post" name="login_form">                      
                    Email: <input type="text" class="form-control login-input" name="email" />
                    <br/>
                    Password: <input type="password" class="form-control login-input" name="password" id="password"/>
                    <br/>
                    <input class="btn btn-default login-btn" type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                </form>
            </div>
           
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>Don't have an account? <a id='register' href='register.php'>Register here</a></p>";
                }
?>