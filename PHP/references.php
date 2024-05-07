<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $user_id = isset($_SESSION['$user_id']) ? $_SESSION['$user_id'] : '';
    $status = '';
    $loginLogoutText = 'Logout';
    $loginLogoutUrl = '../Util/logout.php';
    $survey1 = '../Util/SexualHarassmentAct.php';
    $survey2 = '../Util/SafeSpaceAct.php';
    $survey3 = '../Util/antiVAWC.php';

} else {
    $status = 'disabled';
    $username = 'Guest';
    $loginLogoutText = 'Login';
    $loginLogoutUrl = 'login.php';
    $survey1='login.php';
    $survey2='login.php';
    $survey3='login.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAD</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="../CSS/styles.css?v=<?php echo time(); ?>">
    
    <!-- Font imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bungee&family=Jersey+10&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
<!-- HEADER -->
    <header class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #34114b;">
        <div class="container">
            <a class="navbar-brand" href="Intro.php">
                <img src="../Images/Logo.png" alt="DIGITAL LOGO" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../PHP/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/About.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">References</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Survey
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo $survey1 ?>">Sexual Harassment Act</a></li>
                            <li><a class="dropdown-item" href="<?php echo $survey2 ?>">Safe Space Act</a></li>
                            <li><a class="dropdown-item" href="<?php echo $survey3 ?>">Anti-Violence Against Women and their Children</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-login">
                    <a class="nav-link" href="<?php echo $loginLogoutUrl ?>"><?php echo $loginLogoutText ?></a>
                    </li>                    
                </ul>
            </div>
        </div>
    </header>

<!-- REFERENCES -->

<div class="references">
    <div class="referenceContents mt-5">
        <div class="info1">
            <div class="dropdown">
                <button class="btn btn-secondary references-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Gender and Development
                </button>
                <ul class="dropdown-menu show2" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="https://caro.doh.gov.ph/gad/">Introduction</a></li>
                </ul>
            </div>
        </div>
        <div class="info2">
            <div class="dropdown">
                <button class="btn btn-secondary references-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Survey
                </button>
                <ul class="dropdown-menu show2" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item" href="https://pcw.gov.ph/faq-republic-act-7877-anti-sexual-harassment-act-of-1995/">Sexual Harassment Act</a></li>
                    <li><a class="dropdown-item" href="https://pco.gov.ph/wp-content/uploads/2021/10/Gender-and-Development-Related-Laws.pdf">Safe Space Act</a></li>
                    <li><a class="dropdown-item" href="#">Anti Violence Against Women and Children</a></li>
                </ul>
            </div>
        </div>
        <div class="info1">
            <div class="dropdown">
                <button class="btn btn-secondary references-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                    Magna Carta of Women
                </button>
                <ul class="dropdown-menu show2" aria-labelledby="dropdownMenuButton3">
                    <li><a class="dropdown-item" href="https://pcw.gov.ph/faq-republic-act-9710-the-magna-carta-of-women/">Introduction</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-7bQv7KW9f7/8W7w3QfZostBCRVjhE7YR21zJr4X/D5FJG3h82U7I0/Vu6xRKI1T" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/intersection-observer@0.11.0/intersection-observer.js"></script>
<script type="text/javascript" src="../Utils/design.js"></script>
<script type="text/javascript" src="../Utils/dropdown.js"></script>
        
</body>

</html>
