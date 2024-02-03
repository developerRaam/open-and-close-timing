<?php

// Assuming you have a database connection established

function findNextOpeningDate() {
    // Array of days in a week
    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    // Get the current day
    $currentDayIndex = date('N') -1; // date('N') returns the current day of the week (1 for Monday, 2 for Tuesday, etc.)
    echo $currentDayIndex;
    // Sample logic to find the next opening date
    for ($i = $currentDayIndex + 1; $i < count($daysOfWeek); $i++) {
        $day = $daysOfWeek[$i];
        $closingTime = determineClosingTime($day);

        if ($closingTime !== null) {
            return [
                'nextOpeningDate' => $day,
                'closingTime' => $closingTime,
            ];
        }
    }

    // If no opening date is found for the remaining week, start from Monday
    for ($i = 0; $i < count($daysOfWeek); $i++) {
        $day = $daysOfWeek[$i];
        $closingTime = determineClosingTime($day);

        if ($closingTime !== null) {
            return [
                'nextOpeningDate' => $day,
                'closingTime' => $closingTime,
            ];
        }
    }

    return null; // No opening date found for the entire week
}

function determineClosingTime($day) {
    // Add your logic here to determine closing time for each day
    // For simplicity, let's assume a fixed closing time for each day
    $closingTimeMap = [
        'Monday' => null,
        'Tuesday' => '18:00',
        'Wednesday' => '18:00',
        'Thursday' => '18:00',
        'Friday' => '20:00',
        'Saturday' => '15:00',
        'Sunday' => null, // For demonstration, let's set Sunday to null
    ];

    return $closingTimeMap[$day];
}

// Run the function to find the next opening date
$nextOpeningDate = findNextOpeningDate();

if ($nextOpeningDate !== null) {
    echo "Next opening date: " . $nextOpeningDate['nextOpeningDate'] . " at " . $nextOpeningDate['closingTime'];
} else {
    echo "No opening date found for the entire week.";
}
?>
