<?php
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$gender="";
	$err_gender="";
	$prof="";
	$err_prof="";
	$hobbies=[];
	$err_hobbies="";
	$bio="";
	$err_bio="";
	
	$hasError=false;
	
	$professions = array("Teaching","Service","Business","Entreprenuer");
	
	function hobbyExist($hobby){
		global $hobbies;
		foreach($hobbies as $h){
			if($h == $hobby){
				return true;
			}
		}
		return false;
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(empty($_POST["name"])){
			$err_name="Name Required";
			$hasError = true;
		}
		else if(strlen($_POST["name"]) <=2){
			$err_name="Name Must be greater than 2";
			$hasError = true;
		}
		else{
			$name=$_POST["name"];
		}
		if(empty($_POST["username"])){
			$err_uname="Username Required";
			$hasError = true;
		}
		
		else{
			$uname=$_POST["username"];
		}
		if(!isset($_POST["gender"])){
			$err_gender="Gender Required";
			$hasError = true;
		}
		else{
			$gender = $_POST["gender"];
		}
		if(!isset($_POST["profession"])){
			$err_prof = "Profession Required";
			$hasError = true;
		}
		else{
			$prof = $_POST["profession"];
		}
		if(!isset($_POST["hobbies"])){
			$err_hobbies="Hobbies Required";
			$hasError = true;
		}
		else{
			$hobbies = $_POST["hobbies"];
		}
		if(empty($_POST["bio"])){
			$err_bio="Bio Required";
			$hasError = true;
		}
		else{
			$bio = $_POST["bio"];
		}
		
		if(!$hasError){
			echo $name."<br>";
			echo $_POST["username"]."<br>";
			echo $_POST["password"]."<br>";
			echo $_POST["gender"]."<br>";
			echo $_POST["profession"]."<br>";
			echo $_POST["bio"]."<br>";
			
			$arr = $_POST["hobbies"];
			
			foreach($arr as $e){
				echo "$e <br>";
			}
		}
		
		
	}
?>
<html>
	<head></head>
	<body>
		<fieldset>
			<form action="" method="post">
				<table >
					<tr>
						<td>Name: </td>
						<td><input type="text" name="name" value="<?php echo $name;?>" placeholder="Name"></td>
						<td><span><?php echo $err_name;?></span></td>
						
					</tr>
					<tr>
						<td>Username: </td>
						<td><input type="text" name="username" value="<?php echo $uname;?>" placeholder="Username"></td>
						<td><span><?php echo $err_uname;?></span></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="password" placeholder="Password"></td>
					</tr>

					<tr>
						<td>Gender: </td>
						<td><input type="radio" value="Male" <?php if($gender == "Male") echo "checked";?> name="gender"> Male <input <?php if($gender == "Female") echo "checked";?> name="gender"  value="Female" type="radio"> Female</td>
						<td><span><?php echo $err_gender;?></span></td>
					</tr>
					<tr>
						<td>Profession:  </td>
						<td>
							<select name="profession">
								<option selected disabled>--Select--</option>
								<?php
									foreach($professions as $pf){
										if($prof == $pf)
											echo "<option selected>$pf</option>";
										else
											echo "<option>$pf</option>";
									}
								?>
							</select> 
						</td>
						<td><span><?php echo $err_prof;?></span></td>
					</tr>
					<tr>
						<td>Hobbies:  </td>
						<td>
							<input type="checkbox" value="Movies" <?php if(hobbyExist("Movies")) echo "checked";?>  name="hobbies[]"> Movies
							<input type="checkbox" value="Music" <?php if(hobbyExist("Music")) echo "checked";?> name="hobbies[]"> Music<br>
							<input type="checkbox" value="Sports" <?php if(hobbyExist("Sports")) echo "checked";?> name="hobbies[]"> Sports
							<input type="checkbox" value="Games" <?php if(hobbyExist("Games")) echo "checked";?> name="hobbies[]"> Games
						</td>
						<td><span><?php echo $err_hobbies;?></span></td>
					</tr>
					<tr>
						<td>Bio:  </td>
						<td>
							<textarea name="bio"><?php echo $bio;?></textarea>
						</td>
						<td><span><?php echo $err_bio;?></span></td>
					</tr>
					<tr>
						<td align="right" colspan="2"><input type="submit" value="Register"></td>
					</tr>
					
				</table>
			</form>
		</fieldset>
	</body>
</html>