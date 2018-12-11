<?php
@session_start();
if (!isset($_SESSION['login'])){
    header('Location:login.php');
}
require_once 'header.php';
?>
<div class="container">
    <h1 style="text-align: center;color: white">
        Lab Problem
    </h1>
    <h1 style="text-align: center;color: black">
        <?php
        echo $_SESSION['username'];
        ?>
    </h1>
    <div class="form-container" style=" width: 80%; border: 9px solid #f2f2f2; padding: 2% 5% 5% 5%;background: #ffffff; margin: auto">
        <form action="labController.php" method="post" id="reused_form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">Your ID:</label>
                <input type="text" class="form-control" id="id"  name="id" required >
            </div>
            <div class="form-group">
                <label for="room">Lab Room Number:</label>
                <select class="form-control" id="room" name="room" style="width: 100%">
                    <option value="" selected>SELECT ROOM NUMBER</option>
                    <option value="304(AB)">304(AB)</option>
                    <option value="404(AB)">404(AB)</option>
                    <option value="405(AB)">405(AB)</option>
                    <option value="605(AB)">605(AB)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pc">Pc Number:</label>
                <input type="number" class="form-control" id="pc"  name="pc" required >
            </div>
            <div class="form-group">
            <label for="hints">Some hints of problem:(optional)</label>
            <select class="form-control" id="hints" name="hints" style="width: 100%">
                <option>SELECT YOUR PROBLEM:</option>
                <option value="Monitor">Monitor</option>
                <option value="Cpu">Cpu</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Mouse">Mouse</option>
                <option value="Cable">Cable</option>
                <option value="OS">OS</option>
            </select>
            </div>
            <div class="form-group">
            <label for="message">Problem Description:</label>
            <textarea type="text" class="form-control" id="message" name="message" rows="6" maxlength="3000" required></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="image">Send Image:</label>
                <input type="file" name="picture" class="form-control-file" id="image" >
            </div> -->
            <button style="width: 100%" class="btn-success" name = "create" type="submit">Post</button>
        </form>
    </div>
</div>
<?php require_once 'footer.php'?>