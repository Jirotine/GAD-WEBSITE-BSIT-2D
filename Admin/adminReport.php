<?php
include('../Util/dbcon.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>GAD</title>
  <link rel="stylesheet" href="../CSS/admin.css?v=<?php echo time(); ?>">
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="../Images/Logo.png">
          <span class="nav-item">Admin</span>
        </a></li>
        <li><a href="adminDashboard.php">
          <i class="fas fa-menorah" active></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <!-- <li><a href="#">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Message</span>
        </a></li> -->
        <li><a href="#">
          <i class="fas fa-database"></i>
          <span class="nav-item">Report</span>
        </a></li>
        <!-- <li><a href="#">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">User</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li> -->

        <li><a href="../Util/logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <section class="user">
          <div class="user-list">
            <h1>User's Survey</h1>
              <!-- SURVEYS REULTS -->
              <div class="Survey">
                  <div class="chart-container">
                    <canvas id="surveyChartOne" width="400" height="400"></canvas>
                    <div class="title-container">
                      <h4>People Awareness</h4>
                      <h3>Sexual Harassment Act</h3>
                    </div>
                  </div>
                  
                  <div class="chart-container">
                    <canvas id="surveyChartTwo" width="400" height="400"></canvas>
                    <div class="title-container">
                      <h4>People Awareness</h4>
                      <h3>Safe Space Act</h3>
                    </div>
                  </div>

                  <div class="chart-container">
                    <canvas id="surveyChartThree" width="400" height="400"></canvas>
                    <div class="title-container">
                      <h4>People Awareness</h4>
                      <h3>Anti-Violence Against Women and their Children</h3>
                    </div>
                  </div>
                </div>
        </section>
      </div>
    </section>
  </div>

  <script>
    function confirmDelete(userId) {
      if (confirm("Are you sure you want to delete this account?")) {
        window.location.href = "delete_user.php?userId=" + userId;

      }
    }
  </script>

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
