<?php


class Ask
{
    public $textarea;
    public $text;
    public $search;

 public function setData($data = ' '){
     if(array_key_exists('textarea',$data)){
         echo $this->textarea = $data['textarea'];
     }
     if(array_key_exists('text',$data)){

         echo $this->text = $data['text'];
     }
     if(array_key_exists('search',$data)){
         echo $this->search=$data['search'];
     }
 }
 public function save(){
     try {
         $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');

         $sql="INSERT INTO `ask` (`ask_id`, `question`) VALUES (:id, :question)";

         $query ='INSERT INTO someTable VALUES(:name)';
         $stmt=$pdo->prepare($sql);

         $stmt->execute(array(
             ':id'=> null,
              ':question'=>$this->textarea
         )
         );

         if($stmt){

             $_SESSION['message']='Submitted';
//             header('location:create.php');
         }


     } catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
     }
 }

 public function show_ques(){
     try {
         $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');

         $sql="SELECT * FROM `ask`;";
         $query ='INSERT INTO someTable VALUES(:name)';
         $stmt=$pdo->prepare($sql);
         $stmt->execute();
         $array=$stmt->fetchAll();
         return $array;



     } catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
     }

 }


 public function answer(){
     try {
         $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');

         $sql="INSERT INTO `answer` (`ans_id`, `text`) VALUES (:id, :text);";
         $query ='INSERT INTO someTable VALUES(:name)';
         $stmt=$pdo->prepare($sql);
         $stmt->execute(array(
                 ':id'=> null,
                 ':text'=>$this->text
             )
         );
         if($stmt){
             session_start();
             $_SESSION['message']='Submitted';
//             header('location:create.php');
         }


     } catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
     }

 }
// public function all(){
//     try {
//         $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');
//
//         $sql="SELECT * FROM `ask` JOIN `answer` ON ask_id=ans_id;";
//         $query ='INSERT INTO someTable VALUES(:name)';
//         $stmt=$pdo->prepare($sql);
//         $stmt->execute();
//         $array=$stmt->fetch();
//         return $array;
//
//
//
//     } catch(PDOException $e) {
//         echo 'Error: ' . $e->getMessage();
//     }
//
// }
//
    public function ans_all(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');

            $sql="SELECT * FROM `ask` JOIN `answer` WHERE ask_id =ans_id";
            $query ='INSERT INTO someTable VALUES(:name)';
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $array=$stmt->fetch();
            return $array;



        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function search(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=project', 'root', '');

            $sql="SELECT * FROM `ask` JOIN `registration` WHERE ask_id=id";
            $query ='INSERT INTO someTable VALUES(:name)';
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $array=$stmt->fetch();
            return $array;



        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

}