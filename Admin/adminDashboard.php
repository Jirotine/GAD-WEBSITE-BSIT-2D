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
        <li><a href="#">
          <i class="fas fa-menorah" active></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <!-- <li><a href="#">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Message</span>
        </a></li> -->
        <li><a href="adminReport.php">
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
            <h1>Users List</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Password</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Code</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["code"] . "</td>";
                        echo "<td><button onclick=\"confirmDelete(" . $row["user_id"] . ")\">Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>0 results</td></tr>";
                }
                ?>
              </tbody>
            </table>
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

</body>
</html>
