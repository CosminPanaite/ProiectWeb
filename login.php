<!-- user1 parola2  admin1 parola1   !!!!!!!!!!!! -->
<?php
 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '', 'football');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];
            header("Location: infopage.php");
            exit();
        }
    }

    $_SESSION['error'] = "Credentials are wrong";
    header("Location: login.php");
    exit();

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styleview.css" />

</head>
<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<div id='error'>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
    }
    ?>
    <form id="login-form" method="post">
        <div id="login-holder">
            <div id="wrapper">
                <div id="login-container">
                    <label id="email-label" for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Type your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                    <label id="password-label" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Type your password" required minlength="6" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" />
                    <button id="login-button">Log In</button>
                    <p id="signup-section">
                        Not a member? <a href="signup.php">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </form>
  <footer id="footer-element">
    <div id="footer-container">
      <p id="logo">&copy; Chelsea official shop</p>
    </div>
  </footer>
  <script>
    const emailInput = document.getElementById("email");
    const emailValidation = document.getElementById("email-validation");
    const passwordInput = document.getElementById("password");
    const passwordValidation = document.getElementById("password-validation");

    emailInput.addEventListener("input", () => {
      if (emailInput.validity.valid) {
        emailValidation.textContent = "Email is valid";
        emailValidation.classList.remove("invalid");
        emailValidation.classList.add("valid");
        setTimeout(() => {
          emailValidation.classList.remove("valid");
          emailValidation.textContent = "";
        }, 3000);
      } else {
        emailValidation.textContent = "Please introduce a valid mail";
        emailValidation.classList.remove("valid");
        emailValidation.classList.add("invalid");
      }
    });

    passwordInput.addEventListener("input", () => {
      if (passwordInput.validity.valid) {
        passwordValidation.textContent = "Password is valid";
        passwordValidation.classList.remove("invalid");
        passwordValidation.classList.add("valid");
        setTimeout(() => {
          passwordValidation.classList.remove("valid");
          passwordValidation.textContent = "";
        }, 3000);
      } else {
        passwordValidation.textContent =
          "Password should be at least 6 characters long";
        passwordValidation.classList.remove("valid");
        passwordValidation.classList.add("invalid");
      }
    });
  </script>
</body>

</html>