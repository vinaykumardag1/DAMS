<?php
include('doctor/includes/dbconnection.php');
if (!empty($_POST["sp_id"])) {
    $spid = $_POST["sp_id"];
    $sql = $dbh->prepare("SELECT * FROM tbldoctor WHERE Specialization = :spid");
    $sql->execute(array(':spid' => $spid));

    // Check if there are any rows returned
    if ($sql->rowCount() > 0) {
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row["ID"]; ?>"><?php echo $row["FullName"]; ?></option>
            <?php
        }
    } else {
        // No doctors found for the selected specialization
        ?>
        <option value="">No doctors available</option>
        <?php
    }
}
?>
