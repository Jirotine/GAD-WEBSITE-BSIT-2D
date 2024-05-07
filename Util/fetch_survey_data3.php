<?php
include('dbcon.php');

// Fetch survey data from the database
$query = "SELECT 
            survey_id,
            SUM(IF(question1 = 'Yes', 1, 0)) +
            SUM(IF(question2 = 'Yes', 1, 0)) +
            SUM(IF(question3 = 'Yes', 1, 0)) +
            SUM(IF(question4 = 'Yes', 1, 0)) +
            SUM(IF(question5 = 'Yes', 1, 0)) AS total_yes_sum
          FROM vawc
          GROUP BY survey_id";

$result = mysqli_query($conn, $query);

// Prepare data in JSON format
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $survey_id = $row['survey_id'];
    $totalYesSum = $row['total_yes_sum'];
    
    // Determine label based on total yes count
    if ($totalYesSum >= 4) {
        $label = 'High';
    } else if ($totalYesSum == 3) {
        $label = 'Mid';
    } else {
        $label = 'Low';
    }
    
    // Store survey data along with label
    $data[] = array(
        'survey_id' => $survey_id,
        'total_yes_count' => $totalYesSum,
        'label' => $label
    );
}

// Output JSON data
echo json_encode($data);
?>