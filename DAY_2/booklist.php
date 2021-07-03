<?php
$myBD = new mysqli('localhost', 'root', '', 'library');
if ($myBD->connect_error)
{
    die('Connect Error (' . $myBD->connect_errno . ') '. $myBD->connect_error);
}
$sql = "SELECT * FROM books WHERE available = 1 ORDER BY title";
$result = $myBD->query($sql);
?>

<table cellSpacing="2" cellPadding="6" align="center" border="1">
    <tr>
        <td colspan="4">
            <h3 align="center">There Books are currently available</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">ISBN</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc() ) {
        echo "<tr>";
        echo "<td>";
        echo stripslashes($row["title"]);
        echo "</td><td align='center'>";
        echo $row["pub_year"];
        echo "</td><td>";
        echo $row["ISBN"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>