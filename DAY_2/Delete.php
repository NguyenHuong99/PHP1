<?php
$bookId = 0;
$authorId = 0;
$title = "";
$ISBN = "";
$pub_year = 0;
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table cellpadding="2" cellspacing="6" align="center" border="1">
        <tr>
            <td><h3 align="center">Delete</h3>
                <b>Delete:</b><input type="text" name="pub_year"/><br><br>
                <input type="submit" value="Delete">
            </td>
        </tr>
    </table>
</form>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table cellspacing="2" cellpadding="6" align="center" border="1">
        <tr>
            <td><h3 align="center">Update</h3>
                <b>Update:</b><input type="text" name="pub_year"><br><br>
                <input type="submit" value="Update">
            </td>
        </tr>
    </table>
</form>
<?php
$myDB = new mysqli('localhost', 'root', '', 'library');
// make sure the above credentials are correct for your enviroment
if ($myDB->connect_error) {
    die('Connect Error (' . $myDB->connect_errno . ') ' . $myDB->connect_error);
}

if (isset($_POST["pub_year"]) && !empty($_POST["pub_year"])) {
    $Delete = "DELETE FROM books WHERE pub_year = ?";
    echo $Delete;
    $myDB->query($Delete);
    echo "Delete successfully";
}
if (isset($_POST["pub_year"]) && !empty($_POST["pub_year"])) {
    $update = "UPDATE books SET pub_year=?";
    echo $update;
    $myDB->query($update);
    echo "Update successfully";
}
if ($title != '') {
    $sql = "SELECT * FROM books";
} else {
    $sql = "SELECT * FROM books WHERE available = 1 ORDER BY title";
}
$result = $myDB->query($sql);
?>
<table cellpadding="2" cellspacing="6" align="center" border="1">
    <tr>
        <td colspan="4">
            <h3 align="center">These Books are currently available</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">ISBN</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $row["title"];
        echo "</td><td align='center'>";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["ISBN"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
