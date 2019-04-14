<?php 
	class Users{

		public function userRegister($data){

			$c=new Connect();
			$connection=$c->connection();

			$sql = "INSERT INTO users (id_parent,
								user_fullname,
								user_email,
								user_name,
								user_role,
								user_password,								
								created_date)
						VALUES ('$data[0]',
								'$data[1]',
								'$data[2]',
								'$data[3]',
								'$data[4]',
								'$data[5]',
								NOW())";
								
			return mysqli_query($connection,$sql);
		}

		public function loginUser($inform){

			$c=new Connect();
			$connection=$c->connection();

			$_SESSION['user_name']=$inform[0];
			$_SESSION['idUser']=self::bringID($inform);

			$sql="SELECT * FROM users WHERE user_name='$inform[0]'
				AND user_password='$inform[1]'";

			$result=mysqli_query($connection,$sql);
			

			$row=mysqli_fetch_row($result);
			$_SESSION['role']=$row[5];

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}


		public function bringID($inform){

			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT id_user FROM users WHERE user_name = '$inform[0]'
					AND user_password = '$inform[1]'"; 

			$result=mysqli_query($connection,$sql);

			return mysqli_fetch_row($result)[0];
		}



		public function getUserData($idUser){

			$c=new Connect();
			$connection=$c->connection();

			$sql="SELECT id_user,
							id_parent,
							user_fullname,
							user_email,
							user_name,
							user_role,
							created_date,
							updated_date
					FROM users 
					WHERE id_user='$idUser'";
					
			$result=mysqli_query($connection,$sql);
			
			$row=mysqli_fetch_row($result);
			
			$userArray=array(
						'id_user' => $row[0],
							'user_created' => $row[1],
							'name' => $row[2],
							'email' => $row[3],
							'username' => $row[4],
							'role' => $row[5],
							'created_date' => $row[6]
						);
			return $userArray;
		}

		public function updateUser($data){
			
			$c = new Connect();
			$connection = $c->connection();
			
			$sql = "UPDATE users SET  id_parent = '$data[1]',
									user_fullname = '$data[2]',
									user_email = '$data[3]',
									user_name = '$data[4]',
									user_role = '$data[5]',
									updated_date = NOW()
						WHERE id_user = '$data[0]'";

			return mysqli_query($connection, $sql);	
		}

		public function updateUserPassword($data){
			
			$c = new Connect();
			$connection = $c->connection();
			
			$sql = "UPDATE users SET  id_parent = '$data[1]',
									user_password = '$data[2]',
									updated_date = NOW()
						WHERE id_user = '$data[0]'";

			return mysqli_query($connection, $sql);	
		}

		public function deleteUser($idUser){
			
			$c = new Connect();
			$connection = $c->connection();
			
			$sql = "DELETE FROM users 
					WHERE id_user = '$idUser'";
			return mysqli_query($connection,$sql);
		}

		public function checkPassword($data){
			
			$c = new Connect();
			$connection = $c->connection();

			$password = $data[1];

			$sql = "SELECT * FROM users 
				WHERE id_user = '$data[0]'";

			$result=mysqli_query($connection,$sql);

			$row = mysqli_fetch_row($result);

			if($password == $row[6]){
				return 1;
			}
			else{
				return 0;
			}
	}
	}
 ?>
