<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearTrack | My Garage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

    <nav class="sidebar">
        <h2>GearTrack</h2>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active"><a href="garage.php">My Garage</a></li>
            <li><a href="appointments.html">Appointments</a></li>
            <li><a href="history.html">History</a></li>
            <li class="logout-item"><a href="index.html">Logout</a></li>
        </ul>
    </nav>

    <main class="main-view">
        <header class="view-header">
            <h1>My Garage</h1>
            <p style="color: var(--text-muted);">Manage your primary vehicle</p>
        </header>

        <section class="garage-container">
            <div class="car-main-card">
                <div class="car-image-side">
                    <img src="images/photo-1555215695-3004980ad54e.avif" alt="My Car">
                </div>

                <div class="car-info-side">
                    <h2>BMW M5 F90</h2>
                    <p class="model-year">2021 Edition</p>

                    <div class="detail-row">
                        <span>Plate Number</span>
                        <span> 6666 | س ي د</span>
                    </div>
                    <div class="detail-row">
                        <span>VIN Number</span>
                        <span>WBS53AZ01092...</span>
                    </div>
                    <div class="detail-row">
                        <span>Color</span>
                        <span>White</span>
                    </div>

                    <div class="garage-actions" style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
                        <button class="btn-primary">Book New Service</button>
                        <button class="btn-secondary">View History</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="add-car-section">
            <h2>+ Add New Vehicle</h2>
            
            <form class="form-grid" action="insert.php" method="POST">
                
                <div class="form-group">
                    <label>Car Brand</label>
                    <input id="brand" name="brand" type="text" placeholder="e.g. BMW">
                </div>
                
                <div class="form-group">
                    <label>Model</label>
                    <input name="model" type="text" placeholder="e.g. M4">
                </div>
                
                <div class="form-group">
                    <label>Year</label>
                    <input name="year" type="number" placeholder="2024">
                </div>
                
                <div class="form-group">
                    <label>License Plate</label>
                    <input name="plate" type="text" placeholder="123 ABC">
                </div>
                
                <div class="form-group full-width">
                    <label>VIN Number (Optional)</label>
                    <input name="vin" type="text" placeholder="Enter 17-digit VIN">
                </div>
                
                <div class="form-group full-width">
                    <button type="submit" class="btn-primary">Save Vehicle</button>
                </div>
                
            </form>
            </section>
    </main>
<script src="script.js"></script>
</body>
</html>