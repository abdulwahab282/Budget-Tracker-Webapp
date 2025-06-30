<?php
require_once(__DIR__ . '/../DB_connect.php');
require_once(__DIR__ . '/DBFunctions/HomePage_vars.php');
$username = $_SESSION['username'];

if (isset($_POST["save_budget"])) {
    $yearly = $_POST['yearly_budget'];
    $monthly = $_POST['monthly_budget'];
    $weekly = $_POST['weekly_budget'];
<<<<<<< HEAD:web_pages/Allocate budget.php

    $check = $conn->prepare("SELECT * FROM budget WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $sql = "UPDATE budget SET yearly_budget = ?, monthly_budget = ?, weekly_budget = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ddds", $yearly, $monthly, $weekly, $username);
    } else {
        $sql = "INSERT INTO budget (username, yearly_budget, monthly_budget, weekly_budget) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sddd", $username, $yearly, $monthly, $weekly);
    }

=======
    $sql = "UPDATE budget SET yearly_budget = ?, monthly_budget = ?, weekly_budget   = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddds", $yearly, $monthly, $weekly, $username);
>>>>>>> 9d59c2f5cc551b3587008c1bc3ed3b09f1dbc8ac:web_pages/Allocatebudget.php
    $stmt->execute();
    $stmt->close();
}

if(isset($_POST["saving"])){
    $amount = $_POST["saving"];
    $sql = "UPDATE user SET savings = savings + ? where username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $amount, $username);
    $stmt->execute();
    $sql = "SELECT savings from user where username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $saving_amount = $row ? $row["savings"]: 0;
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Budget Allocation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.cdnfonts.com/css/old-newspaper" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="prevPage">
                            <img src="../Images/BookCorner_Flipped.jpg" onclick="window.location.href='HomePage.php'" alt="Previous Page">
                        </div>
                        <h3 class="card-title text-center mb-4">Budget Allocation</h3>
<<<<<<< HEAD:web_pages/Allocate budget.php
                        <form method="POST" action="">
                            <div class="mb-4">
                                <h4 class="text-center">Running Balance: <span class="badge bg-success">$5000</span></h4>
                            </div>

                            <div class="mb-4">
                                <label for="budget" class="form-label">Allocate Yearly Budget</label>
                                <input type="number" class="form-control" id="budget" name="yearly_budget" required>
=======

                        <form method="POST" action="">
                            <!-- Yearly Budget -->
                            <div class="mb-4">
                                <label for="budget" class="form-label">Allocate yearly budget</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="budget" name="yearly_budget" required>
                                </div>
>>>>>>> 9d59c2f5cc551b3587008c1bc3ed3b09f1dbc8ac:web_pages/Allocatebudget.php
                            </div>

                            <div class="mb-4">
<<<<<<< HEAD:web_pages/Allocate budget.php
                                <label for="monthly_budget" class="form-label">Monthly Budget</label>
                                <input type="number" class="form-control" id="monthly_budget" name="monthly_budget" required>
=======
                                <label for="monthly_budget" class="form-label">Monthly budget</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="monthly_budget" name="monthly_budget" required>
                                </div>
>>>>>>> 9d59c2f5cc551b3587008c1bc3ed3b09f1dbc8ac:web_pages/Allocatebudget.php
                            </div>

                            <div class="mb-4">
<<<<<<< HEAD:web_pages/Allocate budget.php
                                <label for="weekly_budget" class="form-label">Weekly Budget</label>
                                <input type="number" class="form-control" id="weekly_budget" name="weekly_budget" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="save_budget">Save Budget</button>
                            </div>
                        </form>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_budget"])) {
                            echo '<div class="alert alert-success mt-3 text-center">Budget saved successfully!</div>';
                        }
                        ?>

                        <div class="text-center mt-4">
                            <h4>Total Savings: <span class="badge bg-primary">$2000</span></h4>
=======
                                <label for="weekly_budget" class="form-label">Weekly budget</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="weekly_budget" name="weekly_budget" required>
                                </div>
                                <button type="button" class="btn btn-primary" name="autoallocate" onclick="Autofill(document.getElementByName('yearly_budget').value,document.getElementByName('monthly_budget').value, document.getElementByName('weekly_budget').value);">AutoFill values</button>

                                <button type="submit" class="btn btn-primary" name="save_budget" style="margin-left:74.5%;" onclick="">Submit</button>
                            </div>

                                
                        </form>
                            <!-- Credit Savings -->
                            <div class="mb-4">
                                <form method="POST" action="">
                                <label for="credit_saving" class="form-label">Credit saving account</label>
                                <div class="input-group" style="width: 50%;">
                                    <input type="number" class="form-control" name="saving" required>
                                <button type="submit" style="margin-left:12%;" class="btn btn-primary" name="credit_saving" onclick="BudgetVerify(document.getElementByName('yearly_budget').value,document.getElementByName('monthly_budget').value, document.getElementByName('weekly_budget').value)">Submit</button>
                                </form>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <h4>Total Savings: <span class="badge bg-primary"><?php echo "$saving_amount"?></span></h4>
>>>>>>> 9d59c2f5cc551b3587008c1bc3ed3b09f1dbc8ac:web_pages/Allocatebudget.php
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function BudgetVerify(y,m,w,event){
            //The Monthly budget must be a twelfth or less of the Yearly budget
            if(y/12 <= m){
                //The Weekly budget must be less than or equal to a 52nd of the Yearly budget.
                if(y/52 <= w){
                    return true;
                }
                else{
                    event.preventDefault();
                    alert("Weekly Budget calculation incorrect!");
                    return false;
                }
            }
            else{
                event.preventDefault();
                alert("Monthly Budget calculation incorrect!");
                return false;
            }
        }
    </script>

</body>
</html>
