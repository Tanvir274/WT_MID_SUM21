<?php
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$cpass="";
	$cerr_pass="";
	$mail="";
	$err_mail="";
	$phone_number="";
	$err_phone_number="";
	$add="";
	$add1="";
	$add2="";
	$add3="";
	$err_add="";
	$err_add1="";
	$err_add2="";
	$err_add3="";
	$day="";
	$err_day="";
	$month="";
	$err_month="";
	$year="";
	$err_year="";
	
	$gender="";
	$err_gender="";
	
	
	$hobbies=[];
	$err_hobbies="";
	$bio="";
	$err_bio="";
	
	$hasError=false;
	
	 $days =array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	 $months=array(1,2,3,4,5,6,7,8,9,10,11,12);
	 $years=array(1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011);
	
	function hobbyExist($hobby)
	{
		global $hobbies;
		foreach($hobbies as $h)
		{
			if($h == $hobby)
			{
				return true;
			}
		}
		return false;
	}

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Name
		if(empty($_POST["name"]))
		{
			$err_name="Name Required";
			$hasError = true;
		}
		else if(strlen($_POST["name"]) <=2)
		{
			$err_name="Name Must be greater than 2";
			$hasError = true;
		}
		else
		{
			$name=$_POST["name"];
		}
		
		
		
		// username
		if(empty($_POST["username"])) 
		{
			$err_uname="Username Required";
			$hasError = true;
		}
		else if(strlen($_POST["username"]) <=5)
		{
			$err_uname="Username must contain at least 6 characters";
			$hasError = true;
		}
		else if($_POST["username"])
		{
			for($i=0;$i<username.length();$i++)
			{
				if(username[$i]==' ')
				{
					$err_uname="Username space is not allowed";
			        $hasError = true;
				}
			}
		}
		else
		{
			$uname=$_POST["username"];
		}
		
		
		
		
		
		
		//password
		if(empty($_POST["password"])) 
		{
			$err_pass="Password Required";
			$hasError = true;
		}
		else if(strlen($_POST["password"]) <=7)
		{
			$err_pass="password must contain at least 8 characters";
			$hasError = true;
		}
		else if(strlen($_POST["password"])>=8)
		{
			$c=0;
			$d=0;
			$e=0;
			$f=0;
			$l=password.length();
			for($i=0;$i<$l;$i++)
			{
				if(password[$i]==' ')
				{
					$err_pass="Password space is not allowed";
			        $hasError = true;
					$i=$l;
					
				}
				if(password[$i]>='A' && password[$i]<='Z' )
				{
					$c=1;
				}
				if(password[$i]>='a' && password[$i]<='z' )
				{
					$d=1;
				}
				if(password[$i]=='?' && password[$i]=='#' )
				{
					$e=1;
				}
				if(password[$i]>='0' && password[$i]<='9' )
				{
					$f=1;
				}
				
			}
		}
		else if($c==0 || $d==0 ||$e==0 ||$f==0)
		{
			$err_pass="Password  is not Right";
			$hasError = true;
		}
		else
		{
			$pass=$_POST["password"];
		}
		
		
		//confirm password
		if(empty($_POST["confirm_password"])) 
		{
			$cerr_pass="Confirmation Password";
			$hasError = true;
		}
		else if($_POST["confirm_password"]!= $pass)
		{
			$cerr_pass="Confirmation with same password";
			$hasError = true;
		}
		else
		{
			$cpass=$_POST["confirm_password"];
		}
		
		//Email
		if(empty($_POST["email"])) 
		{
			$err_mail="Email Required";
			$hasError = true;
		}
		else if(strlen($_POST["email"]) <=9)
		{
			$err_mail="Email must contain at least 8 characters";
			$hasError = true;
		}
		else if(strlen($_POST["email"])>=9)
		{
			
			$l=email.length();
			for($i=0;$i<$l;$i++)
			{
				if(email[$i]=='@')
				{
					if(email[$i+6]!='.')
					{
					   $err_mail="Insert right Mail Address";
			           $hasError = true;
					   $i=$l;
					}
					
				}
				
				
			}
		}
		
		else
		{
			$mail=$_POST["email"];
		}
		
		//Phone Number
		if(empty($_POST["digit"])) 
		{
			$err_phone_number="Phone Number Required";
			$hasError = true;
		}
		else if(!empty($_POST["digit"]))
		{
			$l=length.digit();
			
			for($i=0;i<$l;$i++)
			{
				if(digit[$i]<='0' && digit[$i]>='9')
				{
					$err_phone_number="Phone number only accept numeric value";
					$hasError=true;
				}
			}
		}
		else
		{
			$phone_number=$_POST["digit"];
		}
		
		// Street Address
		if(empty($_POST["address"]))
		{
			$err_add="Street Address Required";
			$hasError = true;
		}
		else if(strlen($_POST["address"]) <=2)
		{
			$err_add="Street Address Must be greater than 2";
			$hasError = true;
		}
		else
		{
			$add=$_POST["address"];
		}
		
		
		//city
		if(empty($_POST["address1"]))
		{
			$err_add1="City Required";
			$hasError = true;
		}
		else if(strlen($_POST["address1"]) <=2)
		{
			$err_add1="City Nmae Must be greater than 2";
			$hasError = true;
		}
		else
		{
			$add1=$_POST["address1"];
		}
		
		//State
		if(empty($_POST["address2"]))
		{
			$err_add2="State Required";
			$hasError = true;
		}
		else if(strlen($_POST["address2"]) <=2)
		{
			$err_add2="State Nmae Must be greater than 2";
			$hasError = true;
		}
		else
		{
			$add2=$_POST["address2"];
		}
		
		//Postal/Zip code
		if(empty($_POST["address3"]))
		{
			$err_add3="Zip Code Required";
			$hasError = true;
		}
		else if(strlen($_POST["address3"]) <=2)
		{
			$err_add3="Zip Code Must be greater than 2";
			$hasError = true;
		}
		else
		{
			$add3=$_POST["address3"];
		}
		//Day
		
		if(!isset($_POST["day"]))
		{
			$err_day = "Day Required";
			$hasError = true;
		}
		else
		{
			$day = $_POST["day"];
		}
		
		//Month
		if(!isset($_POST["month"]))
		{
			$err_month = "Month Required";
			$hasError = true;
		}
		else
		{
			$month = $_POST["month"];
		}
		
		//Year
		if(!isset($_POST["year"]))
		{
			$err_year = "Year Required";
			$hasError = true;
		}
		else
		{
			$year = $_POST["year"];
		}
		
		//Gender
		
		if(!isset($_POST["gender"]))
		{
			$err_gender="Gender Required";
			$hasError = true;
		}
		else
		{
			$gender = $_POST["gender"];
		}
		
		
		
		
		//
		if(!isset($_POST["hobbies"]))
		{
			$err_hobbies="Hobbies Required";
			$hasError = true;
		}
		else
		{
			$hobbies = $_POST["hobbies"];
		}
		
		
		//Bio
		if(empty($_POST["bio"])){
			$err_bio="Bio Required";
			$hasError = true;
		}
		else
		{
			$bio = $_POST["bio"];
		}
		
		if(!$hasError)
		{
			echo $name."<br>";
			echo $_POST["username"]."<br>";
			echo $_POST["password"]."<br>";
			echo $_POST["confirm_password"]."<br>";
			echo $_POST["email"]."<br>";
			echo $_POST["digit"]."<br>";
			echo $_POST["address"]."<br>";
			echo $_POST["address1"]."<br>";
			echo $_POST["address2"]."<br>";
			echo $_POST["address3"]."<br>";
			echo $_POST["day"]."<br>";
			echo $_POST["month"]."<br>";
			echo $_POST["year"]."<br>";
			echo $_POST["gender"]."<br>";
			
			
			$arr = $_POST["hobbies"];
			
			foreach($arr as $e)
			{
				echo "$e <br>";
			}
			echo $_POST["bio"];
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
						<td><input type="password" name="password" value="<?php echo $pass ?>" placeholder="Password"></td>
						<td><span><?php echo $err_pass;?></span></td>
					</tr>
					<tr>
						<td>Confirm Password: </td>
						<td><input type="password" name="confirm_password" value="<?php echo $cpass ?>" placeholder="Confirm Password"></td>
						<td><span><?php echo $cerr_pass;?></span></td>
					</tr>
					<tr>
					     <td>Email:</td>
						 <td><input type="text" name="email" value="<?php echo $mail;?>" placeholder="Email"></td>
						 <td><span><?php echo $err_mail;?></span></td>
					</tr>
					<tr>
						<td>Phone Number: </td>
						<td><input type="text" name="digit" value="<?php echo $phone_number;?>" placeholder="Phone Number"></td>
						<td><span><?php echo $err_phone_number;?></span></td>
						
					</tr>
					<tr>
						<td>Address: </td>
						<td><input type="text" name="address" value="<?php echo $add;?>" placeholder="Street Address">
						<?php echo "<br>";?>
						<input type="text" name="address1" value="<?php echo $add1;?>" placeholder="City">
						<?php echo "-";?><input type="text" name="address2" value="<?php echo $add2;?>" placeholder="State">
						<?php echo "<br>";?>
						<input type="text" name="address3" value="<?php echo $add3;?>" placeholder="Postal/Zip Code">
						</td>
						
						<td><span><?php echo $err_add;?></span><?php echo "<br>";?>
						<span><?php echo $err_add1;?></span><?php echo "<br>";?>
						<span><?php echo $err_add2;?></span><?php echo "<br>";?>
						<span><?php echo $err_add3;?></span>
						</td>
						
					</tr>
					<tr>
						<td>Birth Date:  </td>
						<td>
							<select name="day">
								<option selected disabled>Day</option>
								<?php
									foreach($days as $i)
									{
										if($day == $i)
											echo "<option selected>$i</option>";
										else
											echo "<option>$i</option>";
									}
								?>
							</select> 
							<select name="month">
								<option selected disabled>Month</option>
								<?php
									foreach($months as $i)
									{
										if($month == $i)
											echo "<option selected>$i</option>";
										else
											echo "<option>$i</option>";
									}
								?>
							</select>
							<select name="year">
								<option selected disabled>Year</option>
								<?php
									foreach($years as $i)
									{
										if($year == $i)
											echo "<option selected>$i</option>";
										else
											echo "<option>$i</option>";
									}
								?>
							</select>
						</td>
						<td>
						<span><?php echo $err_day;?></span>
						<span><?php echo $err_month;?></span>
						<span><?php echo $err_year;?></span>
						</td>
					</tr>

					<tr>
						<td>Gender: </td>
						<td><input type="radio" value="Male" <?php if($gender == "Male") echo "checked";?> name="gender"> Male <input <?php if($gender == "Female") echo "checked";?> name="gender"  value="Female" type="radio"> Female</td>
						<td><span><?php echo $err_gender;?></span></td>
					</tr>
					
					
					<tr>
						<td>Where do you about us?  </td>
						<td>
							<input type="checkbox" value="A friend or colleague" <?php if(hobbyExist("A friend or colleague")) echo "checked";?>  name="A friend or colleague[]"> A friend or colleague<br>
							<input type="checkbox" value="Google" <?php if(hobbyExist("Google")) echo "checked";?> name="Google[]"> Google<br>
							<input type="checkbox" value="Bloog" <?php if(hobbyExist("Bloog")) echo "checked";?> name="Bloog[]"> Bloog<br>
							<input type="checkbox" value="Article" <?php if(hobbyExist("Article")) echo "checked";?> name="Article[]"> News Article
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