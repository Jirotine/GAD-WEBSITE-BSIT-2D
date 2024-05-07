<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $user_id = isset($_SESSION['$user_id']) ? $_SESSION['$user_id'] : '';
    $status = '';
    $loginLogoutText = 'Logout';
    $loginLogoutUrl = '../Util/logout.php';
    $survey1 = 'SexualHarassmentAct.php';
    $survey2 = 'SafeSpaceAct.php';
    $survey3 = 'antiVAWC.php';

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

<!DOCTYPE php>
<php lang="en">
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
                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="references.php">References</a>
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

    <div class="aboutUsContent">

        <div class="Goal" id="panels-container">
            <h1 style='font-family: "Anton", sans-serif; font-style: normal; margin-bottom: 10px;'>GOALS</h1>
            <p style="text-align: center; font-size: 1.5vw;">Cultivate widespread understanding and appreciation of Gender and Development (GAD), advocating for equality and empowerment on a global scale. Through education, outreach, and partnerships, we aim to dismantle barriers and biases, fostering inclusivity and opportunity for all genders.</p>
        </div>
        
        <div class="line1"></div>

        <div class="Digital" id="panels-container">

            <div class="Digital1">
                <img class="digitalLogo" src="../Images/Logo.png" alt="Logo" style="height:90px; width:90px;">
                <p style="color: white; margin-top: 40px; text-align: center; font-size: medium;"><span class="digital-bold-letter">D</span>evelopmental <span class="digital-bold-letter">I</span>nnovations for <span class="digital-bold-letter">G</span>ender <span class="digital-bold-letter">I</span>nclusion, <span class="digital-bold-letter">T</span>raining, <span class="digital-bold-letter">A</span>nd <span class="digital-bold-letter">L</span>earning</p>    
            </div>
            
            <div class="Digital2">
                <p style="color: white; text-align: center; font-size: medium;";><span class="digital-bold-letter">DIGITAL</span> is a IT student organization at <span class="digital-bold-letter">Pamantasan ng Lungsod ng San Pablo</span> dedicated to promoting gender equality. Through workshops, campaigns, and community outreach, we raise awareness and empower others to support <span class="digital-bold-letter">Gender and Development</span> (GAD) principles.</p>
            </div>

        </div>

        <div class="line1"> </div>

        <div class="Vision" id="panels-container">
            <h1 style='font-family: "Anton", sans-serif; font-style: normal; margin-bottom: 10px;'>Vision</h1>
            <p class="visionText" style="text-align: center; font-size: 1.45vw;">We envision a future where individuals are empowered to reach their full potential, regardless of gender, and where gender-based discrimination and inequalities are eradicated. Through our collective efforts, we aspire to create inclusive communities, organizations, and systems that prioritize the well-being of every individual.</p>
        </div>

    </div>
        

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/intersection-observer@0.11.0/intersection-observer.js"></script>
    <script type="text/javascript" src="../Utils/design.js"></script>
    <script type="text/javascript" src="../Utils/dropdown.js"></script>
    

</body>

</php>