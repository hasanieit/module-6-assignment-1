<?php

function calculateResult($marks) {
    // Validate marks
    foreach ($marks as $mark) {
        if ($mark < 0 || $mark > 100) {
            return "Mark range is invalid.";
        }
    }

    // Check for fail condition
    foreach ($marks as $mark) {
        if ($mark < 33) {
            return "The student has failed.";
        }
    }

    // Calculate total and average
    $totalMarks = array_sum($marks);
    $averageMarks = $totalMarks / count($marks);

    // Determine grade
    $grade = '';
    switch (true) {
        case ($averageMarks >= 80):
            $grade = "A+";
            break;
        case ($averageMarks >= 70):
            $grade = "A";
            break;
        case ($averageMarks >= 60):
            $grade = "A-";
            break;
        case ($averageMarks >= 50):
            $grade = "B";
            break;
        case ($averageMarks >= 40):
            $grade = "C";
            break;
        case ($averageMarks >= 33):
            $grade = "D";
            break;
        default:
            $grade = "F";
    }

    // Output the results
    return [
        "Total Marks" => $totalMarks,
        "Average Marks" => number_format($averageMarks, 2), // Format average to 2 decimal places
        "Grade" => $grade
    ];
}

// Example marks
$marks = [60, 42, 57, 38, 35]; // You can modify this array with different marks
$result = calculateResult($marks);


// Output result
if (is_string($result)) {
    echo $result; // Print failure or invalid message
} else {
    echo "Total Marks: " . $result["Total Marks"] . "<br>";
    echo "Average Marks: " . $result["Average Marks"] . "<br>";
    echo "Grade: " . $result["Grade"] . "<br>";
}
?>
