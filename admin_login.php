<?php
require("database.php");
$errmsg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_info = login($_POST["name"], $_POST["pass"]);
    if (!empty($admin_info["id"]) && $admin_info["id"] > 0) {
        $_SESSION["admin_id"] = $admin_info["id"];

        header('location: ' . $site_url . 'result.php');
    } else {
        $errmsg = "Username or Password wrong!";
    }
}
require("header.php");
?>
<form method="post" action="admin_login.php">
    <div class="form-group">
        <div class="p-3 mb-2 bg-light text-dark">
            <h2>Admin Login</h2>
            <?php
            if ($errmsg != "") {
                echo '<span class="text-danger">' . $errmsg . ' </span>';
            }
            ?>
            <div class="form-group form-row">
                <div class="col-auto">
                    <label><b>Username </b></label>
                    <input class="form-control" type="text" name="name">
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-auto">
                    <label><b>Password: </b></label>
                    <input class="form-control" type="password" name="pass">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>
</form>
<?php require_once("footer.php"); ?>