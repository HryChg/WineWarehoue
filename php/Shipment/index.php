<?php
require_once '../../connect.php';
$conn = OpenCon();
?>


<section>

    <div class="ui grid centered">
        <div class="fifteen wide column">
            <?php include 'view_table.php'; ?>
        </div>
        <div class="five wide column">
            <?php include 'add.php'; ?>
        </div>
        <div class="five wide column">
            <?php include 'update.php'; ?>
        </div>
        <div class="five wide column">
            <?php include 'delete.php'; ?>
        </div>
    </div>
</section>

<?php
CloseCon($conn);
?>