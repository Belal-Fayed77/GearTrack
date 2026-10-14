<?php
$conn = new mysqli("localhost", "root", "", "geartrack_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM cars ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearTrack | Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .garage-table-section {
            margin-top: 30px;
            background: #111a24;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .garage-table-section h2 {
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #fff;
        }
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            color: #fff;
        }
        .custom-table th, .custom-table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .custom-table th {
            background-color: rgba(255,255,255,0.05);
            font-weight: 600;
            color: #007bff;
        }
        .custom-table tbody tr:hover {
            background-color: rgba(255,255,255,0.02);
        }
        .no-data {
            text-align: center;
            color: #888;
            padding: 20px;
        }
    </style>
</head>
<body class="dashboard-body">

    <nav class="sidebar">
        <h2>GearTrack</h2>
        <ul class="sidebar-menu">
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li><a href="garage.php">My Garage</a></li>
            <li><a href="appointments.html">Appointments</a></li>
            <li><a href="history.html">History</a></li>
            <li class="logout-item">
                <a href="index.html">Logout</a>
            </li>
        </ul>
    </nav>

    <main class="main-view">
        
        <header class="view-header">
            <h1>Welcome back, Belo! 👋</h1>
            <button class="btn-primary">+ Add New Service</button>
        </header>

        <section class="stat-grid">
            
            <div class="stat-card">
                <h3>Current Mileage</h3>
                <b class="value" id="mileage-display">55,430 KM</b>
                <p class="subtext" id="update-mileage-link" style="cursor: pointer; text-decoration: underline; color: var(--blue);">Update Odometer</p>
            </div>

            <div class="stat-card">
                <h3>Oil Status</h3>
                <b class="value">4,200 KM Left</b>
                <p class="subtext">Last change at 51,230 KM</p>
            </div>

            <div class="stat-card">
                <h3>Monthly Budget</h3>
                <b class="value">1,500 EGP</b>
                <p class="subtext" style="color: #28a745;">Safe • 15% used</p>
            </div>

        </section>

        <section class="garage-table-section">
            <h2>🏎️ Tracked Vehicles (Live Database)</h2>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>License Plate</th>
                        <th>VIN Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['brand']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['plate']) . "</td>";
                            echo "<td>" . (!empty($row['vin']) ? htmlspecialchars($row['vin']) : '-') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='no-data'>No vehicles found. Go to 'My Garage' to add one!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

    </main>

    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>