<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAD</title>
    <link rel="stylesheet" href="../CSS/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>

<body style="background-color:#34114b">
<form class="box" method="POST" action="../Util/check-login.php" id="loginForm">
    <div id="error-message" class="error-message"></div>
        <img class="Logo" src="../Images/Logo.png" alt="DIGITAL LOGO">
        <input type="text" name="Username" class="Username" placeholder="USERNAME">
        <input type="password" name="Password" class="Password" placeholder="PASSWORD" style="margin-bottom:20px;">
        <div class="box-buttons">
            <button class="Login" type="submit">Login</button>
            <a href="../PHP/register.php"><button type="button" class="Register">Register</button></a>
        </div>
        <a href="forgotPassword.php"><button type="button" class="forgot" stlyle="font-size:3px;">Forgot Password</button></a>
        <a href="home.php"><button type="button" class="Cancel">Cancel</button></a>
    </div>
</form>

<script>
    var errorMessage = document.getElementById("error-message");
    var loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(loginForm);
        var xhr = new XMLHttpRequest();

        xhr.open("POST", loginForm.action, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                errorMessage.innerText = response.message;
                errorMessage.style.display = "block";
                setTimeout(function() {
                    if (response.redirect) {
                        location.href = response.redirect;
                    } else {
                        errorMessage.style.display = "none";
                    }
                }, 2000);
            } else {
                errorMessage.innerText = xhr.responseText;
                errorMessage.style.display = "block";
                setTimeout(function() {
                    errorMessage.style.display = "none";
                }, 3000);
            }
        };

        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.send(formData);
    });
</script>

</body>

</html>