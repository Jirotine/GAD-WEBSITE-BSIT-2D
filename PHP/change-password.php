<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAD</title>
    <link rel="stylesheet" href="../CSS/change-username.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>
<body style="background-color:#34114b">
<form class="box" method="POST" action="../Util/check-password-change.php" id="change-password-form">
    <div id="error-message" class="error-message"></div>
        <img class="Logo" src="../Images/Logo.png" alt="DIGITAL LOGO">
        <input type="password" name="oldUsername" class="Password" placeholder="OLD PASSWORD">
        <input type="password" name="newUsername" class="Password" placeholder="NEW PASSWORD">
        <div class="box-buttons">
            <button class="Login" type="submit">Change Password</button>
            <a href="check-profile.php"><button type="button" class="Cancel">Cancel</button></a>
        </div>
    </div>
</form>

<script>
    var errorMessage = document.getElementById("error-message");
    var loginForm = document.getElementById("change-password-form");

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(loginForm);
        var xhr = new XMLHttpRequest();

        xhr.open("POST", loginForm.action, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                errorMessage.innerText = "Change password successful!";
                errorMessage.style.display = "block";
                setTimeout(function() {
                    location.href ="check-profile.php";
                }, 2000);
            }else {
                errorMessage.innerText = xhr.responseText;
                errorMessage.style.display = "block";
                setTimeout(function() {
                errorMessage.style.display = "none";
                }, 3000);
            }
        };

        xhr.send(formData);
    });
</script>

</html>