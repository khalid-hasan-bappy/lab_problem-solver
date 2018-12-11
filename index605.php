<?php
@session_start();
if (!isset($_SESSION['login'])){
    header('Location:login.php');
}
?>

<?php
include 'header605.php'; ?>
<?php
spl_autoload_register(function($class) {
    include $class.".php";
});

?>
<?php
$lab = new Lab();
?>
    <div class="container">
        <h1 style="text-align: center;color: black">
            <?php
            echo $_SESSION['username'];
            ?>
        </h1>
        <div class="card mt-5">
            <div class="card-header">
                <h2><span>All Problems</span></h2>
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
                        <th>Progress</th>
                    </tr>
                    <?php $i=1;
                    foreach ($lab->read605() as $lb) {?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $lb['id']?></td>
                            <td><?php echo $lb['room']?></td>
                            <td><?php echo $lb['pc']?></td>
                            <td><?php echo $lb['hints']?></td>
                            <td><?php echo wordwrap($lb['message'],25,"<br>\n",TRUE)?></td>
                            <td><?php echo $lb['result']?></td>
                            <td>
                                <form action="labController.php" method="post">
                                    <div class="form-group">
                                        <label for="progress">current situation:</label>
                                        <select class="form-control" id="progress" name="progress" style="width: 100%">
                                            <option value="" selected>Current Situation</option>
                                            <option value="unsolved" >Unsolved</option>
                                            <option value="solved" >Solved</option>
                                            <option value="working" >Working</option>
                                        </select>
                                        <input type="hidden" name="no" value="<?php echo $lb['no']?>">
                                        <button type="submit" class="btn-secondary" name="update605" style="float: right">Submit</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }?>
                </table>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>