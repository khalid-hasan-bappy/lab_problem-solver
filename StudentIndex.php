<?php
@session_start();
if (!isset($_SESSION['login'])) {
    header('Location:login.php');
}

include 'header.php'; ?>
<?php
spl_autoload_register(function($class) {
    include $class.".php";
});

?>
<?php
$lab = new Lab();
?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2><span>All Problems</span><span><a href="create.php" style="float: right" class="btn btn-primary">Insert Problem</a></span></h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Id</th>
                        <th>Room</th>
                        <th>Pc Number</th>
                        <th>Category</th>
                        <th>Message</th>
                        <th>Result</th>
                    </tr>
                    <?php $i=1;
                    foreach ($lab->readIndividual() as $lb) {?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $lb['id']?></td>
                            <td><?php echo $lb['room']?></td>
                            <td><?php echo $lb['pc']?></td>
                            <td><?php echo $lb['hints']?></td>
                            <td><?php echo wordwrap($lb['message'],25,"<br>\n",TRUE)?></td>
                            <td><?php echo $lb['result']?></td>
                        </tr>
                        <?php
                        $i++;
                    }?>
                </table>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>