<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Search Results</title>
		<link rel="stylesheet" href="styles.css">
		<link rel="icon" href="res/ecomIcon.png" />
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
		<script src="bower_components/jquery/dist/jquery.js"></script>
		<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
	</head>
	<body>
		<img src="res/ecom.jpg" class="background image-responsive"/>
		<nav id="topBar" class="navbar navbar-light bg-primary navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<div class="navbar-brand">Vendor Connect</div>
				</div>
			</div>
		</nav>
		<div class="container" id="body">
			<div class="well" style="background-color:rgba(76,76,166,0.1);border-radius:30px;padding:30px;color:transparent;border:transparent;height:100px;margin-top:15%">
				<div class="row">
					<form method="post" action="result.php">
						<!-- The actual drop down list for categories in the back end -->
						<select id="selectCat" name="maincategory" class="hidden">
							<option>ALL</option>
							<option>Football</option>
							<option>Cricket</option>
						</select>
						<!-- The actual drop down list for sub categories in the back end -->
						<select id="selectSubCat" name="subcategory" class="hidden">
							<option>ALL</option>
							<!-- <option>From database</option>
							<option>fRom database</option> -->
						</select>		     
						<!-- The submit Button -->
			     		<input type="submit" id="submit-form" class="hidden" />
					</form>

					<!-- The coooool looking button to select  a category -->
					<button class="btn btn-default col-xs-2" id="catSelect"">--Category--</button>
					<div class="col-xs-3" id="catList" style="display:none">
						<div class="btn btn-group-vertical btn-block">
								<button class="cat btn btn-primary">--ALL--</button>
								<button class="cat btn btn-primary">Football</button>
								<button class="cat btn btn-primary">Cricket</button>
						</div>
					</div>

					<!-- The same cooooool looking button to select a sub category -->
					<div class="col-xs-3" id="subCatList" style="display:none">
						<div class="btn btn-group-vertical btn-block">
								<button class="subcat btn btn-primary">--ALL--</button>
							<!-- 	<button class="subcat btn btn-primary">From database</button>
								<button class="subcat btn btn-primary">fRom database</button> -->
						</div>
					</div>
					<button class="btn btn-default col-xs-2" id="subCatSelect" style="display:none">--Sub-Category--</button>

					<!-- The Submit button for the form -->
					<label type="button" class="btn btn-primary col-xs-2" for="submit-form"> <span class="glyphicon glyphicon-search"></span> Search</label>
				</div>
			</div>
		</div>
		<?php		
			$conn = new mysqli("localhost","root","","project") or die("Could not connect to the database");
			if( $_POST['maincategory'] == "ALL")
				$sql = "select path , ProductName ,SubcategoryName from table_productlisting";
			elseif( $_POST['subcategory'] == "ALL")
				$sql = "select pl.path,pl.ProductName,pl.SubcategoryName from table_productlisting pl,table_subcategory sb where CategoryName='".$_POST['maincategory']."' and pl.SubcategoryName=sb.SubcategoryName";
			else
				$sql = "select path,productName,SubcategoryName from table_productlisting where subcategoryname='".$_POST['subcategory']."'";
			$exe = mysqli_query($conn, $sql) or die("query not executed");

			$found=0;
			echo "<div id='result' class='container text-center'>";
				while ( $row = $exe -> fetch_array()){
						$found=1;
						echo "
						<div class='col-xs-3' style='border-radius:30px'>
						<div class='panel panel-primary'>
							<div class='panel-heading'><h4><b>".$row[2]."</b></h4></div>
							<div class='panel-body'>
								<center><img src='".$row[0]."' class='img-responsive img-rounded' style=\"width:70%\" alt='error loading image' /></center>
								<h4 class='panel-footer panel-primary'>".$row[1]."</h4>
							</div>
						</div>
						</div>";
				}
				if($found==0)
					echo "<div class='col-xs-12 text-center' style='background-color:rgba(70,80,90,0.89);border-radius:10px'><h3 style='color:white;padding:10px'><b>No Results Found</b></h3></div>";
			echo "</div>";
		?>
		<script src="behaviour.js"></script>
		<script type="text/javascript">
		$(function(){
				var newMargin=-$("nav").height();
				$(".navbar-header").fadeOut(1000);
				$("nav").css('opacity','0.8');
				$("nav").css('z-index','-1');
				$(".well").css('z-index','3');
				$(".well").animate({
					marginTop:newMargin
				},1200);
				$("#result").hide();
				// $("#result").fadeIn(1200);
				$("#result").animate({
					height:'toggle',
					width:'toggle',
					opacity:'toggle',
				},1200);
		});
		</script>
		<script src="updateList.js"></script>
	</body>
</html>
