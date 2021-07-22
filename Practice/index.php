<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .pahe-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function (){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<?php
$bookId = 0;
$authorId = 0;
$title = "";
$ISBN = "";
$pub_year = "";
$available = 1;

if (!empty($_POST['bookId '])) {
    $bookId = $_POST['bookId '];
}
if (!empty($POST['authorId'])) {
    $authorId = $_POST['authorId'];
}
if (!empty($_POST['title'])) {
    $title = $_POST['title'];
}
if (!empty($_POST['ISBN'])) {
    $ISBN = $_POST['ISBN'];
}
if (!empty($_POST['pub_year'])) {
    $pub_year = $_POST['pub_year'];
}
if (!empty($_POST['available'])) {
    $available = $_POST['available'];
}
?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Aptech Books</h2>
                    <a href="create.php" class="btn btn-success pull-right">Add New Books</a>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" name="title"/>
                        <input type="submit" value="Search"/>
                    </form>

                </div>
                <?php
                $myDB = new mysqli('localhost', 'root', '', 'exam');
                // make sure the above credentials are correct for your enviroment
                if ($myDB->connect_error) {
                    die('Connect Error (' . $myDB->connect_errno . ') ' . $myDB->connect_error);
                }
                if (isset($_POST['title'])){
                $title = $_POST['title'];
                $sql = "SELECT * FROM books WHERE title LIKE '%$title%';";
                }else {
                $sql = "SELECT * FROM books ORDER BY title";
                }
                $result = $myDB->query($sql);
                ?>
                <?php
                // Include config file
                require_once 'config.php';
                // Attempt select query execution
                $sql = "SELECT * FROM books";

                if ($result = mysqli_query($link, $sql)){
                    if (mysqli_num_rows($result) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Book ID</th>";
                        echo "<th>Title</th>";
                        echo "<th>ISBN</th>";
                        echo "<th>Pub Year</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['bookid'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['ISBN'] . "</td>";
                            echo "<td>" . $row['pub_year'] . "</td>";
                            echo "<td>";
                            echo "<a href='delete.php?id='". $row['bookid']
                                ."' title='View Record' data-toggle='tooltip'>
                                                <span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
