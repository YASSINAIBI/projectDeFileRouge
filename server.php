<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
<?php
include_once 'db.php';
$db_handle = new DBController();
?>

<?php

session_start();

$errors = array();
$username = "";
$email = "";
$phone = "";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {

		// Posted Values
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		$phone = $_POST['user_phone'];
		$img = "img/default_user.png";

		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		$sql_user = $db_handle->check_is_valable_username($username);
		$num_user = mysqli_num_rows($sql_user);
		if($num_user > 0){
			array_push($errors, "this user is already existe");
		}

		$sql_email = $db_handle->check_is_valable_email($email);
		$num_email = mysqli_num_rows($sql_email);
		if($num_email > 0){
			array_push($errors, "this email is already existe");
		}

		if(count($errors) == 0){
			//Function Calling
			$password = md5($password_1);
			$sql=$db_handle->registration($username, $email, $password, $phone, $img);
			if($sql)
			{
			// Message for successfull insertion
			// echo "<script>alert('Registration successfull.');</script>";
				$username = "";
				$email = "";
				$phone = "";
				echo "<html>
				<body>
					<meta http-equiv='REFRESH'>
					<script>
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'you are regester succesfully at agadir mall',
						showConfirmButton: false,
						timer: 3000
					  })
					</script>
				</body>
				</html>";
			}
		}
	}

	// ...

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = $_POST['username'];
		$password_1 = $_POST['password'];

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password_1);
			$sql = $db_handle->loggin($username, $password);

			$num = mysqli_num_rows($sql);
			if($num > 0){
				$_SESSION['user'] = $username;
				header('location: index.php');

				$query = $db_handle->runQuery("SELECT * FROM users WHERE username='$username' AND password='$password'");
				if (!empty($query)) {
				  foreach ($query as $key => $value) {
					$_SESSION['id'] = $query[$key]["id"];
					$_SESSION['email'] = $query[$key]["email"];
					$_SESSION['phone'] = $query[$key]["user_phone"];
					$_SESSION['avatar'] = $query[$key]["avatar"];
					}
				}
			else{
				echo "<html>
				<body>
					<meta http-equiv='REFRESH'>
					<script>
					Swal.fire({
						position: 'top-end',
						icon: 'error',
						title: 'invalid name or password',
						showConfirmButton: false,
						timer: 3000
					  })
					</script>
				</body>
				</html>";
			}
			}
		}
	}

	// add to card
	if(isset($_GET['add_to_card'])){

		$product_id = $_GET['add_to_card'];
		$user_id = $_SESSION['id'];

		$sql = $db_handle->check_is_in_card($product_id);
		$num_in_card = mysqli_num_rows($sql);
		if($num_in_card > 0){
				echo "<html>
				<body>
					<meta http-equiv='REFRESH'>
					<script>
					Swal.fire({
						position: 'top-end',
						icon: 'error',
						title: 'this product is already exist in your card',
						showConfirmButton: false,
						timer: 3000
					  })
					</script>
				</body>
				</html>";
		}
		else{
			$sql = $db_handle->add_to($product_id, $user_id);
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'product added to your card',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}

	// delete from card
	if(isset($_GET['deleteFromCard'])){
		$deleteFromCart = $_GET['deleteFromCard'];

		$sql = $db_handle->delete_from_card($deleteFromCart);
	}

	// commentaire
	if(isset($_POST['leave_your_comment'])){
		$atproduct = $_GET['id'];
		$fromuser = $_SESSION['id'];
		$commentaire = filter_var($_POST['comment_text'], FILTER_SANITIZE_STRING);
		$username = $_SESSION['user'];
		$avatar = $_SESSION['avatar'];

		$sql = $db_handle->add_commentaire($atproduct, $fromuser, $commentaire, $username, $avatar);
	}

	// change user name
	if(isset($_POST['change_username'])){
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$userid = $_SESSION['id'];

		$sql = $db_handle->check_is_valable_username($username, $userid);

		$numb_of_this_name = mysqli_num_rows($sql);

		if($numb_of_this_name > 0){
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top',
					icon: 'error',
					title: 'this username are already existing',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
		else{
			$sql = $db_handle->changeusername($username, $userid);

			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top',
					icon: 'success',
					title: 'your user name are changed',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}

	// change password
	if(isset($_POST['changepassword'])){
		$Mypassword = filter_var($_POST['mypassword'], FILTER_SANITIZE_STRING);
		$userid = $_SESSION['id'];

		$password = md5($Mypassword);

		$sql = $db_handle->changepassword($password, $userid);

		if($sql){
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top',
					icon: 'success',
					title: 'your password are changed',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}

	// change phone number
	if(isset($_POST['change_phone_number'])){
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$userid = $_SESSION['id'];

		$sql = $db_handle->changephone($phone, $userid);

		if($sql){
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top',
					icon: 'success',
					title: 'your phone number are changed',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}

	// set image profile
	if(isset($_POST['set_your_img'])){

		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);

		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$img_name = $_FILES["avatar"]["name"];

		$img_size = $_FILES["avatar"]["size"];

		$userid = $_SESSION['id'];

		$alowed_img = array("jpg","jpeg","png","gif");

		if(in_array($imageFileType, $alowed_img)){
			if($img_size > 100000){
				$sql = $db_handle->setprofileimg($target_file, $userid);
				// $sql2 = $db_handle->add_img_at_tbl_commentaire($target_file, $userid);
				move_uploaded_file($_FILES['avatar']['tmp_name'],$target_dir.$img_name);

				echo "<html>
				<body>
					<meta http-equiv='REFRESH'>
					<script>
					Swal.fire({
						position: 'top',
						icon: 'success',
						title: 'your avatar is changed',
						showConfirmButton: false,
						timer: 3000
					  })
					</script>
				</body>
				</html>";
			}
			else{
				echo "<html>
				<body>
					<meta http-equiv='REFRESH'>
					<script>
					Swal.fire({
						position: 'top',
						icon: 'error',
						title: 'img size is too large',
						showConfirmButton: false,
						timer: 3000
					  })
					</script>
				</body>
				</html>";
			}
		}
		else{
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top',
					icon: 'error',
					title: 'this is not alowed file',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}

	if(isset($_POST['delete_user'])){
		$user_id = $_POST['fromuser'];
		$sql = $db_handle->delete_user($user_id);
	}

	if (isset($_POST['edite_user'])) {

		// Posted Values
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		$phone = $_POST['phone'];
		$img = "img/default_user.png";
		$user_id = $_GET['editeforuser'];

		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		$sql_user = $db_handle->check_is_valable_username($username);
		$num_user = mysqli_num_rows($sql_user);
		if($num_user > 0){
			array_push($errors, "this user is already existe");
		}

		$sql_email = $db_handle->check_is_valable_email($email);
		$num_email = mysqli_num_rows($sql_email);
		if($num_email > 0){
			array_push($errors, "this email is already existe");
		}

		if(count($errors) == 0){
			//Function Calling
			$password = md5($password_1);
			$sql=$db_handle->edite_user($username, $email, $password, $phone, $user_id);
			if($sql)
			{
			// Message for successfull insertion
			// echo "<script>alert('Registration successfull.');</script>";
				$username = "";
				$email = "";
				$phone = "";
				echo "<html>
				<body>
					<meta http-equiv='REFRESH'>
					<script>
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: 'you are regester succesfully at agadir mall',
						showConfirmButton: false,
						timer: 3000
					  })
					</script>
				</body>
				</html>";
			}
		}
	}

	if(isset($_POST['delete_commentaire'])){

		$comment_for = $_POST['comentfromuser'];

		$sql = $db_handle->delete_commentaire($comment_for);

		echo "<html>
		<body>
			<meta http-equiv='REFRESH'>
			<script>
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'commentaire deleted',
				showConfirmButton: false,
				timer: 3000
			  })
			</script>
		</body>
		</html>";
	}


	if(isset($_POST['edite_product'])){
		$selected_product = $_GET['editeforproduct'];

		$product_name = $_POST['product_name'];

		$product_price = $_POST['product_price'];

		$product_categorie = $_POST['category'];

		$product_description = $_POST['product_description'];

		$promotion = $_POST['promotion'];


		// Select file
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["product_image"]["name"]);

		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$img_name = $_FILES["product_image"]["name"];

		$img_size = $_FILES["product_image"]["size"];

		$alowed_img = array("jpg","jpeg","png","gif");

		if(in_array($imageFileType, $alowed_img)){
			move_uploaded_file($_FILES['product_image']['tmp_name'],$target_dir.$img_name);
		}

		// Select file1
		$target_dir_1 = "img/";
		$target_file_1 = $target_dir_1 . basename($_FILES["related_img_1"]["name"]);

		// Select file type
		$imageFileType_1 = strtolower(pathinfo($target_file_1,PATHINFO_EXTENSION));

		$img_name_1 = $_FILES["related_img_1"]["name"];

		$img_size_1 = $_FILES["related_img_1"]["size"];

		if(in_array($imageFileType_1, $alowed_img)){
			move_uploaded_file($_FILES['related_img_1']['tmp_name'],$target_dir_1.$img_name_1);
		}


		// Select file2
		$target_dir_2 = "img/";
		$target_file_2 = $target_dir_2 . basename($_FILES["related_img_2"]["name"]);

		// Select file type
		$imageFileType_2 = strtolower(pathinfo($target_file_2,PATHINFO_EXTENSION));

		$img_name_2 = $_FILES["related_img_2"]["name"];

		$img_size_2 = $_FILES["related_img_2"]["size"];

		if(in_array($imageFileType_2, $alowed_img)){
			move_uploaded_file($_FILES['related_img_2']['tmp_name'],$target_dir_2.$img_name_2);
		}


		// Select file3
		$target_dir_3 = "img/";
		$target_file_3 = $target_dir_3 . basename($_FILES["related_img_3"]["name"]);

		// Select file type
		$imageFileType_3 = strtolower(pathinfo($target_file_3,PATHINFO_EXTENSION));

		$img_name_3 = $_FILES["related_img_3"]["name"];

		$img_size_3 = $_FILES["related_img_3"]["size"];

		if(in_array($imageFileType_3, $alowed_img)){
			move_uploaded_file($_FILES['related_img_3']['tmp_name'],$target_dir_3.$img_name_3);
		}


		// Select file4
		$target_dir_4 = "img/";
		$target_file_4 = $target_dir_4 . basename($_FILES["related_img_4"]["name"]);

		// Select file type
		$imageFileType_4 = strtolower(pathinfo($target_file_4,PATHINFO_EXTENSION));

		$img_name_4 = $_FILES["related_img_4"]["name"];

		$img_size_4 = $_FILES["related_img_4"]["size"];

		if(in_array($imageFileType_4, $alowed_img)){
			move_uploaded_file($_FILES['related_img_4']['tmp_name'],$target_dir_4.$img_name_4);
		}

		$sql = $db_handle->edite_product($product_name, $product_price, $product_categorie, $product_description, $promotion, $selected_product, $target_file, $target_file_1, $target_file_2, $target_file_3, $target_file_4 );

		if($sql){
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'prodect edited',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}


	if(isset($_POST['add_product'])){
		$product_name = $_POST['product_name'];

		$product_price = $_POST['product_price'];

		$product_categorie = $_POST['category'];

		$product_description = $_POST['product_description'];

		$promotion = $_POST['promotion'];

		$rating = $_POST['add_product'];

		// Select file
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["product_image"]["name"]);

		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$img_name = $_FILES["product_image"]["name"];

		$img_size = $_FILES["product_image"]["size"];

		$alowed_img = array("jpg","jpeg","png","gif");

		if(in_array($imageFileType, $alowed_img)){
			move_uploaded_file($_FILES['product_image']['tmp_name'],$target_dir.$img_name);
		}

		// Select file1
		$target_dir_1 = "img/";
		$target_file_1 = $target_dir_1 . basename($_FILES["related_img_1"]["name"]);

		// Select file type
		$imageFileType_1 = strtolower(pathinfo($target_file_1,PATHINFO_EXTENSION));

		$img_name_1 = $_FILES["related_img_1"]["name"];

		$img_size_1 = $_FILES["related_img_1"]["size"];

		if(in_array($imageFileType_1, $alowed_img)){
			move_uploaded_file($_FILES['related_img_1']['tmp_name'],$target_dir_1.$img_name_1);
		}


		// Select file2
		$target_dir_2 = "img/";
		$target_file_2 = $target_dir_2 . basename($_FILES["related_img_2"]["name"]);

		// Select file type
		$imageFileType_2 = strtolower(pathinfo($target_file_2,PATHINFO_EXTENSION));

		$img_name_2 = $_FILES["related_img_2"]["name"];

		$img_size_2 = $_FILES["related_img_2"]["size"];

		if(in_array($imageFileType_2, $alowed_img)){
			move_uploaded_file($_FILES['related_img_2']['tmp_name'],$target_dir_2.$img_name_2);
		}


		// Select file3
		$target_dir_3 = "img/";
		$target_file_3 = $target_dir_3 . basename($_FILES["related_img_3"]["name"]);

		// Select file type
		$imageFileType_3 = strtolower(pathinfo($target_file_3,PATHINFO_EXTENSION));

		$img_name_3 = $_FILES["related_img_3"]["name"];

		$img_size_3 = $_FILES["related_img_3"]["size"];

		if(in_array($imageFileType_3, $alowed_img)){
			move_uploaded_file($_FILES['related_img_3']['tmp_name'],$target_dir_3.$img_name_3);
		}


		// Select file4
		$target_dir_4 = "img/";
		$target_file_4 = $target_dir_4 . basename($_FILES["related_img_4"]["name"]);

		// Select file type
		$imageFileType_4 = strtolower(pathinfo($target_file_4,PATHINFO_EXTENSION));

		$img_name_4 = $_FILES["related_img_4"]["name"];

		$img_size_4 = $_FILES["related_img_4"]["size"];

		if(in_array($imageFileType_4, $alowed_img)){
			move_uploaded_file($_FILES['related_img_4']['tmp_name'],$target_dir_4.$img_name_4);
		}

		$sql = $db_handle->add_product($product_name, $product_price, $product_categorie, $product_description, $promotion, $rating, $target_file, $target_file_1, $target_file_2, $target_file_3, $target_file_4 );

		if($sql){
			echo "<html>
			<body>
				<meta http-equiv='REFRESH'>
				<script>
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'prodect edited',
					showConfirmButton: false,
					timer: 3000
				  })
				</script>
			</body>
			</html>";
		}
	}