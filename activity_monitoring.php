<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="search-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 style="text-align: center;">Activity Monitoring</h2>
        <div class="form-group">
            <input style="width: 30vw; height: 6vh;" placeholder="Search for Tourist Spot" name="search-input"><br>
            <input style="width: 6vw; height: 6vh;" type="submit" class="btn btn-primary" name="search-button" value="Search">    
        </div>
    </form>
    <style>
        .search-form{
            display: flex;
            justify-content: center;
        }
    </style>
</div>
<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Comment ID</th>
                    <th>Content</th>
                    <th>Ranking</th>
                    <th>Date</th>
                    <th>Commenter</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetch customer information
                    $sql = "SELECT * FROM comments";
                    $result = $conn->query($sql);
                    $comments = $result->fetch_assoc();
                    while ($commentResult = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $commentResult['comment_id'] . "</td>";
                        echo "<td>" . $commentResult['content'] . "</td>";
                        echo "<td>" . $commentResult['ranking'] . "</td>";
                        echo "<td>" . $commentResult['date'] . "</td>";
                        echo "<td>" . $commentResult['id'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>