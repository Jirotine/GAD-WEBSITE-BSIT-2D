<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAD</title>
    <link rel="stylesheet" href="../CSS/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>
<body style="background-color:#34114b">

<div id="error-message" class="error-message"></div>

<div id="myModal" class="modal" style="left:25%; top: 28%; height: auto;">
    <div class="modal-content" style="border: 1px solid black;">
        <span class="close" style="text-align: center; right: 5%; top: -1%;">&times;</span>
        <p style="text-align: center; font-weight: 1000;">ALERT!</p>
        <p id="modal-message" style="text-align: center;">Before proceeding with registration, please be aware that providing accurate and reliable information is crucial for the security and functionality of our platform. Inaccurate or incomplete data may affect your ability to access our services and could lead to account suspension.</p>
    </div>
</div>

<form class="box" method="POST" action="../Util/registerHandler.php" id="registerForm">
    <div class="Name">
    <input type="text" name="Username" class="Username" placeholder="USERNAME">
    <input type="text" name="Email" class="Email" placeholder="GMAIL">
    </div>
    <div class="Pass">
    <input type="password" name="Password" class="Password" placeholder="PASSWORD">
    <input type="password" name="Confirm" class="Confirm" placeholder="CONFIRM PASSWORD">
    </div>
    <select name="dropdown" class="Confirm Dropdown">
        <option value="" selected>GENDER</option>
        <option value="Man">Man</option>
        <option value="Woman">Woman</option>
        <option value="Transgender">Transgender</option>
        <option value="Genderqueer">Genderqueer</option>
        <option value="Agender">Agender</option>
        <option value="Genderless">Genderless</option>
        <option value="Non-binary">Non-binary</option>
        <option value="Cis Man">Cis Man</option>
        <option value="Cis Woman">Cis Woman</option>
        <option value="Trans Man">Trans Man</option>
        <option value="Trans Woman">Trans Woman</option>
        <option value="Third Gender">Third Gender</option>
        <option value="Two-Spirit">Two-Spirit</option>
        <option value="Bigender">Bigender</option>
        <option value="Genderfluid">Genderfluid</option>
    </select>
    <div class="box-buttons">
        <button type="submit" class="Register" name="register">Register</button>
        <button type="button" class="Login" onclick="location.href='login.php'">Login</button>
    </div>
    <a href="home.php"><button type="button" class="Cancel">Cancel</button></a>
</form>

<script>
    var modal = document.getElementById("myModal");
    var closeBtn = document.getElementsByClassName("close")[0];
    var form = document.getElementById("registerForm");

    window.onload = function() {
        modal.style.display = "block";
        form.classList.add("blur-background");
    };

    closeBtn.onclick = function() {
        modal.style.display = "none";
        form.classList.remove("blur-background");
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            form.classList.remove("blur-background");
        }
    };
</script>

<script>
    var errorMessage = document.getElementById("error-message");
    var registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(registerForm);
        var password = formData.get("Password");

        if (password.includes(" ")) {
            errorMessage.innerText = "Password cannot contain spaces.";
            errorMessage.style.display = "block";
            setTimeout(function() {
                    errorMessage.style.display = "none";
                }, 3000);
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", registerForm.action, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                errorMessage.innerText = "Registration successful!";
                errorMessage.style.display = "block";
                setTimeout(function() {
                    location.href ="login.php";
                }, 2000);
            } else {
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

</script>

</body>
</html>
