<?php
//include_once '../../src/GetUsersInfo.php';

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

         if (GetUsersInfo::findUsersData($_SESSION['user'])){
             $alldata = GetUsersInfo::getUsersData();
             $user_id = $alldata[0]->user_id;
         }


         $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

         $sql="INSERT INTO `ask` (`user_id`,`question`) VALUES (:user_id, :question)";

         $query ='INSERT INTO someTable VALUES(:name)';
         $stmt=$pdo->prepare($sql);

         $stmt->execute(array(
             ':user_id'=> $user_id,
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
         $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

         $sql="SELECT * FROM `ask`";
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
         $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

         $sql="INSERT INTO `ask` (`id`, `user_id`, `question`) VALUES (:id, :uid=>$this->user_id, :text)";
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
            $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

            $sql="SELECT * FROM `answer` JOIN `ask` ON answer.id = ask.id";
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
            $pdo = new PDO('mysql:host=localhost;dbname=project-1', 'root', '');

            $sql="SELECT * FROM `ask` JOIN `users` ON ask.id=users.id LIKE %...%";
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