<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Backup System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header h2 {
            font-size: 24px;
            font-weight: 500;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .dashboard-title {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .backup-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .backup-info {
            margin-bottom: 25px;
            color: #666;
            text-align: center;
        }

        .backup-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 250px;
            margin: 20px auto;
            padding: 15px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .backup-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .backup-btn i {
            margin-right: 10px;
        }

        .status {
            text-align: center;
            margin-top: 20px;
            padding: 15px;
            border-radius: 6px;
        }

        .status-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #666;
            font-size: 14px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            text-align: center;
        }

        .stat-card i {
            font-size: 24px;
            color: #3498db;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <h2><i class="fas fa-database"></i> Database Management System</h2>
        </div>
    </div>

    <div class="container">
        <h1 class="dashboard-title">Database Backup Dashboard</h1>

        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-server"></i>
                <div class="stat-value">Database</div>
                <div class="stat-label">habaraduwaps_habaraduwaps</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-clock"></i>
                <div class="stat-value"><?php echo date('H:i:s'); ?></div>
                <div class="stat-label">Current Time</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-alt"></i>
                <div class="stat-value"><?php echo date('Y-m-d'); ?></div>
                <div class="stat-label">Current Date</div>
            </div>
        </div>

        <div class="backup-section">
            <div class="backup-info">
                <p>Click the button below to generate and download a complete backup of your database.</p>
                <p>The backup file will include all tables, data, and structure.</p>
            </div>
            
            <a href="generate_backup.php" class="backup-btn">
                <i class="fas fa-download"></i>
                Generate Backup
            </a>

            <div class="status">
                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] === 'success') {
                        echo '<div class="status-success">
                                <i class="fas fa-check-circle"></i> 
                                Backup generated successfully!
                              </div>';
                    } elseif ($_GET['status'] === 'error') {
                        echo '<div class="status-error">
                                <i class="fas fa-exclamation-circle"></i> 
                                Error generating backup. Please try again.
                              </div>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="footer">
            <p>Database Backup System &copy; <?php echo date('Y'); ?> | All Rights Reserved</p>
        </div>
    </div>
</body>
</html> 