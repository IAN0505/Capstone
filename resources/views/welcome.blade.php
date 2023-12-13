<?php
include resource_path('views/data.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Practice')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            @csrf
            <input type="text" placeholder="Search Movie" name="search">
            <button class="btn btn-dark" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php
                if (isset($_POST['submit'])) {
                    $search = mysqli_real_escape_string($con, $_POST['search']);

                    $sql = "SELECT * FROM `disneymovie` WHERE movie_id LIKE '%$search%'
                    OR movie_name LIKE '%$search%' OR genre LIKE '%$search%'
                    OR year_released LIKE '%$search%'";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<thead>
                            <tr>
                            <th>movie_id</th>
                            <th>Movie name</th>
                            <th>year release</th>
                            <th>Genre</th>
                            </tr>
                            </thead>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tbody>
                                <tr>
                                <td>' . $row['movie_id'] . '</td>
                                <td><a href="http://localhost/my-laravel-app/resources/views/searchData.php?data=' . $row['movie_name'] . '">' . $row['movie_name'] . '</a></td>
                                <td>' . $row['year_released'] . '</td>
                                <td>' . $row['genre'] . '</td>
                                </tr>
                                </tbody>';
                            }
                        } else {
                            echo '<h2>DATA NOT FOUND</h2>';
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
