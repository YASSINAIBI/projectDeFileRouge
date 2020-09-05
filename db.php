<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "project_file_rouge";
	private $conn;

        function __construct() {
        $this->conn = $this->connectDB();
	}	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
    function runQuery($query) {
                $result = mysqli_query($this->conn,$query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }		
                if(!empty($resultset))
                return $resultset;
	}

	// Function for registration
	public function registration($username,$email,$password_1,$phone, $img)
	{
	$registre_query = mysqli_query($this->conn,"insert into users(username, email, password, user_phone, avatar, date) values('$username','$email','$password_1','$phone','$img', NOW() )");
	return $registre_query;
	}

	public function loggin($username, $password)
	{
	$loggin_query = mysqli_query($this->conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
	return $loggin_query;
	}

	public function check_is_valable_username($username)
	{
	$check_user_query = mysqli_query($this->conn,"SELECT * FROM users WHERE username='$username'");
	return $check_user_query;
	}

	public function check_is_valable_email($email)
	{
	$check_user_query = mysqli_query($this->conn,"SELECT * FROM users WHERE email='$email'");
	return $check_user_query;
	}

	public function check_is_in_card($product_id)
	{
	$check_is_in_card_query = mysqli_query($this->conn,"SELECT * FROM my_card WHERE product='$product_id'");
	return $check_is_in_card_query;
	}

	public function add_to($product_id, $user_id)
	{
	$add_to_card_query = mysqli_query($this->conn,"insert into my_card(product, product_for) values('$product_id','$user_id')");
	return $add_to_card_query;
	}

	public function delete_from_card($deleteFromCart)
	{
	$deleteFromCart = mysqli_query($this->conn,"DELETE FROM my_card WHERE id=$deleteFromCart");
	return $deleteFromCart;
	}

	public function selectcommentaire(){
	$selectcommmentaire_query = mysqli_query($this->conn, "SELECT * FROM commentaire WHERE atproduct=".$_GET['id']."");
	return $selectcommmentaire_query;
	}

	public function add_commentaire($atproduct, $fromuser, $commentaire, $username, $avatar){
		$add_commentaire_query = mysqli_query($this->conn, "insert into commentaire(atproduct, fromuser, comment, username, avatar) values('$atproduct','$fromuser','$commentaire','$username', '$avatar')");
		return $add_commentaire_query;
	}

	public function changeusername($username, $userid){
		$changeusername_query = mysqli_query($this->conn, "UPDATE users SET username='$username' WHERE id=$userid");
		return $changeusername_query;
	}

	public function changepassword($password, $userid){
		$changepassword_query = mysqli_query($this->conn, "UPDATE users SET password='$password' WHERE id=$userid");
		return $changepassword_query;
	}

	public function changephone($phone, $userid){
		$changepassword_query = mysqli_query($this->conn, "UPDATE users SET user_phone='$phone' WHERE id=$userid");
		return $changepassword_query;
	}

	public function setprofileimg($img, $userid){
		$setprofileimg_query = mysqli_query($this->conn, "UPDATE users SET avatar='$img' WHERE id=$userid");
		return $setprofileimg_query;
	}

	public function add_img_at_tbl_commentaire($img, $userid){
		$add_img_at_tbl_commentaire_query = mysqli_query($this->conn, "UPDATE commentaire SET avatar='$img' WHERE fromuser=$userid");
		return $add_img_at_tbl_commentaire_query;
	}

	public function delete_user($user_id){
		$delete_user_id_query = mysqli_query($this->conn, "DELETE FROM users WHERE id=$user_id");
		return $delete_user_id_query;
	}

	public function edite_user($username, $email, $password, $phone, $userid){
		$edite_user_query = mysqli_query($this->conn, "UPDATE users SET username='$username', email='$email', password='$password', user_phone='$phone' WHERE id=$userid");
		return $edite_user_query;
	}

	public function numofusers(){
		$numofusers_query = mysqli_query($this->conn, "SELECT * FROM users");
		return $numofusers_query;
	}

	public function delete_commentaire($comment_for){
		$delete_commentaire_query = mysqli_query($this->conn, "DELETE FROM commentaire WHERE id=$comment_for");
		return $delete_commentaire_query;
	}

	public function numofcomment(){
		$numofcomment_query = mysqli_query($this->conn, "SELECT * FROM commentaire");
		return $numofcomment_query;
	}

	public function numofproduct(){
		$numofproduct_query = mysqli_query($this->conn, "SELECT * FROM tbl_products");
		return $numofproduct_query;
	}

	public function selectcategorie(){
		$selectcategorie_query = mysqli_query($this->conn, "SELECT category FROM tbl_products GROUP BY category HAVING COUNT(*) > 1");
		return $selectcategorie_query;
	}

	public function edite_product($product_name, $product_price, $product_categorie, $product_description, $promotion, $selected_product, $imageFileType, $imageFileType_1, $imageFileType_2, $imageFileType_3, $imageFileType_4){
		$edite_product_query = mysqli_query($this->conn, "UPDATE tbl_products SET name='$product_name', price='$product_price', category='$product_categorie', product_description='$product_description', promotion='$promotion', product_image='$imageFileType', related_img_1='$imageFileType_1', related_img_2='$imageFileType_2', related_img_3='$imageFileType_3', related_img_4='$imageFileType_4'  WHERE id=$selected_product");
		return $edite_product_query;
	}

	public function add_product($product_name, $product_price, $product_categorie, $product_description, $promotion, $rating, $target_file, $target_file_1, $target_file_2, $target_file_3, $target_file_4 ){
		$add_product_query = mysqli_query($this->conn, "insert into tbl_products(name, price, category, product_description, promotion, average_rating, product_image, related_img_1, related_img_2, related_img_3, related_img_4) values('$product_name','$product_price','$product_categorie','$product_description', '$promotion', '$rating', '$target_file', '$target_file_1', '$target_file_2', '$target_file_3', '$target_file_4')");
		return $add_product_query;
	}

}

