<?php
include_once('../database/DB.php');
include_once('../app/classes/Session.php');
include_once('../app/classes/Redirect.php');
include_once('../models/Vol.php');
	if(!isset($_SESSION)){
        session_start();
    }

	$id_admin_created = $_SESSION['idUser'];

	class VolsController{
		
		// public function getAllEmployes(){
		// 	// models
		// 	$employes = Employe::getAll();
		// 	return $employes;
        // }
        

        public function getVolsquery($query){
			// models
			$vols = Vol::getquery($query);
			return $vols;
		}


		public function getAllVolActive(){
			// models
			$vols = Vol::getAllActive();
			return $vols;
		}

		public function getOneVol(){
			// hadi li radi tretunrni rmployr
			if (isset($_POST['id'])) {
				$data = array(
					'id' => $_POST['id']
				);
				$vol = Vol::getOnVol($data);
				return $vol;
			}
		}

		// public function addEmploye(){
		// 	if(isset($_POST['submit'])){
		// 		$data = array(
		// 			'nom' => $_POST['nom'],
		// 			'prenom' => $_POST['prenom'],
		// 			'matricule' => $_POST['mat'],
		// 			'depart' => $_POST['depart'],
		// 			'poste' => $_POST['poste'],
		// 			'date_emb' => $_POST['date_emb'],
		// 			'statut' => $_POST['statut'],
		// 		);
		// 		$result	= Employe::add($data);
		// 		if($result === 'ok'){
		// 			// header('location:'.BASE_URL);
		// 			Session::set('success','Employe Ajoute');
		// 			Redirect::to('home');
		// 		}else{
		// 			echo $result;
		// 		}			
		// 	}
		// }


		public function addVol(){
			if(isset($_POST['submit'])){
				$data = array(
					'nam' => $_POST['nam'],
					'price' => $_POST['price'],
					'image' => $_POST['image'],
					// 'date_created' => $_POST['date_created'],
					'pays_depart' => $_POST['pays_depart'],
					'pays_arrive' => $_POST['pays_arrive'],
					'date_vol' => $_POST['date_vol'],
					'hour_vol' => $_POST['hour_vol'],
					'minute_vol' => $_POST['minute_vol'],
					'nb_place_initial' => $_POST['nb_place_initial'],
					'nb_place_rest' => $_POST['nb_place_initial'],
					'statu_vol' => 'active',
					'id_admin_created' => '2',
				);
				$result	= Vol::add($data);
				if($result === 'ok'){
					// header('location:'.BASE_URL);
					Session::set('success','Vol Ajoute');
					Redirect::to('admin');
				}else{
					echo $result;
				}			
			}
		}

 
		public function updateVol(){
			if(isset($_POST['submit'])){
				$data = array(
					'id_vol' => $_POST['id_vol'],
					'nam' => $_POST['nam'],
					'pays_depart' => $_POST['pays_depart'],
					'pays_arrive' => $_POST['pays_arrive'],
					'date_vol' => $_POST['date_vol'],
					'hour_vol' => $_POST['hour_vol'],
					'minute_vol' => $_POST['minute_vol'],
                    'nb_place_initial' => $_POST['nb_place_initial'],
                    'price' => $_POST['price'],
					'image' => $_POST['image'],
				);
				$result	= Vol::update($data);
				if($result === 'ok'){
					// header('location:'.BASE_URL);
					Session::set('success','Vol modifie');
					Redirect::to('gestion_vol');
				}else{
					echo $result;
				}			
			}
		}
		// public function deleteEmploye(){
		// 	if(isset($_POST['id'])){
		// 		$data['id'] = $_POST['id'];
		// 		$result = Employe::delete($data);
		// 		if ($result === 'ok') {
		// 			// header('location:'.BASE_URL);
		// 			Session::set('success','Employe supprime');
		// 			Redirect::to('home');
		// 		}else{
		// 			echo $result;
		// 		}
		// 	}
		// }

		// public function deleteEmploye(){
		// 	if(isset($_POST['id'])){
		// 		$data['id'] = $_POST['id'];
		// 		$result = Employe::delete($data);
		// 		if ($result === 'ok') {
		// 			// header('location:'.BASE_URL);
		// 			Session::set('success','Employe supprime');
		// 			Redirect::to('home');
		// 		}else{
		// 			echo $result;
		// 		}
		// 	}
		// }


		// public function getOneEmploye(){
		// 	// hadi li radi tretunrni rmployr
		// 	if (isset($_POST['id'])) {
		// 		$data = array(
		// 			'id' => $_POST['id']
		// 		);
		// 		$employe = Employe::getEmploye($data);
		// 		return $employe;
		// 	}
		// }


		public function getVolRecherch(){
			// hadi li radi tretunrni rmployr   
			// if (isset($_POST['vilDepart'],$_POST['vilArive'])) {
			// 	$data = array(
			// 		'vilDepart' => $_POST['vilDepart'],
			// 		'vilArive' => $_POST['vilArive'],
			// 	);
			// 	$vol = Vol::getVol($data);
			// 	return $vol;
			// }
			$_SESSION['searchkey'] = $_POST['vilDepart'];
            $_SESSION['searchkey1'] = $_POST['vilArive'];
			$vols = Vol::getVol();
			return $vols;
		}

		public function annulerVol(){
			if(isset($_POST['id_vol'])){
				$data['id_vol'] = $_POST['id_vol'];
				$result = Vol::annuler($data);
				if ($result === 'ok') {
					// header('location:'.BASE_URL);
					Session::set('info','Vol annuler');
					Redirect::to('gestion_vol');
				}else{
					echo $result;
				}
			}
		}

		public function activeVol(){
			if(isset($_POST['id_vol'])){
				$data['id_vol'] = $_POST['id_vol'];
				$result = Vol::active($data);
				if ($result === 'ok') {
					// header('location:'.BASE_URL);
					Session::set('success','Vol activer');
					Redirect::to('gestion_vol');
				}else{
					echo $result;
				}
			}
		}

		// public function nombreVolMoins1(){
		// 	$data2 = array(
		// 		// 'id_passager' => $_SESSION['id_passagerexist'] ,
		// 		'id_vol' => $_SESSION['id_voll'],
		// 	);
		// 	$result	= Vol::volMoins1($data2);



		// 	// if(isset($_POST['id_vol'])){
		// 	// 	$data['id_vol'] = $_POST['id_vol'];
		// 	// 	$result = Vol::updateVolMoins1($data);
		// 	// 	if ($result === 'ok') {
		// 	// 		// header('location:'.BASE_URL);
		// 	// 		Session::set('success','Employe supprime');
		// 	// 		Redirect::to('home');
		// 	// 	}else{
		// 	// 		echo $result;
		// 	// 	}
		// 	// }
		// }

		// function vol_show_id($id) {

		// 	// $query = "SELECT * from vols where id_vol='$id'";
		// 	// $stmt = $this->conn->prepare($query);
		// 	// $stmt->execute();
		// 	// $result = $stmt->get_result();
		// 	// return  $result;



		// 	$stmt = DB::connect()->prepare("SELECT * from vols where id_vol='$id'");
		// 	$stmt ->execute();
		// 	// fetchAll() bach nrecupere colchi
		// 	return $stmt->fetchAll();
		// 	$stmt->close();
		// 	$stmt = null;
				
		// }

		public function getAllVolsActiveForAdmin(){
			// models
			$volsActive = Vol::getAllActiveForAdmin();
			return $volsActive;
		}
		public function getAllVolsDisabledAndNotExpiredForAdmin(){
			// models
			$vols = Vol::getAllDisabledAndNotExpiredForAdmin();
			return $vols;
		}
		public function getAllVols(){
			// models
			$Allvols = Vol::getAllVolsForAdmin();
			return $Allvols;
		}
		// public function getAllVolsActiveForAdmin(){
		// 	// models
		// 	$vols = Vol::getAllActiveForAdmin();
		// 	return $vols;
		// }
		
	}

?>