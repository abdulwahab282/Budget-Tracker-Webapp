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
    require_once(__DIR__ . '/DBFunctions/HomePage_vars.php');
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
                        <p class="mb-2">Account Creation: <span class="text-dark"><?php echo $account_creation?></span></p>
                                        <p class="mb-2">Highest Running Balance: <span class="badge bg-success">$7,500</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Financial Overview</h5>
                                        <p class="mb-2">Total Amount Spent: <span class="badge bg-danger">$3,200</span></p>
                                        <p class="mb-2">Total Amount Credited: <span class="badge bg-success">$8,500</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Balance History</h5>
                                        <p class="mb-2">Average Running Balance: <span class="badge bg-info">$5,300</span></p>
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