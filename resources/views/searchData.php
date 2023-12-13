<?php
include 'data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    
    if (isset($_GET['data'])) {
        $movie_name = $_GET['data'];
    
        $sql = "SELECT * FROM `disneymovie` WHERE movie_name = '$movie_name'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
    
            if ($row) {
                echo '
                    <div class="container">
                        <div class="jumbotron">
                            <h1 class="display-4">' . $row['movie_name'] . '</h1>
                            <p class="lead">Movie Price: php ' . $row['movie_price'] . '</p>
                            <hr class="my-4">
                            <p class="lead"></p>
                        </div>
                    </div>';
            } else {
                echo "Movie not found.";
            }
        } else {
            echo "Error in SQL query: " . mysqli_error($con);
        }
    }
    ?>


</body>
</html>
