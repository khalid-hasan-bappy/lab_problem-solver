<?php

include_once('DB.php');

class action extends dbConnection
{


    public function store($id, $room, $hints, $message, $image)
    {
        $sql = "INSERT INTO lab_problem (id,room,hints,message,image) VALUES ('{$id}','{$room}','{$hints}','{$message}','{$image}')";
        if ($this->conn->query($sql)) {
            echo " <script>alert('new record created successfully');
                   window.location.href=('index.php');
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        //  header('Location:index.php');
    }
    public function index()
    {
        $sql="SELECT * FROM lab_problem ORDER BY no DESC";
        $qResult=$this->conn->query($sql);
        return $qResult;

    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}

?>