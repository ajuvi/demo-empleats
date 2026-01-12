<?php
require_once "connexio.php";

$search = "";
$min_salary = "";
$max_salary = "";
if (isset($_GET['search'])) $search = $_GET['search'];
if (isset($_GET['min_salary'])) $min_salary = $_GET['min_salary'];
if (isset($_GET['max_salary'])) $max_salary = $_GET['max_salary'];
?>

<style>

body, form , table {
   font-family: Arial, sans-serif; 
    max-width: 800px; 
    width: 100%;
    margin: auto;
 }

form input{
    width: 100%;
    margin-bottom: 10px; 
    padding: 5px;
}
</style>

<form caption="" method="get">        
    <p>Filtre: <input type="text" value="<?php echo $search ?>" name="search"></p>
    <p>Salari mínim: <input type="number" name="min_salary" value="<?php echo $min_salary ?>"><br>
    Salari màxim: <input type="number" name="max_salary" value="<?php echo $max_salary ?>"></p>
    <input type="submit" value="Filtrar">    
</form>

<?php

$sql = "SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL, SALARY, JOB_ID FROM employees";
$conditions = [];

if (!empty($search)) {
    $conditions[] = "(FIRST_NAME LIKE '%$search%' OR LAST_NAME LIKE '%$search%' OR EMPLOYEE_ID LIKE '%$search%')";
}

if (!empty($min_salary)) {
    $conditions[] = "SALARY >= $min_salary";
}

if (!empty($max_salary)) {
    $conditions[] = "SALARY <= $max_salary";
}

if ($conditions) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($sql);

?>

<div class="resultat">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>FIRST_NAME</th>
            <th>LAST_NAME</th>
            <th>EMAIL</th>
            <th>SALARY</th>
            <th>JOB_ID</th>
        </tr>
        <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['EMPLOYEE_ID'] . "</td>";
                echo "<td>" . $row['FIRST_NAME'] . "</td>";
                echo "<td>" . $row['LAST_NAME'] . "</td>";
                echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td>" . $row['SALARY'] . "</td>";
                echo "<td>" . $row['JOB_ID'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>

<?php
mysqli_close($conn);

?>

