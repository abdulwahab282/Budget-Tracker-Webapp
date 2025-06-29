<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.cdnfonts.com/css/old-newspaper" rel="stylesheet">
</head>
    <?php
require 'DB_connect.php';
session_start();
$username = $_SESSION["username"];

$sql = "SELECT Total_credit, total_spend,creation_date,avg_runningbalance FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$total_credit = $data['Total_credit'];
$total_spend = $data['total_spend'];
$creation_date= $data['creation_date'];
$avg_runningbalance=$data['avg_runningbalance'];
?>

<body>
    <div class="container py-4">        <div class="card">
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-md-3 text-center">
                        <img src="../Images/Profile.jpg" alt="Profile" class="rounded-circle img-fluid mb-3" 
                             style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col-md-9">
                        <div class="row g-4">
                            <div class="col-md-6">                                <div class="card h-100">
                                    <div class="card-body">                        <div class="prevPage">
                            <img src="../Images/BookCorner_Flipped.jpg" onclick="window.location.href='HomePage.php'" alt="Previous Page">
                        </div>
                        <h5 class="card-title" style="text-align:center;">Account Details</h5>
                        <p class="mb-2">Account Creation: <span class="text-green"><?php echo $creation_date; ?></span></p>

                                        <p class="mb-2">Highest Running Balance: <span class="badge bg-success">$7,500</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Financial Overview</h5>
                                        <p class="mb-2">Total Amount Spent: <span class="badge bg-danger">RS <?php echo $total_spend; ?></span></p>
                                        <p class="mb-2">Total Amount Credited: <span class="badge bg-success">RS <?php echo $total_credit; ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Balance History</h5>
                                        <p class="mb-2">Average Running Balance: <span class="badge bg-info"><?php echo $avg_runningbalance ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <button onclick="window.location.href='../index.php'" 
                            class="btn btn-danger btn-lg">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>