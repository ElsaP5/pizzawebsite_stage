<?php
//login 
include 'bdd_conect.php';
session_start(); 


if (isset($_POST["sign_in"])) {
    $Username = $_POST["Username"];
    $Password = $_POST["psw"];

    // Check if the email of the client matches the username in the login form  
    $select_client = "SELECT * FROM CLIENT WHERE email='$Username'";
    // Connect to the DB and perform the query 
    $result = mysqli_query($connect, $select_client);

    if ($result) {
        // Access the fetched columns 
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            // Check if the password matches 
            if (password_verify($Password, $user["Password"])) {
                if ($user['admin'] == 'Admin') {
                    // The person is an admin 
                    //echo "You're an admin";
                    $_SESSION['admin_name'] = $user['prenom'];
                    $_SESSION['admin_id'] = $user['id_client'];
                    header("Location: admin_homepage.php");
                    exit(); // Ensure no further code is executed
                } elseif ($user['admin'] == 'User') {
                    //echo "You're a user";
                    $_SESSION['user_name'] = $user['prenom'];
                    $_SESSION['user_id'] = $user['id_client'];
                    header("Location: user_homepage.php");
                    exit();
                }
            } else {
                echo "<div>Incorrect Password</div>"; 
            }
        } else {
            echo "<div>Incorrect Email or Username</div>";
        }
    } else {
        echo "<div>Database query failed</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>
<img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/049cf305-54e2-4e37-98da-1d6e28453eb0/dh3slld-a4ea1a99-5548-4605-8490-714abd62aa40.jpg/v1/fill/w_894,h_894,q_70,strp/mario_and_luigi_eating_pizza_by_spongebobnintendo20_dh3slld-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTAyNCIsInBhdGgiOiJcL2ZcLzA0OWNmMzA1LTU0ZTItNGUzNy05OGRhLTFkNmUyODQ1M2ViMFwvZGgzc2xsZC1hNGVhMWE5OS01NTQ4LTQ2MDUtODQ5MC03MTRhYmQ2MmFhNDAuanBnIiwid2lkdGgiOiI8PTEwMjQifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.Ne0A1VWpL5l8a2jMeSCtcD57itta-_iqcsmgregDhDA"/>
<div>
    <h1>Do you have an account?</h1>
    <h3>Login:</h3>
    <?php
        if (isset($error)) {
            foreach ($error as $err) {
                echo '<span class="error-msg">'.$err.'</span>';
            }
        }
    ?>
    <div class="login_form">
        <form action="Compte.php" method="post">
            <div class="login_info">
                <label for="email">Username/email: </label>
                <input type="email" id="Username" name="Username" required>
                <br>
                <label for="psw">Password: </label>
                <input type="password" id="psw" name="psw" required>
                <br>
                <input type="submit" value="Login" name="sign_in">
            </div>
        </form>
        <p>Don't have an account? Create one <a href="register.php">here!</a></p>
    </div>
</div>
</body>
</html>
