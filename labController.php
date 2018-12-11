<?php
spl_autoload_register(function ($class) {
    include $class . ".php";
});
?>

<?php
$lab = new Lab();
if (isset($_REQUEST['create'])) {
    $id = $_REQUEST['id'];
    $room = $_REQUEST['room'];
    $pc = $_REQUEST['pc'];
    $hints = $_REQUEST['hints'];
    $message = $_REQUEST['message'];

    $lab->setID($id);
    $lab->setRoom($room);
    $lab->setPc($pc);
    $lab->setHints($hints);
    $lab->setMessage($message);
    $lab->insert();
    header('Location:StudentIndex.php');
}
?>

<?php
if (isset($_REQUEST['update304'])) {
    $progress = $_REQUEST['progress'];
    $no = $_REQUEST['no'];

    $lab->setProgress($progress);
    $lab->update($no);
    header('Location:index304.php');
}
if (isset($_REQUEST['update404'])) {
    $progress = $_REQUEST['progress'];
    $no = $_REQUEST['no'];

    $lab->setProgress($progress);
    $lab->update($no);
    header('Location:index404.php');
}
if (isset($_REQUEST['update405'])) {
    $progress = $_REQUEST['progress'];
    $no = $_REQUEST['no'];

    $lab->setProgress($progress);
    $lab->update($no);
    header('Location:index405.php');
}
if (isset($_REQUEST['update605'])) {
    $progress = $_REQUEST['progress'];
    $no = $_REQUEST['no'];

    $lab->setProgress($progress);
    $lab->update($no);
    header('Location:index605.php');
}

?>

<?php
$lab = new Lab();
if (isset($_REQUEST['nssl'])) {
    $no = $_REQUEST['nssl'];
    $lab->destroy($no);
    header('Location:index.php');
}
?>