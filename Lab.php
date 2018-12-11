<?php
@session_start();
include 'DB.php';
class Lab{
    private $table = 'lab_problem';
    private $id;
    private $room;
    private $pc;
    private $hints;
    private $message;
    private $progress;
    public function setID($id){
        $this->id=$id;
    }
    public function setRoom($room){
        $this->room=$room;
    }
    public function setPc($pc){
        $this->pc=$pc;
    }
    public function setHints($hints){
        $this->hints=$hints;
    }
    public function setMessage($message){
        $this->message=$message;
    }
    public function setProgress($progress){
        $this->progress = $progress;
    }


    public function insert(){
        $sql = "INSERT INTO $this->table(user_id , id , room , pc , hints , message ) VALUES(:user_id , :id , :room , :pc , :hints , :message )";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':user_id',$_SESSION['id']);
        $stmt->bindParam(':id' , $this->id);
        $stmt->bindParam(':room' , $this->room);
        $stmt->bindParam(':pc' , $this->pc);
        $stmt->bindParam(':hints' , $this->hints);
        $stmt->bindParam(':message' , $this->message);
        return $stmt->execute();
    }
    public function readAll(){
        $sql = "select * from $this->table ORDER BY no DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function readIndividual(){
        $no = $_SESSION['id'];
        $sql = "select * from $this->table WHERE user_id = $no ORDER BY no DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function read304(){
        $sql = "select * from $this->table WHERE room = '304(AB)' ORDER BY no DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function read404(){
        $sql = "select * from $this->table WHERE room = '404(AB)' ORDER BY no DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function read405(){
        $sql = "select * from $this->table WHERE room = '405(AB)' ORDER BY no DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function read605(){
        $sql = "select * from $this->table WHERE room = '605(AB)' ORDER BY no DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public function update($no){
        $sql = "UPDATE $this->table SET result=:result WHERE no=:no";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':result' , $this->progress);
        $stmt->bindParam(':no' , $no);
        return $stmt->execute();
    }


    public function destroy($no)
    {
        $sql="DELETE FROM $this->table WHERE no= :no";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':no',$no);
        return $stmt->execute();

    }
    public function searching($sdata){
        $sql = "select * from $this->table WHERE result LIKE '$sdata' OR room LIKE '$sdata%' OR id LIKE '%$sdata' ";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>