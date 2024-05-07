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
        <a class="navbar-brand" href="../index.html">
            <img src="../Images/Logo.png" alt="DIGITAL LOGO" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../PHP/About.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../PHP/references.php">References</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Survey
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#survey-section">Sexual Harassment Act</a></li>
                        <li><a class="dropdown-item" href="#survey-section">Safe Space Act</a></li>
                        <li><a class="dropdown-item" href="#survey-section">Anti-Violence Against Women and their Children</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-login">
                    <a class="nav-link" id="logoutButton" href="<?php echo $loginLogoutUrl ?>"><?php echo $loginLogoutText ?></a>
                </li>                    
            </ul>
        </div>
    </div>
</header>

<!-- INTRODUCTION -->

<div class="containerContent">
        <div class="col-lg-2">
            <a href="check-profile.php" class="no-underline">
                <button class="Greetings" <?php echo $status ?>>
                    <h2 class="greetingsText"><?php echo $username?></h2>
                </button>
            </a>
        </div>
    
        <div class="row Introduction1" style="margin-top: 2%;">
            <div class="col-md-12 col-lg-6">
                <div class="messageOne" >
                    <h1 style='font-family: "Jersey 10", sans-serif; '>What is Gender And Development ?</h1>
                    <br>
                    <p class="messageText" style="font-size: 1.3vw;">The development perspective and process that is participatory and empowering, equitable, sustainable, free from violence, respectful of human rights, supportive of self-determination and actualization of human potentials. It seeks to achieve gender equality as a fundamental value that should be reflected in development choices and contends that women are active agents of development, not just passive recipients of development.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <img id="sliding-picture1" class="Picture img-fluid" src="../Images/Picture1.png" alt="Picture">
            </div>
        </div>
        
        <div class="headerTitle">
        <div class="line"></div><h1 style="text-align:center; font-family: 'Jersey 10', sans-serif; font-size:70px;">TAKE PART ON OUR SURVEY</h1><div class="line"></div>
        </div>

<!-- SURVEYS -->

<div class="row surveyPanel1" id="survey-section">

    <div class="col-md-12 sHarassment" id="sliding-panel1" style="height: 600px;">
        
        <div class="Title1">
            <h3 style='font-family: "Anton", sans-serif; font-style: normal;'>Sexual Harassment Act</h3>
        </div>
        
        <img class="panelPicture img-fluid" src="../Images/SexualHarassment .png" alt="Sexual Harassment">

        <div class="panelText" style="padding-top: 30px; text-align:center; height: 200px;">
            <p>This law states that work or education-related sexual harassment arises when someone in authority demands sexual favors from another in that setting, regardless of acceptance.</p>
        </div>

        <a href="<?php echo $survey1?>"><button class="panelButton">Survey</button></a>

    </div>

    <div class="col-md-12 sSpaceAct" style="height: 600px;">

        <div class="Title2">
            <h3 style='font-family: "Anton", sans-serif; font-style: normal;'>Safe Space Act</h3>
        </div>

        <img class="panelPicture img-fluid" src="../Images/SafeSpaceAct.png" alt="Sexual Harassment">

        <div class="panelText" style="padding-top: 30px; text-align:center; height: 200px;">
            <p>The State upholds human dignity and rights, ensuring equality for women and men in all spheres, including public spaces, workplaces, and education, to foster a safe and equal society.</p>
        </div>

        <a href="<?php echo $survey2?>"><button class="panelButton">Survey</button></a>

    </div>

    <div class="col-md-12 VAWC" style="text-align: center; height:600px;" id="sliding-panel2">

        <div class="Title3">
            <h5 style='font-family: "Anton", sans-serif; font-style: normal;'>Anti-Violence Against Women and their Children</h5>
        </div>

        <img class="panelPicture img-fluid" src="../Images/VAWC.png" alt="Sexual Harassment">

        <div class="panelText" style="padding-top: 30px; text-align:center; height: 200px;">
            <p>This law aims to combat intimate partner violence against women and their children, perpetrated by spouses, ex-partners, live-in partners, or dating partners.</p>
        </div>

        <a href="<?php echo $survey3?>"><button class="panelButton">Survey</button></a>

    </div>

</div>

<!-- SURVEYS REULTS -->

<div class="row surveyPanel2" id="survey-section">

    <div class="col-md-12 sHarassment" id="sliding-panel1" style="height: 550px;">

    <canvas id="surveyChartOne" width="400" height="400" style="margin-bottom: 30px"></canvas>

        <div class="Title1">
            <h4 style='font-family: "Anton", sans-serif; font-style: normal;'>People Awareness</h4>
        </div>

        <div class="Title1">
            <h3 style='font-family: "Anton", sans-serif; font-style: normal;'>Sexual Harassment Act</h3>
        </div>

    </div>

    <div class="col-md-12 sSpaceAct" style="height: 550px;">

    <canvas id="surveyChartTwo" width="400" height="400" style="margin-bottom: 30px"></canvas>

        <div class="Title2">
            <h4 style='font-family: "Anton", sans-serif; font-style: normal;'>People Awareness</h4>
        </div>

        <div class="Title2">
            <h3 style='font-family: "Anton", sans-serif; font-style: normal;'>Safe Space Act</h3>
        </div>

    </div>

    <div class="col-md-12 VAWC" style="text-align: center; height:550px;">

    <canvas id="surveyChartThree" width="400" height="400" style="margin-bottom: 30px"></canvas>

        <div class="Title3">
            <h4 style='font-family: "Anton", sans-serif; font-style: normal;'>People Awareness</h4>
        </div>

        <div class="Title3">
            <h4 style='font-family: "Anton", sans-serif; font-style: normal;'>Anti-Violence Against Women and their Children</h4>
        </div>

    </div>

</div>

<!-- INTRODUCTION 2 -->

    <div class="headerTitle" style="margin-top:5%;">
        <div class="line"></div><h1 style="text-align:center; font-family: 'Jersey 10', sans-serif; font-size:70px;">MAGNA CARTA OF WOMEN</h1><div class="line"></div>
        </div>

        <div class="row Introduction2">
            <div class="col-md-12 col-lg-6">
                <img id="sliding-picture2" class="Picture2 img-fluid" src="../Images/Picture2.png" alt="Picture">
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="messageTwo">
                    <h1 style='font-family: "Jersey 10", sans-serif; font-size: 3vw;'>Magna Carta of Women (Republic Act No. 9710)</h1>
                    <br>
                    <p class="messageText" style="font-size: 1.3vw;">As the development perspective and process that is participatory and empowering, equitable, sustainable, free from violence, respectful of human rights, supportive of self-determination and actualization of human potentials. It seeks to achieve gender equality as a fundamental value that should be reflected in development choices and contends that women are active agents of development, not just passive recipients of development.</p>
                </div>
            </div>
        </div>

        <div class="headerTitle" st>
        <div class="line"></div><h1 style="text-align:center; font-family: 'Jersey 10', sans-serif; font-size:70px;">VIDEO PRESENTATIONS</h1><div class="line"></div>
        </div>

<div class="row surveyPanel1" id="survey-section">

    <div class="col-md-12 sHarassment" id="sliding-panel1" style="height: 500px;">
        
        <div class="Title1">
            <h3 style='font-family: "Anton", sans-serif; font-style: normal;'>Sexual Harassment Act</h3>
        </div>
        
        <iframe width="300" height="160" style="margin-bottom:26px;" src="https://www.youtube.com/embed/OypXbH2O0tU?si=KfGg5Vvl7YuhequH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <div class="panelText" style="padding-top: 30px; text-align:center; height: 200px;">
        <h4 style="margin-bottom:10%">Sexual Harassment Laws in the Philippines</h4>
        <div class="line" style="background-color:white; height:2px;"></div>
        <br>
        <p style="top:90%;">By: Justice Yap</p>
        </div>

    </div>


    <div class="col-md-12 sSpaceAct" style="height: 500px;">

        <div class="Title2">
            <h3 style='font-family: "Anton", sans-serif; font-style: normal;'>Safe Space Act</h3>
        </div>

        <iframe width="300" height="300" src="https://www.youtube.com/embed/leuEjL4c6KE?si=NaqRjpqYO4GeGo_w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <div class="panelText" style="padding-top: 30px; text-align:center; height: 200px;">
            <h4 style="margin-bottom:25%">Ano ang Safe Spaces Act?</h4>
            <div class="line" style="background-color:white; height:2px;"></div>
            <br>
            <p>By: Batas For Every Juan</p>
        </div>

    </div>

    <div class="col-md-12 VAWC" style="text-align: center; height: 500px; id="sliding-panel2">

        <div class="Title3">
            <h5 style='font-family: "Anton", sans-serif; font-style: normal;'>Anti-Violence Against Women and their Children</h5>
        </div>

        <iframe width="300" height="300" src="https://www.youtube.com/embed/fF8THlu3Nbw?si=3GxMlvM_A2bdsjsl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <div class="panelText" style="padding-top: 30px; text-align:center; height: 200px;">
        <h5 style="margin-bottom:15%">Republic Act 9262 Anti Violence Against Women and Their Children</h5>
        <div class="line" style="background-color:white; height:2px;"></div>
        <br>
        <p>By: Virtual Law</p>
        </div>

    </div>

</div>

        


<!-- ANNOUNCEMENTS -->
<div class="Announcements">
    <div class="announcementBox">
      <h1 class="announce-wall-text" style="font-size: 4vw;">ANNOUNCEMENTS</h1>
      <div id="announcementCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../Images/Announcement1.jpg" alt="Announcement 1">
              </div>
              <div class="carousel-item">
                <img src="../Images/Announcement2.jpg" alt="Announcement 2">
              </div>
              <div class="carousel-item">
                <img src="../Images/Announcement3.jpg"alt="Announcement 3">
              </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#announcementCarousel" data-bs-slide="prev">
        <div class="announcementButton">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </div>
        </button>
        
        <button class="carousel-control-next" type="button" data-bs-target="#announcementCarousel" data-bs-slide="next" style="color: #34114b; font-weight: bolder;">
        <div class="announcementButton">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </div>
        </button>
      </div>
    </div>
  </div>
</div>

  <!-- FOOTER -->
<div class="Footer">
    <h2 style="font-family: 'Jersey 10', sans-serif;">DEVELOPMENTAL INNOVATIONS FOR GENDER INCLUSION, TRAINING, AND LEARNING</h2>
</div>




<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-7bQv7KW9f7/8W7w3QfZostBCRVjhE7YR21zJr4X/D5FJG3h82U7I0/Vu6xRKI1T" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/intersection-observer@0.11.0/intersection-observer.js"></script>
<script type="text/javascript" src="../Utils/design.js"></script>
<script type="text/javascript" src="../Utils/dropdown.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Function to calculate counts for each category
    function calculateCategoryCounts(data) {
        var categoryCounts = {
            'Low': 0,
            'Mid': 0,
            'High': 0
        };
        
        // Iterate through data and count responses for each category
        data.forEach(function(item) {
            categoryCounts[item.label]++;
        });
        
        return categoryCounts;
    }

    // Function to initialize the pie chart
    function initializeChart(data, canvasId) {
        var labels = [];
        var counts = [];
        var backgroundColors = [];
        var borderColors = [];
        
        // Calculate category counts
        var categoryCounts = calculateCategoryCounts(data);
        
        // Extract data for chart initialization
        Object.keys(categoryCounts).forEach(function(category) {
            labels.push(category);
            counts.push(categoryCounts[category]);
            // Customize colors based on category
            if (category === 'High') {
                backgroundColors.push('rgba(255, 99, 132, 0.5)');
                borderColors.push('rgba(255, 99, 132, 1)');
            } else if (category === 'Mid') {
                backgroundColors.push('rgba(54, 162, 235, 0.5)');
                borderColors.push('rgba(54, 162, 235, 1)');
            } else {
                backgroundColors.push('rgba(255, 206, 86, 0.5)');
                borderColors.push('rgba(255, 206, 86, 1)');
            }
        });

        var ctx = document.getElementById(canvasId).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Survey Responses',
                    data: counts,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    labels: {
                        fontColor: '#FFFFFF'
                    }
                }
            }
        });
    }

    // Fetch data from PHP script
    fetch('../Util/fetch_survey_data1.php')
    .then(response => response.json())
    .then(data => {
        // Call the function to initialize the chart with fetched data
        initializeChart(data, 'surveyChartOne');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

    // Fetch data for the second chart from PHP script
    fetch('../Util/fetch_survey_data2.php')
    .then(response => response.json())
    .then(data => {
        // Call the function to initialize the chart with fetched data
        initializeChart(data, 'surveyChartTwo');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

    fetch('../Util/fetch_survey_data3.php')
    .then(response => response.json())
    .then(data => {
        // Call the function to initialize the chart with fetched data
        initializeChart(data, 'surveyChartThree');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
</script>

</body>

</html>