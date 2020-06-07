<?php
include_once('../database/DB.php');
    class Reservation { 

		function __construct() {
			$this->conn = new mysqli("localhost","root","","db_app_vol_aeriens");
		}

        // sovgard test
        // static public function add($data){
		// 	$stmt = DB::connect()->prepare('INSERT INTO reservations (id_vol,id_passager) VALUES(:id_vol,:id_passager)');
		// 	// bach kanrbet mabin les parametre el les donne dyalhom
		// 	$stmt->bindParam(':id_vol',$data['id_vol']);
		// 	$stmt->bindParam(':id_passager',$data['id_passager']);
		// 	// $stmt->bindParam(':date_de_naissance',$data['date_de_naissance']);
		// 	// $stmt->bindParam(':phone_passager',$data['phone_passager']);
		// 	// $stmt->bindParam(':email_passager',$data['email_passager']);
		// 	// $stmt->bindParam(':cin_passager',$data['cin_passager']);
        //     // $stmt->bindParam(':n_passport_passager',$data['n_passport_passager']);
        //     // $stmt->bindParam(':id_user_created',$data['id_user_created']);
            
		// 	if($stmt->execute()) {
		// 		// hena khedmet lcontroler
		// 		return 'ok';
		// 	}else{
		// 		return 'error';
		// 	}
		// 	$stmt->close();
		// 	$stmt = null;
        // }
        // sovgard test
        static public function add($data){
			$stmt = DB::connect()->prepare('INSERT INTO reservations (id_vol,id_passager) VALUES(:id_vol,:id_passager)');
			// bach kanrbet mabin les parametre el les donne dyalhom
			$stmt->bindParam(':id_vol',$data['id_vol']);
			$stmt->bindParam(':id_passager',$data['id_passager']);
			// $stmt->bindParam(':date_de_naissance',$data['date_de_naissance']);
			// $stmt->bindParam(':phone_passager',$data['phone_passager']);
			// $stmt->bindParam(':email_passager',$data['email_passager']);
			// $stmt->bindParam(':cin_passager',$data['cin_passager']);
            // $stmt->bindParam(':n_passport_passager',$data['n_passport_passager']);
            // $stmt->bindParam(':id_user_created',$data['id_user_created']);
            
			if($stmt->execute()) {
				
				// -----------


				// $stmt2 = DB::connect()->prepare('UPDATE `vols` SET nb_place_rest = nb_place_rest - 1 WHERE id_vol=:id_vol LIMIT 1');
				// // bach kanrbet mabin les parametre el les donne dyalhom
				// $stmt2->bindParam(':id_vol',$data['id_vol']);
				// $stmt2->execute();
				// // $stmt2->close();
				// $stmt2 = null;
				// $stmt->bindParam(':id_passager',$data['id_passager']);


				// $exitVolForUpdat = new VolsController();
				// $exitVolForUpdat->nombreVolMoins1();
				

				$exitVolForUpdat = new Vol();
				$exitVolForUpdat->volMoins12($_SESSION['id_voll']);
				


				// -----------
				// hena khedmet lcontroler
				return 'ok';
			}else{
				return 'error';
			}
			$stmt->close();
			$stmt = null;
		}


		function reservation_show_id($id) {

			// $query = "SELECT * from reservations where id_reservation='$id'";
			// $stmt = $this->conn->prepare($query);
			// $stmt->execute();
			// $result = $stmt->get_result();
			// return  $result;

			// $stmt = DB::connect()->prepare("SELECT * from reservations where id_reservation='$id'");
			// $stmt ->execute();
			// // fetchAll() bach nrecupere colchi
			// return $stmt->fetchAll();
			// $stmt->close();
			// $stmt = null;


			// $stmt = DB::connect()->prepare("SELECT * from reservations where id_reservation='$id'");
			// $stmt ->execute();
			// // fetchAll() bach nrecupere colchi
			// $result = $stmt->fetchAll();
			// $result = $stmt->fetch(PDO::FETCH_OBJ);
			// return  $result;


			


			// $stmt = DB::connect()->prepare("SELECT * from reservations where id_reservation='$id'");
			// $stmt ->execute();
			// // fetchAll() bach nrecupere colchi
			// return $stmt->fetch(PDO::FETCH_ASSOC);
			// $stmt->close();
			// $stmt = null;


			// $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// if(!$arr) exit('No rows');
			// var_export($arr);






			// $query = "SELECT * from reservations where id_reservation='$id'";
			// $stmt = DB::connect()->prepare($query);
			// $stmt->execute();
			// // $result = $stmt->get_result();
			// $result = $stmt->fetchAll();
			// return  $result;





			// static public function getEmploye($data){
			// 	$id = $data['id'];
			// 	try{
			// 		$query = 'SELECT * FROM employes WHERE id=:id';
			// 		$stmt = DB::connect()->prepare($query);
			// 		$stmt->execute(array(":id" => $id));
			// 		$employe = $stmt->fetch(PDO::FETCH_OBJ);
			// 		return $employe;
			// 	}catch(PDOException $ex){
			// 		echo 'erreur'.$ex->getMessage();
			// 	}
			// }

			$query = "SELECT * from reservations where id_reservation='$id'";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}



		function reservation_join() {
			// SELECT r.* FROM reservations r,passager p,user u  WHERE r.id_passager = p.id_passager AND p.id_user_created = u.id AND u.id = 9
			// $query = "SELECT r.* FROM reservations r,passager p,user u  WHERE r.id_passager = p.id_passager AND p.id_user_created = u.id";
			// $stmt = $this->conn->prepare($query);
			// $stmt->execute();
			// $result = $stmt->get_result();
			// return  $result;




			// $stmt = DB::connect()->prepare('SELECT r.* FROM reservations r,passager p,user u  WHERE r.id_passager = p.id_passager AND p.id_user_created = u.id');
			// $stmt ->execute();
			// // fetchAll() bach nrecupere colchi
			// return $stmt->fetchAll();
			// $stmt->close();
			// $stmt = null;
			$idUser = $_SESSION['idUser'];

			// $query = "SELECT r.*,p.cin_passager FROM reservations r,passager p,user u  WHERE r.id_passager = p.id_passager AND p.id_user_created = u.id AND u.id ='$idUser' ";
			$query = "SELECT r.*,p.cin_passager FROM reservations r,passager p,user u  WHERE r.id_passager = p.id_passager AND p.id_user_created = u.id AND u.id ='$idUser' ORDER BY r.date_reservation DESC";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			return  $result;
				
		}
		


    }
?>