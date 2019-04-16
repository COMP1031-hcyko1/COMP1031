<html>
<head>
<title>SAKILA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
table#t01 tr:nth-child(even) {
  background-color: #fff;
  border-radius: 4px;
}
table#t01 tr:nth-child(odd) {
 background-color: #eee;
 border-radius: 4px;
}
table#t01 th {
  background-color: #404040;
  border-radius: 4px;
  color: white;
}
.overlay {
  height: 0;
  width: 100%	;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.3s;
}

.overlay-content {
  position: relative;
  top: 20%;
  width: 100%;
  text-align: center;
  margin-top: 10px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #b3b3b3;
  display: block;
  transition: 0.3s;
min-height: 7%;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  color: #b30000;
  font-weight: bold;
  top: 9%;
  right: 5%;
  font-size: 60px;
}
.openbtn {
  width: 205px;
  font-size: 18px;
  cursor: pointer;
  background-color: #595959;
  color: white;
  padding: 12px 16px;
  border: none;
  
  float: left;
}

.openbtn:hover {
  background-color: black;
}
.column {
  float: left;
  width: 32%;
}

.header {
  background-color: #d9d9d9;
  padding: 20px;
  padding-left: 4%;
  text-align: left;
}

#navbar {
  overflow: hidden;
  background-color: #595959;
  
}

#navbar a {
  text-align: center;
  
  text-decoration: none;
  display: block;

}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}

.show {
  display: block;
}

div.content {
  margin-left: 5%;
  padding: 1% 1%;
}

@media screen and (max-width: 600px) {
  div.content {margin-left: 0;}
  .header{padding-left: 1%;}
}

@media screen and (max-width: 480px) {
  .overlay a {
    font-size: 20px;
    min-height: auto;
  }
  .overlay-content {top: 10%;}
  .overlay .closebtn {
    font-size: 50px;
    top: 15px;
    right: 35px;
  }  
  .column {
    width: 100%;
    height: auto;
  }
  .openbtn{width: 50%;}
  .header{
    text-align:center;
    padding: 1px;
  }
}
.search_d {
color: #494949 !important;
background: #ffffff;
padding: 0.7%;
margin: 3px;
border: 1px solid #494949 !important;
border-radius: 4px;
display: inline-block;
}
.button_e {
color: black !important;
background: #ffffff;
padding: 0.7%;
border: 1px solid #494949 !important;
border-radius: 2px;
display: inline-block;
}
.button_e:hover {
color: #494949 !important;
background: #d9d9d9;
border-color: #eee ;
transition: all 0.01s ease 0s;
}
.button_d {
color: #494949 !important;
background: #ffffff;
padding: 0.7%;
margin: 3px;
border: 1px solid #494949 !important;
border-radius: 4px;
display: inline-block;
}
.button_d:hover {
color: white !important;
background: #555;
border-color: #eee ;
transition: all 0.01s ease 0s;
}
.button_c {
color: black !important;
background: #a6a6a6;
padding: 0.7%;
border: 1px solid #494949 !important;
border-radius: 4px;
display: inline-block;
}

.button_c:hover {
color: white !important;
background: #555;
border-color: #eee ;
transition: all 0.01s ease 0s;
}

#scroll-container {
    overflow-x: auto;
    white-space: nowrap;
}

</style>
</head>
<body>

<!--Identify current table-->
<?php
	if(isset($_GET['table'])){
		$table = $_GET['table'];
	}
?>

<div class="header">
  <h1>SAKILA</h1>
</div>

<div id="navbar">

<a href="index.php"><button class=openbtn><i class="fa fa-home"></i> Home</button></a>

<button class=openbtn onclick="openNav()"><i class="fa fa-bars"></i> Menu</button> 
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">

        <div class="column">
          <a href="index.php?table=actor">Actor</a>
          <a href="index.php?table=address">Address</a>
          <a href="index.php?table=category">Category</a>
          <a href="index.php?table=city">City</a>
          <a href="index.php?table=country">Country</a>
        </div>
        <div class="column">
          <a href="index.php?table=customer">Customer</a>
          <a href="index.php?table=film">Film</a>
          <a href="index.php?table=film_actor">Film-Actor</a>
          <a href="index.php?table=film_category">Film-Category</a>
          <a href="index.php?table=inventory">Inventory</a>
        </div>
        <div class="column">
          <a href="index.php?table=language">Language</a>
          <a href="index.php?table=payment">Payment</a>
          <a href="index.php?table=rental">Rental</a>
          <a href="index.php?table=staff">Staff</a>
          <a href="index.php?table=store">Store</a>
        </div>

  </div>
</div>

</div>

<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>

<div class="content">
<?php

//Headers
echo '
<h1>
';
	if($table == 'actor'){
		echo 'Actor';
	}
	else if($table == 'address'){
		echo 'Address';
	}
	else if($table == 'category'){
		echo 'Category';
	}
	else if($table == 'city'){
		echo 'City';
	}
	else if($table == 'country'){
		echo 'Country';
	}
	else if($table == 'customer'){
		echo 'Customer';
	}
	else if($table == 'film'){
		echo 'Film';
	}
	else if($table == 'film_actor'){
		echo 'Film-Actor';
	}
	else if($table == 'film_category'){
		echo 'Film-Category';
	}
	else if($table == 'inventory'){
		echo 'Inventory';
	}
	else if($table == 'language'){
		echo 'Language';
	}
	else if($table == 'payment'){
		echo 'Payment';
	}
	else if($table == 'rental'){
		echo 'Rental';
	}
	else if($table == 'staff'){
		echo 'Staff';
	}
	else if($table == 'store'){
		echo 'Store';
	}
echo'
</h1>
';

//Paragraph
if(!isset($_GET['table'])){
	echo '<h2>Database and Interfaces(COMP1031) CW1 Database Interface</h2>';
	echo '<h3>List of Group Members:</h3>';
	echo '<p>20106188 Ooi Kai Sheng     </p>';
	echo '<p>20113614 Chua Meng Hong     </p>';
	echo '<p>20129378 Chan Yee Hern      </p>';
	echo '<p>20128250 Justin Lee Kai Ren </p>';
	echo '<p>20101685 Alvin Wong Xia Yii </p>';
}

//Search Bar
if(isset($_GET['table'])){ 
	echo '<form action="index.php?table=' . $table . '" method="post">';
		echo '<input class=search_d type="text" name="search1" placeholder="Search" value="'; if(isset($_GET['search1']) ){ echo htmlentities($_GET['search1']);} echo '">';
		echo '<select class=button_d name="column1">';

			//column1 options
			if($table == 'actor'){
				echo '<option class=search_d value="actor_id"'; if($_GET['column1'] == "actor_id"){echo "selected";} echo '>Actor ID</option>';
				echo '<option class=search_d value="first_name"'; if($_GET['column1'] == "first_name"){echo "selected";} echo '>First Name</option>';
				echo '<option class=search_d value="last_name"'; if($_GET['column1'] == "last_name"){echo "selected";} echo '>Last Name</option>';
			}
			else if($table == 'address'){
				echo '<option class=search_d value="address_id"'; if($_GET['column1'] == "address_id"){echo "selected";} echo '>Address ID</option>';
				echo '<option class=search_d value="address"'; if($_GET['column1'] == "address"){echo "selected";} echo '>Address</option>';
				echo '<option class=search_d value="district"'; if($_GET['column1'] == "district"){echo "selected";} echo '>District</option>';
				echo '<option class=search_d value="city_id"'; if($_GET['column1'] == "city_id"){echo "selected";} echo '>City ID</option>';
				echo '<option class=search_d value="postal_code"'; if($_GET['column1'] == "postal_code"){echo "selected";} echo '>Postal Code</option>';
				echo '<option class=search_d value="phone"'; if($_GET['column1'] == "phone"){echo "selected";} echo '>Phone</option>';
			}
			else if($table == 'category'){
				echo '<option class=search_d value="category_id"'; if($_GET['column1'] == "category_id"){echo "selected";} echo '>Category ID</option>';
				echo '<option class=search_d value="name"'; if($_GET['column1'] == "name"){echo "selected";} echo '>Name</option>';
			}
			else if($table == 'city'){
				echo '<option class=search_d value="city_id"'; if($_GET['column1'] == "city_id"){echo "selected";} echo '>City ID</option>';
				echo '<option class=search_d value="city"'; if($_GET['column1'] == "city"){echo "selected";} echo '>City</option>';
				echo '<option class=search_d value="country_id"'; if($_GET['column1'] == "country_id"){echo "selected";} echo '>Country ID</option>';
			}
			else if($table == 'country'){
				echo '<option class=search_d value="country_id"'; if($_GET['column1'] == "country_id"){echo "selected";} echo '>Country ID</option>';
				echo '<option class=search_d value="country"'; if($_GET['column1'] == "country"){echo "selected";} echo '>Country</option>';
			}
			else if($table == 'customer'){
				echo '<option class=search_d value="customer_id"'; if($_GET['column1'] == "customer_id"){echo "selected";} echo '>Customer ID</option>';
				echo '<option class=search_d value="store_id"'; if($_GET['column1'] == "store_id"){echo "selected";} echo '>Store ID</option>';
				echo '<option class=search_d value="first_name"'; if($_GET['column1'] == "first_name"){echo "selected";} echo '>First Name</option>';
				echo '<option class=search_d value="last_name"'; if($_GET['column1'] == "last_name"){echo "selected";} echo '>Last Name</option>';
				echo '<option class=search_d value="email"'; if($_GET['column1'] == "email"){echo "selected";} echo '>Email</option>';
				echo '<option class=search_d value="address_id"'; if($_GET['column1'] == "address_id"){echo "selected";} echo '>Address ID</option>';
				echo '<option class=search_d value="active"'; if($_GET['column1'] == "active"){echo "selected";} echo '>Active</option>';
			}
			else if($table == 'film'){
				echo '<option class=search_d  value="film_id"'; if($_GET['column1'] == "film_id"){echo "selected";} echo '>Film ID</option>';
				echo '<option class=search_d value="title"'; if($_GET['column1'] == "title"){echo "selected";} echo '>Title</option>';
				echo '<option class=search_d value="release_year"'; if($_GET['column1'] == "release_year"){echo "selected";} echo '>Release Year</option>';
				echo '<option class=search_d value="language_id"'; if($_GET['column1'] == "language_id"){echo "selected";} echo '>Language ID</option>';
				echo '<option class=search_d value="rating"'; if($_GET['column1'] == "rating"){echo "selected";} echo '>Rating</option>';
			}
			else if($table == 'film_actor'){
				echo '<option class=search_d value="actor_id"'; if($_GET['column1'] == "actor_id"){echo "selected";} echo '>Actor ID</option>';
				echo '<option class=search_d  value="film_id"'; if($_GET['column1'] == "film_id"){echo "selected";} echo '>Film ID</option>';
			}
			else if($table == 'film_category'){
				echo '<option class=search_d value="film_id"'; if($_GET['column1'] == "film_id"){echo "selected";} echo '>Film ID</option>';
				echo '<option class=search_d value="category_id"'; if($_GET['column1'] == "category_id"){echo "selected";} echo '>Category ID</option>';
			}
			else if($table == 'inventory'){
				echo '<option class=search_d value="inventory_id"'; if($_GET['column1'] == "inventory_id"){echo "selected";} echo '>Inventory ID</option>';
				echo '<option class=search_d value="film_id"'; if($_GET['column1'] == "film_id"){echo "selected";} echo '>Film ID</option>';
				echo '<option class=search_d value="store_id"'; if($_GET['column1'] == "store_id"){echo "selected";} echo '>Store ID</option>';
			}
			else if($table == 'language'){
				echo '<option class=search_d value="language_id"'; if($_GET['column1'] == "language_id"){echo "selected";} echo '>Language ID</option>';
				echo '<option class=search_d value="name"'; if($_GET['column1'] == "name"){echo "selected";} echo '>Name</option>';
			}
			else if($table == 'payment'){
				echo '<option class=search_d value="payment_id"'; if($_GET['column1'] == "payment_id"){echo "selected";} echo '>Payment ID</option>';
				echo '<option class=search_d value="customer_id"'; if($_GET['column1'] == "customer_id"){echo "selected";} echo '>Customer ID</option>';
				echo '<option class=search_d value="staff_id"'; if($_GET['column1'] == "staff_id"){echo "selected";} echo '>Staff ID</option>';
				echo '<option class=search_d value="rental_id"'; if($_GET['column1'] == "rental_id"){echo "selected";} echo '>Rental ID</option>';
				echo '<option class=search_d value="amount"'; if($_GET['column1'] == "amount"){echo "selected";} echo '>Amount</option>';
			}
			else if($table == 'rental'){
				echo '<option class=search_d value="rental_id"'; if($_GET['column1'] == "rental_id"){echo "selected";} echo '>Rental ID</option>';
				echo '<option class=search_d value="inventory_id"'; if($_GET['column1'] == "inventory_id"){echo "selected";} echo '>Inventory ID</option>';
				echo '<option class=search_d value="customer_id"'; if($_GET['column1'] == "customer_id"){echo "selected";} echo '>Customer ID</option>';
				echo '<option class=search_d value="staff_id"'; if($_GET['column1'] == "staff_id"){echo "selected";} echo '>Staff ID</option>';
			}
			else if($table == 'staff'){
				echo '<option class=search_d value="staff_id"'; if($_GET['column1'] == "staff_id"){echo "selected";} echo '>Staff ID</option>';
				echo '<option class=search_d value="first_name"'; if($_GET['column1'] == "first_name"){echo "selected";} echo '>First Name</option>';
				echo '<option class=search_d value="last_name"'; if($_GET['column1'] == "last_name"){echo "selected";} echo '>Last Name</option>';
				echo '<option class=search_d value="address_id"'; if($_GET['column1'] == "address_id"){echo "selected";} echo '>Address ID</option>';
				echo '<option class=search_d value="email"'; if($_GET['column1'] == "email"){echo "selected";} echo '>Email</option>';
				echo '<option class=search_d value="store_id"'; if($_GET['column1'] == "store_id"){echo "selected";} echo '>Store ID</option>';
				echo '<option class=search_d value="username"'; if($_GET['column1'] == "username"){echo "selected";} echo '>Username</option>';
			}
			else if($table == 'store'){
				echo '<option class=search_d value="store_id"'; if($_GET['column1'] == "store_id"){echo "selected";} echo '>Store ID</option>';
				echo '<option class=search_d value="manager_staff_id"'; if($_GET['column1'] == "manager_staff_id"){echo "selected";} echo '>Manager Staff ID</option>';
				echo '<option class=search_d value="address_id"'; if($_GET['column1'] == "address_id"){echo "selected";} echo '>Address ID</option>';
			}
			
		echo '</select>';
		echo '<input class=button_d type="submit" value="Search">';
	echo '</form>';
}
//Connection details
$servername = "localhost";
$username 	= "hcyyc2_kaisheng";
$password 	= "YI%1h,xGhJKH";
$dbname 	= "hcyyc2_SAKILA";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// New Search
if(isset($_POST["search1"]) ){
	echo '<meta http-equiv = "refresh" content = "0; url = index.php?table=' . $table . '&column1=' . $_POST['column1'] . '&search1=' . $_POST['search1'] . '&page=' . '1' . '" />';
}
//Other operations and results display
else{
	if(isset($_GET['search1']) && isset($_GET['column1'])){
		$search1 = $_GET['search1'];
		$column1 = $_GET['column1'];
	}
	
	
	// Add form
	if(isset($_GET['table'])){
		echo '<form action="index.php?table=' . $table . '" method="post">';
		echo "<tr>";
			
		if($table == 'actor'){
			echo "<td><input class=search_d type=text name=iactor_id 			placeholder='Add Actor ID'></td>";
			echo "<td><input class=search_d type=text name=ifirst_name 			placeholder='Add First Name'></td>";
			echo "<td><input class=search_d type=text name=ilast_name	 		placeholder='Add Last Name'></td>";
		}
		else if($table == 'address'){
			echo "<td><input class=search_d type=text name=iaddress_id			placeholder='Add Address ID'></td>";
			echo "<td><input class=search_d type=text name=iaddress 			placeholder='Add Address'></td>";
			echo "<td><input class=search_d type=text name=idistrict	 		placeholder='Add District'></td>";
			echo "<td><input class=search_d type=text name=icity_id	 			placeholder='Add City ID'></td>";
			echo "<td><input class=search_d type=text name=ipostal_code	 		placeholder='Add Postal Code'></td>";
			echo "<td><input class=search_d type=text name=iphone	 			placeholder='Add Phone'></td>";
		}
		else if($table == 'category'){
			echo "<td><input class=search_d type=text name=icategory_id 		placeholder='Add Category ID'></td>";
			echo "<td><input class=search_d type=text name=iname	 			placeholder='Add Name'></td>";
		}
		else if($table == 'city'){
			echo "<td><input class=search_d type=text name=icity_id 		placeholder='Add City ID'></td>";
			echo "<td><input class=search_d type=text name=icity	 		placeholder='Add City'></td>";
			echo "<td><input class=search_d type=text name=icountry_id	 	placeholder='Add Country ID'></td>";
		}
		else if($table == 'country'){
			echo "<td><input class=search_d type=text name=icountry_id		placeholder='Add Country ID'></td>";
			echo "<td><input class=search_d type=text name=icountry 		placeholder='Add Country'></td>";
		}
		else if($table == 'customer'){
			echo "<td><input class=search_d type=text name=icustomer_id		placeholder='Add Customer ID'></td>";
			echo "<td><input class=search_d type=text name=istore_id		placeholder='Add Store ID'></td>";
			echo "<td><input class=search_d type=text name=ifirst_name		placeholder='Add First Name'></td>";
			echo "<td><input class=search_d type=text name=ilast_name		placeholder='Add Last Name'></td>";
			echo "<td><input class=search_d type=text name=iemail			placeholder='Add Email'></td>";
			echo "<td><input class=search_d type=text name=iaddress_id		placeholder='Add Address ID'></td>";
			echo "<td><input class=search_d type=text name=iactive		placeholder='Add Active'></td>";
		}
		else if($table == 'film'){
			echo "<td><input class=search_d type=text name=ifilm_id 			placeholder='Add Film ID'></td>";
			echo "<td><input class=search_d type=text name=ititle 				placeholder='Add Title'></td>";
			echo "<td><input class=search_d type=text name=idescription 		placeholder='Add Description'></td>";
			echo "<td><input class=search_d type=text name=irelease_year 		placeholder='Add Release Year'></td>";
			echo "<td><input class=search_d type=text name=ilanguage_id 		placeholder='Add Language ID'></td>";
			echo "<td><input class=search_d type=text name=irental_duration 	placeholder='Add Rental Duration'></td>";
			echo "<td><input class=search_d type=text name=irental_rate 		placeholder='Add Rental Rate'></td>";
			echo "<td><input class=search_d type=text name=ilength 				placeholder='Add Length'></td>";
			echo "<td><input class=search_d type=text name=ireplacement_cost 	placeholder='Add Replacement Cost'></td>";
			echo "<td><input class=search_d type=text name=irating 				placeholder='Add Rating'></td>";
			echo "<td><input class=search_d type=text name=ispecial_features 	placeholder='Add Special Features'></td>";
		}
		else if($table == 'film_actor'){
			echo "<td><input class=search_d type=text name=iactor_id placeholder='Add Actor ID'></td>";
			echo "<td><input class=search_d type=text name=ifilm_id placeholder='Add Film ID'></td>";
		}
		else if($table == 'film_category'){
			echo "<td><input class=search_d type=text name=ifilm_id			placeholder='Add Film ID'></td>";
			echo "<td><input class=search_d type=text name=icategory_id		placeholder='Add Category ID'></td>";
		}
		else if($table == 'inventory'){
			echo "<td><input class=search_d type=text name=iinventory_id	placeholder='Add Inventory ID'></td>";
			echo "<td><input class=search_d type=text name=ifilm_id			placeholder='Add Film ID'></td>";
			echo "<td><input class=search_d type=text name=istore_id		placeholder='Add Store ID'></td>";
		}
		else if($table == 'language'){
			echo "<td><input class=search_d type=text name=ilanguage_id		placeholder='Add Language ID'></td>";
			echo "<td><input class=search_d type=text name=iname			placeholder='Add Name'></td>";
		}
		else if($table == 'payment'){
			echo "<td><input class=search_d type=text name=ipayment_id		placeholder='Add Payment ID'></td>";
			echo "<td><input class=search_d type=text name=icustomer_id		placeholder='Add Customer ID'></td>";
			echo "<td><input class=search_d type=text name=istaff_id		placeholder='Add Staff ID'></td>";
			echo "<td><input class=search_d type=text name=irental_id		placeholder='Add Rental ID'></td>";
			echo "<td><input class=search_d type=text name=iamount			placeholder='Add Amount'></td>";
		}
		else if($table == 'rental'){
			echo "<td><input class=search_d type=text name=irental_id		placeholder='Add Rental ID'></td>";
			echo "<td><input class=search_d type=text name=irental_date		placeholder='Add Rental Date'></td>";
			echo "<td><input class=search_d type=text name=iinventory_id	placeholder='Add Inventory ID'></td>";
			echo "<td><input class=search_d type=text name=icustomer_id		placeholder='Add Customer ID'></td>";
			echo "<td><input class=search_d type=text name=ireturn_date		placeholder='Add Return Date'></td>";
			echo "<td><input class=search_d type=text name=istaff_id		placeholder='Add Staff ID'></td>";
		}
		else if($table == 'staff'){
			echo "<td><input class=search_d type=text name=istaff_id		placeholder='Add Staff ID'></td>";
			echo "<td><input class=search_d type=text name=ifirst_name		placeholder='Add First Name'></td>";
			echo "<td><input class=search_d type=text name=ilast_name		placeholder='Add Last Name'></td>";
			echo "<td><input class=search_d type=text name=iaddress_id		placeholder='Add Address ID'></td>";
			echo "<td><input class=search_d type=text name=ipicture			placeholder='Add Picture'></td>";
			echo "<td><input class=search_d type=text name=iemail			placeholder='Add Email'></td>";
			echo "<td><input class=search_d type=text name=istore_id		placeholder='Add Store ID'></td>";
			echo "<td><input class=search_d type=text name=iactive			placeholder='Add Active'></td>";
			echo "<td><input class=search_d type=text name=iusername		placeholder='Add Username'></td>";	
			echo "<td><input class=search_d type=password name=ipassword		placeholder='Add Password'></td>";
		}
		else if($table == 'store'){
			echo "<td><input class=search_d type=text name=istore_id			placeholder='Add Store ID'></td>";
			echo "<td><input class=search_d type=text name=imanager_staff_id	placeholder='Add Manager ID'></td>";
			echo "<td><input class=search_d type=text name=iaddress_id			placeholder='Add Address ID'></td>";
		}
	
		echo "<td>" . "<input class=button_d type=submit name=add value=Add " . " </td>";
		echo "</tr>";
		echo "</form>";
	}
	
	// Add Query
	if(isset($_POST['add'])){
		$empty_pk = false;
		$last_update=date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
		if($table == 'actor'){
			if(isset($_POST['iactor_id']) ){
				$AddQuery = "INSERT INTO  actor (actor_id, first_name, last_name, last_update) 
							 VALUES ('$_POST[iactor_id]','$_POST[ifirst_name]', '$_POST[ilast_name]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'address'){
			if(isset($_POST['iaddress_id']) ){
				$AddQuery = "INSERT INTO address (address_id, address, district, city_id, postal_code, phone, last_update) 
							 VALUES ('$_POST[iaddress_id]','$_POST[iaddress]', '$_POST[idistrict]', '$_POST[icity_id]', '$_POST[ipostal_code]', '$_POST[iphone]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'category'){
			if(isset($_POST['icategory_id']) ){
				$AddQuery = "INSERT INTO category (category_id, name, last_update) 
							 VALUES ('$_POST[icategory_id]','$_POST[iname]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'city'){
			if(isset($_POST['icity_id']) ){
				$AddQuery = "INSERT INTO city (city_id, city, country_id, last_update) 
							 VALUES ('$_POST[icity_id]','$_POST[icity]','$_POST[icountry_id]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'country'){
			if(isset($_POST['icountry_id']) ){
				$AddQuery = "INSERT INTO country (country_id, country, last_update) 
							 VALUES ('$_POST[icountry_id]','$_POST[icountry]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'customer'){
			if(isset($_POST['icustomer_id']) ){
				$create_date=$last_update;
				$AddQuery = "INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) 
							 VALUES ('$_POST[icustomer_id]','$_POST[istore_id]','$_POST[ifirst_name]','$_POST[ilast_name]','$_POST[iemail]','$_POST[iaddress_id]','$_POST[iactive]','$create_date', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'film'){
			if(isset($_POST['ifilm_id']) ){
				$AddQuery = "INSERT INTO film (film_id, title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features, last_update) 
							 VALUES ('$_POST[ifilm_id]','$_POST[ititle]', '$_POST[idescription]', '$_POST[irelease_year]', '$_POST[ilanguage_id]', '$_POST[irental_duration]', '$_POST[irental_rate]', '$_POST[ilength]', '$_POST[ireplacement_cost]', '$_POST[irating]', '$_POST[ispecial_features]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'film_actor'){
			if(isset($_POST['iactor_id']) && isset($_POST['ifilm_id'])){
				$AddQuery = "INSERT INTO film_actor (actor_id, film_id, last_update) 
							 VALUES ('$_POST[iactor_id]','$_POST[ifilm_id]', '$last_update')";         
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'film_category'){
			if(isset($_POST['ifilm_id']) && isset($_POST['icategory_id']) ){
				$AddQuery = "INSERT INTO film_category (film_id, category_id, last_update) 
							 VALUES ('$_POST[ifilm_id]','$_POST[icategory_id]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'inventory'){
			if(isset($_POST['iinventory_id']) ){
				$AddQuery = "INSERT INTO inventory (inventory_id, film_id, store_id, last_update) 
							 VALUES ('$_POST[iinventory_id]','$_POST[ifilm_id]','$_POST[istore_id]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'language'){
			if(isset($_POST['ilanguage_id']) || isset($_POST['iname']) ){
				$AddQuery = "INSERT INTO language (language_id, name, last_update) 
							 VALUES ('$_POST[ilanguage_id]','$_POST[iname]', '$last_update')"; 
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'payment'){
			if(isset($_POST['ipayment_id']) ){
				$payment_date=$last_update;
				$AddQuery = "INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update) 
							 VALUES ('$_POST[ipayment_id]','$_POST[icustomer_id]','$_POST[istaff_id]','$_POST[irental_id]','$_POST[iamount]','$payment_date', '$last_update')"; ////////////this one
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'rental'){
			if(isset($_POST['irental_id']) ){
				$AddQuery = "INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update) 
							 VALUES ('$_POST[irental_id]','$_POST[irental_date]','$_POST[iinventory_id]','$_POST[icustomer_id]','$_POST[ireturn_date]','$_POST[istaff_id]','$last_update')";
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'staff'){
			if(isset($_POST['istaff_id']) ){
				$AddQuery = "INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update) 
							 VALUES ('$_POST[istaff_id]','$_POST[ifirst_name]','$_POST[ilast_name]','$_POST[iaddress_id]','$_POST[picture]','$_POST[iemail]','$_POST[istore_id]','$_POST[iactive]','$_POST[iusername]','$_POST[ipassword]', ,'$last_update')";
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'store'){
			if(isset($_POST['istore_id']) ){
				$AddQuery = "INSERT INTO store (store_id, manager_staff_id, address_id, last_update) 
							 VALUES ('$_POST[istore_id]','$_POST[imanager_staff_id]','$_POST[iaddress_id]','$last_update')";
			}
			else{
				$empty_pk = true;
			}
		}
		if(!$empty_pk){
			if (mysqli_query($conn, $AddQuery)) {
				echo '<script language="javascript">
						alert("New record created successfully")
					  </script>';
			} else {
				echo "Error: " . $AddQuery . "<br>" . mysqli_error($conn);
			}
		}
		else{
			echo '<script language="javascript">
					alert("Primary key field cannot be empty")
				  </script>';
		}
	}
	
	// Update Query
	if(isset($_POST['update'])){
		$last_update=date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
		if($table == 'actor'){
			if(isset($_POST['actor_id']) ){
				$UpdateQuery = "UPDATE actor
								SET actor_id 			= '$_POST[actor_id]',
									first_name			= '$_POST[first_name]',
									last_name	 		= '$_POST[last_name]',	
									last_update 		= '$last_update'
								WHERE actor_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'address'){
			if(isset($_POST['address_id']) ){
				$UpdateQuery = "UPDATE address
								SET address_id 			= '$_POST[address_id]',
									address				= '$_POST[address]',
									district	 		= '$_POST[district]',	
									city_id	 			= '$_POST[city_id]',
									postal_code	 		= '$_POST[phone]',
									last_update 		= '$last_update'
								WHERE address_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'category'){
			if(isset($_POST['category_id']) ){
				$UpdateQuery = "UPDATE category
								SET category_id 		= '$_POST[category_id]',
									name				= '$_POST[name]',
									last_update 		= '$last_update'
								WHERE category_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'city'){
			if(isset($_POST['city_id']) ){
				$UpdateQuery = "UPDATE city
								SET city_id 		= '$_POST[city_id]',
									city			= '$_POST[city]',
									country_id		= '$_POST[country_id]',
									last_update 	= '$last_update'
								WHERE city_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'country'){
			if(isset($_POST['country_id']) ){
				$UpdateQuery = "UPDATE country
								SET country_id 		= '$_POST[country_id]',
									country			= '$_POST[country]',
									last_update 	= '$last_update'
								WHERE country_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'customer'){
			if(isset($_POST['customer_id']) ){
				$UpdateQuery = "UPDATE customer
								SET customer_id		= '$_POST[customer_id]',
									store_id		= '$_POST[store_id]',
									first_name		= '$_POST[first_name]',
									last_name		= '$_POST[last_name]',
									email			= '$_POST[email]',
									address_id		= '$_POST[address_id]',
									active			= '$_POST[active]',
									create_date		= '$_POST[create_date]',
									last_update 	= '$last_update'
								WHERE customer_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'film'){
			if(isset($_POST['film_id']) ){
				$UpdateQuery = "UPDATE film
								SET film_id 			= '$_POST[film_id]',
									title				= '$_POST[title]',
									description 		= '$_POST[description]',
									release_year 		= '$_POST[release_year]',
									language_id 		= '$_POST[language_id]',
									rental_duration		= '$_POST[rental_duration]',
									rental_rate			= '$_POST[rental_rate]',					
									length 				= '$_POST[length]',
									replacement_cost	= '$_POST[replacement_cost]',
									rating 				= '$_POST[rating]',
									special_features 	= '$_POST[special_features]',				
									last_update 		= '$last_update'
								WHERE film_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'film_actor'){
			if(isset($_POST['actor_id']) && isset($_POST['film_id']) ){
				$UpdateQuery = "UPDATE film_actor
								SET actor_id = '$_POST[actor_id]',
									film_id = '$_POST[film_id]',
									last_update = '$last_update'
								WHERE actor_id='$_POST[hidden1]' AND film_id='$_POST[hidden2]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'film_category'){
			if(isset($_POST['film_id']) && isset($_POST['category_id'])){
				$UpdateQuery = "UPDATE film_category
								SET film_id			= '$_POST[film_id]',
									category_id		= '$_POST[category_id]',
									last_update 	= '$last_update'
								WHERE film_id='$_POST[hidden1]' AND category_id='$_POST[hidden2]'" ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'inventory'){
			if(isset($_POST['inventory_id']) ){
				$UpdateQuery = "UPDATE inventory
								SET inventory_id	= '$_POST[inventory_id]',
									film_id			= '$_POST[film_id]',
									store_id		= '$_POST[store_id]',
									last_update 	= '$last_update'
								WHERE inventory_id='$_POST[hidden1]'" ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'language'){
			if(isset($_POST['language_id']) ){
				$UpdateQuery = "UPDATE language
								SET language_id		= '$_POST[language_id]',
									name			= '$_POST[name]',
									last_update 	= '$last_update'
								WHERE language_id='$_POST[hidden1]' " ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'payment'){
			if(isset($_POST['payment_id']) ){
				$UpdateQuery = "UPDATE payment
								SET payment_id		= '$_POST[payment_id]',
									customer_id		= '$_POST[customer_id]',
									staff_id		= '$_POST[staff_id]',
									rental_id		= '$_POST[rental_id]',
									amount 			= '$_POST[amount]',
									payment_date	= '$_POST[payment_date]',
									last_update 	= '$last_update'
								WHERE payment_id='$_POST[hidden1]'" ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'rental'){
			if(isset($_POST['rental_id']) ){
				$UpdateQuery = "UPDATE rental
								SET rental_id		= '$_POST[rental_id]',
									rental_date		= '$_POST[rental_date]',
									inventory_id	= '$_POST[customer_id]',
									customer_id		= '$_POST[customer_id]',
									return_date		= '$_POST[return_date]',					
									staff_id		= '$_POST[staff_id]',
									last_update 	= '$last_update'
								WHERE rental_id='$_POST[hidden1]'" ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'staff'){
			if(isset($_POST['staff_id']) ){
				$UpdateQuery = "UPDATE staff
								SET staff_id		= '$_POST[staff_id]',
									first_name		= '$_POST[first_name]',
									last_name		= '$_POST[last_name]',
									address_id		= '$_POST[address_id]',
									picture			= '$_POST[picture]',					
									email			= '$_POST[email]',
									store_id		= '$_POST[store_id]',
									active		 	= '$_POST[active]',
									username	 	= '$_POST[username]',
									password	 	= '$_POST[password]'
									last_update 	= '$last_update'
								WHERE staff_id='$_POST[hidden1]'" ;
			}
			else{
				$empty_pk = true;
			}
		}
		else if($table == 'store'){
			if(isset($_POST['store_id']) ){
				$UpdateQuery = "UPDATE store
								SET store_id		= '$_POST[store_id]',
									manager_staff_id= '$_POST[manager_staff_id]',
									address_id		= '$_POST[address_id]',
									last_update		= '$last_update'
								WHERE store_id='$_POST[hidden1]'" ;
			}
		}
		if(!$empty_pk){
			if (mysqli_query($conn, $UpdateQuery)) {
				echo '<script language="javascript">
						alert("Record updated successfully")
					  </script>';
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}
		else{
			echo '<script language="javascript">
					alert("Primary key field cannot be empty")
				  </script>';
		}
	}
	
	// Delete Query
	if(isset($_POST['delete'])){
		if($table == 'actor'){
			$DeleteQuery = "DELETE FROM actor 
							WHERE actor_id='$_POST[hidden1]' ";
		}
		else if($table == 'address'){
			$DeleteQuery = "DELETE FROM address 
							WHERE address_id='$_POST[hidden1]' ";
		}
		else if($table == 'category'){
			$DeleteQuery = "DELETE FROM category 
							WHERE category_id='$_POST[hidden1]' ";
		}
		else if($table == 'city'){
			$DeleteQuery = "DELETE FROM city 
							WHERE city_id='$_POST[hidden1]' ";
		}
		else if($table == 'country'){
			$DeleteQuery = "DELETE FROM country 
							WHERE country_id='$_POST[hidden1]' ";
		}
		else if($table == 'customer'){
			$DeleteQuery = "DELETE FROM customer 
							WHERE customer_id='$_POST[hidden1]' ";
		}
		else if($table == 'film'){
			$DeleteQuery = "DELETE FROM film 
							WHERE film_id='$_POST[hidden1]' ";
		}
		else if($table == 'film_actor'){
			$DeleteQuery = "DELETE FROM film_actor 
							WHERE actor_id='$_POST[hidden1]' AND film_id='$_POST[hidden2]'";
		}
		else if($table == 'film_category'){
			$DeleteQuery = "DELETE FROM film_category 
							WHERE film_id='$_POST[hidden1]' AND category_id='$_POST[hidden2]'" ;
		}
		else if($table == 'inventory'){
			$DeleteQuery = "DELETE FROM inventory 
							WHERE inventory_id='$_POST[hidden1]'" ;
		}
		else if($table == 'language'){
			$DeleteQuery = "DELETE FROM language
							WHERE language_id='$_POST[hidden1]'" ;
		}
		else if($table == 'payment'){
			$DeleteQuery = "DELETE FROM " . $table . " 
							WHERE payment_id='$_POST[hidden1]'" ;
		}
		else if($table == 'rental'){
			$DeleteQuery = "DELETE FROM rental 
							WHERE rental_id='$_POST[hidden1]'" ;
		}
		else if($table == 'staff'){
			$DeleteQuery = "DELETE FROM staff 
							WHERE staff_id='$_POST[hidden1]'" ;
		}
		else if($table == 'store'){
			$DeleteQuery = "DELETE FROM store 
							WHERE store_id='$_POST[hidden1]'" ;
		}
		
		if (mysqli_query($conn, $DeleteQuery)) {
			echo '<script language="javascript">
					alert("Record deleted successfully")
				  </script>';
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}
	
	// Refresh
	if(isset($_GET['table'])){
		if(isset($_GET['search1']) && isset($_GET['column1'])){
			$search1 = $_GET['search1'];
			$column1 = $_GET['column1'];
		}
		if(isset($search1) && isset($column1) && $search1 != '' && $column1 != ''){
			$sql="SELECT * FROM " . $table . " WHERE $column1 = '$search1'";
		}
		else{
			$sql="SELECT * FROM " . $table;
		}
		$result = mysqli_query($conn, $sql);
		$results_per_page = 20;
		$number_of_results = mysqli_num_rows($result);
		$number_of_pages = ceil($number_of_results/$results_per_page);
		if (!isset($_GET['page'])) {
		  $page = 1;
		} else {
		  $page = $_GET['page'];
		}
		$this_page_first_result = ($page-1)*$results_per_page;
		if(isset($search1) && isset($column1) && $search1 != '' && $column1 != ''){
			$sql="SELECT * FROM " . $table . " WHERE $column1 = '$search1' LIMIT " . $this_page_first_result . ',' .  $results_per_page;
		}
		else{
			$sql="SELECT * FROM " . $table . " LIMIT " . $this_page_first_result . ',' .  $results_per_page;
		}
		$result = mysqli_query($conn, $sql);
		
		// Output of refresh		
		if (mysqli_num_rows($result) > 0) {
			
			//scroll container start
			echo '<div id = "scroll-container">';
			
			if($table == 'actor'){
				echo "<table id=t01><tr><th>Actor ID</th><th>First Name</th><th>Last Name</th><th>Last Update</th></tr>";
			}
			else if($table == 'address'){
				echo "<table id=t01><tr><th>Address ID</th><th>Address</th><th>District</th><th>City ID</th><th>Postal Code</th><th>Phone</th><th>Last Update</th></tr>";
			}
			else if($table == 'category'){
				echo "<table id=t01><tr><th>Category ID</th><th>Name</th><th>Last Update</th></tr>";
			}
			else if($table == 'city'){
				echo "<table id=t01><tr><th>City ID</th><th>City</th><th>Country ID</th><th>Last Update</th></tr>";
			}
			else if($table == 'country'){
				echo "<table id=t01><tr><th>Country ID</th><th>Country</th><th>Last Update</th></tr>";
			}
			else if($table == 'customer'){
				echo "<table id=t01><tr><th>Customer ID</th><th>Store ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Address ID</th><th>Active</th><th>Create Date</th><th>Last Update</th></tr>";
			}
			else if($table == 'film'){
				echo "<table id=t01><tr><th>Film ID</th><th>Title</th><th>Description</th><th>Release Year</th><th>Language ID</th><th>Rental Duration</th><th>Rental Rate</th><th>Length</th><th>Replacement</th><th>Rating</th><th>Special Features</th><th>Last Update</th></tr>";
			}
			else if($table == 'film_actor'){
				echo "<table id=t01><tr><th>Actor ID</th><th>Film ID</th><th>Last Update</th></tr>";
			}
			else if($table == 'film_category'){
				echo "<table id=t01><tr><th>Film ID</th><th>Category ID</th><th>Last Update</th></tr>";
			}
			else if($table == 'inventory'){
				echo "<table id=t01><tr><th>Inventory ID</th><th>Film ID</th><th>Store ID</th><th>Last Update</th></tr>";
			}
			else if($table == 'language'){
				echo "<table id=t01><tr><th>Language ID</th><th>Name</th><th>Last Update</th></tr>";
			}
			else if($table == 'payment'){
				echo "<table id=t01><tr><th>Payment ID</th><th>Customer ID</th><th>Staff ID</th><th>Rental ID</th><th>Amount</th><th>Payment ID</th><th>Last Update</th></tr>";
			}
			else if($table == 'rental'){
				echo "<table id=t01><tr><th>Rental ID</th><th>Rental Date</th><th>Inventory ID</th><th>Customer ID</th><th>Return Date</th><th>Staff ID</th><th>Last Update</th></tr>";
			}
			else if($table == 'staff'){
				echo "<table id=t01><tr><th>Staff ID</th><th>First Name</th><th>Last Name</th><th>Address ID</th><th>Picture</th><th>Email</th><th>Store ID</th><th>Active</th><th>Username</th><th>Password</th><th>Last Update</th></tr>";
			}
			else if($table == 'store'){
				echo "<table id=t01><tr><th>Store ID</th><th>Manager Staff ID</th><th>Address ID</th><th>Last Update</th></tr>";
			}
			
			// Output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo '<form action="index.php?table=' . $table . '" method="post">';
				echo "<tr>";
				
				if($table == 'actor'){
					echo "<td>"	. "<input class=button_e type=text name=actor_id 		value='".$row['actor_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=first_name 		value='".$row['first_name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_name 		value='".$row['last_name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['actor_id']. "' </td>";
				}
				else if($table == 'address'){
					echo "<td>"	. "<input class=button_e type=text name=address_id 			value='".$row['address_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=address 			value='".$row['address']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=district 			value='".$row['district']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=city_id		 		value='".$row['city_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=postal_code		 	value='".$row['postal_code']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=phone		 		value='".$row['phone']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
				
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['address_id']. "' </td>";
				}
				else if($table == 'category'){
					echo "<td>"	. "<input class=button_e type=text name=category_id 		value='".$row['category_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=name 				value='".$row['name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update 		value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['category_id']. "' </td>";
				}
				else if($table == 'city'){
					echo "<td>"	. "<input class=button_e type=text name=city_id 		value='".$row['city_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=city 			value='".$row['city']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=country_id 		value='".$row['country_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['city_id']. "' </td>";
				}
				else if($table == 'country'){
					echo "<td>"	. "<input class=button_e type=text name=country_id 		value='".$row['country_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=country			value='".$row['country']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['country_id']. "' </td>";
				}
				else if($table == 'customer'){
					echo "<td>"	. "<input class=button_e type=text name=customer_id 		value='".$row['customer_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=store_id			value='".$row['store_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=first_name			value='".$row['first_name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_name			value='".$row['last_name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=email				value='".$row['email']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=address_id			value='".$row['address_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=active				value='".$row['active']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=create_date			value='".$row['create_date']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['customer_id']. "' </td>";
				}
				else if($table == 'film'){
					echo "<td>"	. "<input class=button_e type=text name=film_id 			value='".$row['film_id']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=title 				value='".$row['title']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=description 		value='".$row['description']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=release_year 		value='".$row['release_year']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=language_id	 		value='".$row['language_id']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=rental_duration 	value='".$row['rental_duration']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=rental_rate 		value='".$row['rental_rate']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=length 				value='".$row['length']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=replacement_cost 	value='".$row['replacement_cost']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=rating 				value='".$row['rating']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=special_features 	value='".$row['special_features']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update 		value='".$row['last_update']." '</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['film_id']. "' </td>";
				}
				else if($table == 'film_actor'){
					echo "<td>"	. "<input class=button_e type=text name=actor_id value='".$row['actor_id']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=film_id value='".$row['film_id']." '</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update value='".$row['last_update']." '</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['actor_id']. "' </td>";
					echo "<td>"	. "<input type=hidden name=hidden2 value='".$row['film_id']. "' </td>";
				}
				else if($table == 'film_category'){
					echo "<td>"	. "<input class=button_e type=text name=film_id 			value='".$row['film_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=category_id			value='".$row['category_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['film_id']. "' </td>";
					echo "<td>"	. "<input type=hidden name=hidden2 value='".$row['category_id']. "' </td>";
				}
				else if($table == 'inventory'){
					echo "<td>"	. "<input class=button_e type=text name=inventory_id 		value='".$row['inventory_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=film_id				value='".$row['film_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=store_id			value='".$row['store_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['inventory_id']. "' </td>";
				}
				else if($table == 'language'){
					echo "<td>"	. "<input class=button_e type=text name=language_id 		value='".$row['language_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=name				value='".$row['name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['language_id']. "' </td>";
				}
				else if($table == 'payment'){
					echo "<td>"	. "<input class=button_e type=text name=payment_id 			value='".$row['payment_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=customer_id			value='".$row['customer_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=staff_id			value='".$row['staff_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=rental_id			value='".$row['rental_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=amount				value='".$row['amount']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=payment_date		value='".$row['payment_date']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['payment_id']. "' </td>";
				}
				else if($table == 'rental'){
					echo "<td>"	. "<input class=button_e type=text name=rental_id 			value='".$row['rental_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=rental_date			value='".$row['rental_date']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=inventory_id		value='".$row['inventory_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=customer_id			value='".$row['customer_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=return_date			value='".$row['return_date']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=staff_id			value='".$row['staff_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['rental_id']. "' </td>";
				}
				else if($table == 'staff'){
					echo "<td>"	. "<input class=button_e type=text name=staff_id 			value='".$row['staff_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=first_name			value='".$row['first_name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_name			value='".$row['last_name']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=address_id			value='".$row['address_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=picture				value='".$row['picture']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=email				value='".$row['email']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=store_id			value='".$row['store_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=active				value='".$row['active']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=username			value='".$row['username']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=password			value='".$row['password']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update		 	value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['staff_id']. "' </td>";
				}
				else if($table == 'store'){
					echo "<td>"	. "<input class=button_e type=text name=store_id 			value='".$row['store_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=manager_staff_id	value='".$row['manager_staff_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=address_id			value='".$row['address_id']."'</td>";
					echo "<td>"	. "<input class=button_e type=text name=last_update			value='".$row['last_update']."'</td>";
					
					// Hidden Primary Keys for Update and Delete
					echo "<td>"	. "<input type=hidden name=hidden1 value='".$row['store_id']. "' </td>";
				}
				
				echo "<td>" . "<input class=button_d style='width: 80px; margin:0px;'; type=submit name=update value=Update>" . " </td>";
				echo "<td>" . "<input class=button_d style='width: 80px; margin:0px;'; type=submit name=delete value=Delete>" . " </td>";
				echo "</tr>";
				echo "</form>";
			}
			echo "</table><br>";
			
			//scroll container end
			echo '</div>';

			// Pagination
			$prev = $page - 1;
			$next = $page + 1;
			
			$currentpage = $page;
			//First and Previous buttons
			echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . '1' . '">' ."<button class=button_d>First Page</button>" .'</a>';
			if($currentpage > 1){
				echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $prev . '">' ."<button class=button_d>Previous</button>" .'</a>';
			}
			
			//Page number buttons	
			if($currentpage<=3){
				for ($page=1;$page<=7;$page++) {
					// if page==numberofpages, change colour
					if($page>=1){
						if($page==$currentpage){
							echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $page . '">' . '<button style="margin: 3px" class=button_c>' . $page . '</button>' . '</a>';
						}
						else if ($page > 0 && $page <= $number_of_pages){
							echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $page . '">' . '<button class=button_d>' . $page . '</button>' . '</a>';
						}				
					}
				}	
			}
			else if($currentpage > $number_of_pages - 3){
				for($page = $number_of_pages - 6; $page <= $number_of_pages; $page++){
					// if page==numberofpages, change colour
					if($page>=1){
						if($page==$currentpage){
							echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $page . '">' . '<button style="margin: 3px" class=button_c>' . $page . '</button>' . '</a>';
						}
						else if ($page > 0 && $page <= $number_of_pages){
							echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $page . '">' . '<button class=button_d>' . $page . '</button>' . '</a>';
						}				
					}
				}
			}
			else{	
				for ($page=$currentpage-3;$page<=$currentpage+3;$page++) {
					// if page==numberofpages, change colour
					if($page>=1){
						if($page==$currentpage){
							echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $page . '">' . '<button style="margin: 3px" class=button_c>' . $page . '</button>' .'</a>';
						}
						else if ($page > 0 && $page <= $number_of_pages){
							echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $page . '">' . '<button class=button_d>' . $page . '</button>' .'</a>';
						}
					
					}
				}
			}
			
			//Next and Last buttons
			if($currentpage < $number_of_pages){
				echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $next . '">' ."<button class=button_d>Next</button>" .'</a>';
			}
			echo '<a href="index.php?table=' . $table . '&column1=' . $column1 . '&search1=' . $search1 . '&page=' . $number_of_pages . '">' ."<button class=button_d	>Last Page</button>" .'</a>';
			
		} else {
			echo "0 results!";
		}
	}
}
mysqli_close($conn);

?>

</div>
</body>
