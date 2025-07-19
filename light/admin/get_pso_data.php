<?php
// Start session if needed, but typically not required for a data endpoint unless user specific data is fetched
// session_start();

// Include database connection. Adjust path as necessary!
// Assuming db.php is in 'connect' folder relative to this file's location,
// or adjust if it's in a parent directory like 'admin/../db.php' or 'admin/connect/db.php'
// Based on previous errors, let's assume 'connect/db.php' is correct for login_log.php and sign_up_save.php
// If get_pso_data.php is in 'admin' and db.php is in 'light/db.php', then it would be '../db.php'
// Let's assume for this example, you create a 'data' folder inside 'admin' and put this file there,
// and 'db.php' is in 'light/db.php', so it's '../../db.php' if this file is in 'admin/data/get_pso_data.php'.
// If 'get_pso_data.php' is in the SAME folder as 'index.php' (e.g., 'admin/get_pso_data.php'),
// AND 'db.php' is in 'light/db.php', then the path from get_pso_data.php would be '../db.php'.
// PLEASE ADJUST THE PATH TO db.php ACCORDING TO YOUR ACTUAL PROJECT STRUCTURE
// For now, let's use the path from login_log.php as an example, 'connect/db.php', assuming 'get_pso_data.php' is in the same folder as 'login_log.php'
include('../connect/db.php'); // Example path if db.php is in a 'connect' subfolder one level up.

header('Content-Type: application/json'); // Tell the browser this is JSON data

// Define districts and their random demands (or fetch from DB if real)
$districts = ["Thiruvananthapuram", "Kollam", "Alappuzha", "Pathanamthitta", "Kottayam", "Idukki", "Ernakulam", "Thrissur", "Palakkad", "Malappuram", "Kozhikode", "Wayanad", "Kannur", "Kasaragod"];
$demand = [];
foreach ($districts as $district) {
    $demand[$district] = rand(100, 500); // Random demands for demonstration
}

// PSO Parameters
$swarmSize = 20;
$dimensions = count($districts);
$maxIterations = 50; // Max iterations for PSO
$w = 0.7; // Inertia weight
$c1 = 1.5; // Cognitive coefficient
$c2 = 1.5; // Social coefficient

// Initialize particles, velocities, pbest, gbest
$particles = [];
$velocities = [];
$pbestPositions = [];
$pbestScores = [];
$gbestPosition = []; // This will hold the optimized supply values
$gbestScore = INF;

for ($i = 0; $i < $swarmSize; $i++) {
    $particles[$i] = [];
    $velocities[$i] = [];
    for ($j = 0; $j < $dimensions; $j++) {
        $particles[$i][$j] = rand(0, 600); // Initial random supply (adjust max based on expected demand)
        $velocities[$i][$j] = rand(-10, 10);
    }
    $pbestPositions[$i] = $particles[$i];
    $pbestScores[$i] = INF;
}

// Array to store data for the Motion Chart at each iteration
$motion_chart_data_for_js = [];
// Add an initial state (Iteration 0) for the motion chart for better visualization start
foreach ($districts as $d_idx => $districtName) {
    $motion_chart_data_for_js[] = [
        $districtName, // District (string) - Entity
        0,             // Iteration (number) - Time
        $demand[$districtName], // Demand (number) - X-axis metric (stays constant)
        0,             // Initial Supplied Energy (number) - Y-axis metric (starts at 0)
        round(abs($demand[$districtName]) * 0.5 + max(0, $demand[$districtName]) * 2, 2) // Initial Cost Difference (number) - Size metric
    ];
}

// PSO Main Loop
for ($iter = 0; $iter < $maxIterations; $iter++) {
    foreach ($particles as $i => $particle) {
        $currentCost = 0;
        foreach ($districts as $j => $district) {
            $dem = $demand[$district];
            $sup = max(0, round($particle[$j]));
            $diff = $dem - $sup;
            $currentCost += abs($diff) * 0.5 + max(0, $diff) * 2;
        }

        if ($currentCost < $pbestScores[$i]) {
            $pbestScores[$i] = $currentCost;
            $pbestPositions[$i] = $particle;
        }

        if ($currentCost < $gbestScore) {
            $gbestScore = $currentCost;
            $gbestPosition = $particle;
        }
    }

    // Update velocities and positions
    foreach ($particles as $i => $particle) {
        for ($j = 0; $j < $dimensions; $j++) {
            $r1 = (float)rand() / (float)getrandmax();
            $r2 = (float)rand() / (float)getrandmax();

            $cognitiveComponent = $c1 * $r1 * ($pbestPositions[$i][$j] - $particle[$j]);
            $socialComponent = $c2 * $r2 * ($gbestPosition[$j] - $particle[$j]);

            $velocities[$i][$j] = $w * $velocities[$i][$j] + $cognitiveComponent + $socialComponent;
            $particles[$i][$j] += $velocities[$i][$j];
            $particles[$i][$j] = max(0, min(1000, $particles[$i][$j]));
        }
    }

    // Store data for Motion Chart after each iteration update
    // Capture the current gbestPosition for this iteration
    foreach ($districts as $d_idx => $districtName) {
        $current_demand = $demand[$districtName];
        $current_supplied_by_gbest = max(0, round($gbestPosition[$d_idx]));
        $current_diff_cost = abs($current_demand - $current_supplied_by_gbest) * 0.5 + max(0, $current_demand - $current_supplied_by_gbest) * 2;

        $motion_chart_data_for_js[] = [
            $districtName,
            $iter + 1,
            $current_demand,
            $current_supplied_by_gbest,
            round($current_diff_cost, 2)
        ];
    }
}


// Prepare data for the final tables (Cost Details, Final Optimized Distribution)
$pso_results_for_tables = [];
$totalDemand = 0;
$totalSupplied = 0;
$totalDemandCost = 0;
$totalSuppliedCost = 0;
$totalDiffCost = 0;

foreach ($districts as $j => $district) {
    $dem = $demand[$district];
    $sup = max(0, round($gbestPosition[$j]));
    $diff = $dem - $sup;

    $demandCost = $dem * 0.5;
    $suppliedCost = $sup * 0.5;
    $diffCost = abs($diff) * 0.5 + max(0, $diff) * 2;

    $pso_results_for_tables[] = [
        'district' => $district,
        'demand' => $dem,
        'demand_cost' => $demandCost,
        'supplied_energy' => $sup,
        'supplied_cost' => $suppliedCost,
        'energy_difference' => $diff,
        'cost_difference' => $diffCost
    ];

    $totalDemand += $dem;
    $totalSupplied += $sup;
    $totalDemandCost += $demandCost;
    $totalSuppliedCost += $suppliedCost;
    $totalDiffCost += $diffCost;
}

// Prepare data for the static Google Bar Chart (if you use one)
// If you already have this data structure in your main index.php, keep it consistent.
$bar_chart_data = [];
$bar_chart_data[] = ['District', 'Demand', 'Supplied Energy']; // Chart headers

foreach ($districts as $index => $districtName) {
    $current_demand_bar = $demand[$districtName];
    $current_supplied_bar = max(0, round($gbestPosition[$index]));
    $bar_chart_data[] = [$districtName, $current_demand_bar, $current_supplied_bar];
}


// Fetch complaints list (assuming $con is the PDO connection from db.php)
$complaints_list = [];
try {
    // Ensure $con is available and a valid PDO object from db.php
    if (isset($db) && $db instanceof PDO) { // Using $db as per your login_log.php
        $query = $db->prepare("SELECT complaint_subject, complaint_description, complaint_date FROM tbl_complaints ORDER BY complaint_date DESC LIMIT 3");
        $query->execute();
        $complaint_data = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($complaint_data as $row) {
            $complaints_list[] = [
                'subject' => htmlspecialchars($row['complaint_subject']),
                'description' => htmlspecialchars($row['complaint_description']),
                'date' => htmlspecialchars($row['complaint_date'])
            ];
        }
    } else {
        error_log("Database connection (\$db) not properly initialized in get_pso_data.php");
        // You might want to return an error status to the frontend here
    }
} catch (PDOException $e) {
    error_log("Database error fetching complaints in get_pso_data.php: " . $e->getMessage());
    // You might want to return an error status to the frontend here
}

// Combine all data into a single array for JSON output
$response_data = [
    'gbestScore' => round($gbestScore, 2),
    'pso_results_for_tables' => $pso_results_for_tables,
    'totalDemand' => $totalDemand,
    'totalSupplied' => $totalSupplied,
    'totalDemandCost' => round($totalDemandCost, 2),
    'totalSuppliedCost' => round($totalSuppliedCost, 2),
    'totalDiffCost' => round($totalDiffCost, 2),
    'bar_chart_data' => $bar_chart_data, // Data for your existing bar chart
    'motion_chart_data' => $motion_chart_data_for_js, // Data for the motion chart
    'complaints_list' => $complaints_list
];

echo json_encode($response_data);
exit; // Important: Stop execution after outputting JSON
?>