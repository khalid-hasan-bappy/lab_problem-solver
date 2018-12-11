<?php
@session_start();
if (!isset($_SESSION['login'])) {
    header('Location:login.php');
}

include 'adminHeader.php'; ?>
<?php
spl_autoload_register(function ($class) {
    include $class . ".php";
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
                <h2><span>All Problems</span>
                    <span style="float: right">
                        <!-- Search form -->
<form class="form-inline" action=" " method="post">
    <div class="input-group">
    <input class="form-control form-control-sm ml-3 " name="searchdata" id="searchdata" type="text" placeholder="Search"
           aria-label="Search">
</div>
    <button type="submit" name="search" class="btn btn-default">Search</button>
    <div id="searchdata"></div>
</form>

                    </span></h2>
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
                        <th>Action</th>
                    </tr>
                    <?php
                    if (isset($_REQUEST['search'])) {
                        $sdata = $_REQUEST['searchdata'];
                        $lab->searching($sdata);
                        $i = 1;
                        foreach ($lab->searching($sdata) as $lb) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $lb['id'] ?></td>
                                <td><?php echo $lb['room'] ?></td>
                                <td><?php echo $lb['pc'] ?></td>
                                <td><?php echo $lb['hints'] ?></td>
                                <td><?php echo wordwrap($lb['message'], 25, "<br>\n", TRUE) ?></td>
                                <td><?php echo $lb['result'] ?></td>
                                <td>
                                    <a class="btn btn-danger"
                                       onclick="return confirm('Are you sure want to delete this entry?')"
                                       href="labController.php?nssl=<?php echo $lb['no']; ?>">Delete</a>

                                </td>
                            </tr>
                            <?php
                            $i++;
                        }

                    }
                    else{
                        $i = 1;
                        foreach ($lab->readAll() as $lb) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $lb['id'] ?></td>
                                <td><?php echo $lb['room'] ?></td>
                                <td><?php echo $lb['pc'] ?></td>
                                <td><?php echo $lb['hints'] ?></td>
                                <td><?php echo wordwrap($lb['message'], 25, "<br>\n", TRUE) ?></td>
                                <td><?php echo $lb['result'] ?></td>
                                <td>
                                    <a class="btn btn-danger"
                                       onclick="return confirm('Are you sure want to delete this entry?')"
                                       href="labController.php?nssl=<?php echo $lb['no']; ?>">Delete</a>

                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                    } ?>
                </table>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>