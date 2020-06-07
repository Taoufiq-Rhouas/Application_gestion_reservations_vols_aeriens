<?php
// include_once('../database/DB.php');
// include_once('../app/classes/Session.php');
// include_once('../app/classes/Redirect.php');
// include_once('../models/Employe.php');
// 	class EmployesController{
		
// 		public function getAllEmployes(){
// 			// models
// 			$employes = Employe::getAll();
// 			return $employes;
// 		}

// 		public function getOneEmploye(){
// 			// hadi li radi tretunrni rmployr
// 			if (isset($_POST['id'])) {
// 				$data = array(
// 					'id' => $_POST['id']
// 				);
// 				$employe = Employe::getEmploye($data);
// 				return $employe;
// 			}
// 		}

// 		public function addEmploye(){
// 			if(isset($_POST['submit'])){
// 				$data = array(
// 					'nom' => $_POST['nom'],
// 					'prenom' => $_POST['prenom'],
// 					'matricule' => $_POST['mat'],
// 					'depart' => $_POST['depart'],
// 					'poste' => $_POST['poste'],
// 					'date_emb' => $_POST['date_emb'],
// 					'statut' => $_POST['statut'],
// 				);
// 				$result	= Employe::add($data);
// 				if($result === 'ok'){
// 					// header('location:'.BASE_URL);
// 					Session::set('success','Employe Ajoute');
// 					Redirect::to('home');
// 				}else{
// 					echo $result;
// 				}			
// 			}
// 		}
 
// 		public function updateEmploye(){
// 			if(isset($_POST['submit'])){
// 				$data = array(
// 					'id' => $_POST['id'],
// 					'nom' => $_POST['nom'],
// 					'prenom' => $_POST['prenom'],
// 					'matricule' => $_POST['mat'],
// 					'depart' => $_POST['depart'],
// 					'poste' => $_POST['poste'],
// 					'date_emb' => $_POST['date_emb'],
// 					'statut' => $_POST['statut'],
// 				);
// 				$result	= Employe::update($data);
// 				if($result === 'ok'){
// 					// header('location:'.BASE_URL);
// 					Session::set('success','Employe modifie');
// 					Redirect::to('home');
// 				}else{
// 					echo $result;
// 				}			
// 			}
// 		}
// 		public function deleteEmploye(){
// 			if(isset($_POST['id'])){
// 				$data['id'] = $_POST['id'];
// 				$result = Employe::delete($data);
// 				if ($result === 'ok') {
// 					// header('location:'.BASE_URL);
// 					Session::set('success','Employe supprime');
// 					Redirect::to('home');
// 				}else{
// 					echo $result;
// 				}
// 			}
// 		}
		
// 	}

?>