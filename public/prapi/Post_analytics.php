<?php  
include "include/connect.php";  
 @$defaultLanguage = $_SESSION['language'];
 @$geographyId = BlockSQLInjection($_POST['areaId']); 
 @$areaid = BlockSQLInjection($_POST['areaRecord']);
 //echo $geographyId;
 //echo $areaid;
if($areaid != ''){  
$index = $areaid;
$length = strlen($index);

if($length == 2)
{
	$x = str_split($index);
	 $codeLebal = $x[0];
	 $actualareaId = $x[1];
	 //echo $actualareaId;
}
if($length == 4)
{
	$x = str_split($index);
	$codeLebal = $x[0]."".$x[1]."".$x[2];
	$actualareaId = $x[3];
	//echo $actualareaId;
}
}
 
 @$Datefrom = BlockSQLInjection($_POST['selectmonthfrom']);
 //echo $Datefrom;
  @$Dateto = BlockSQLInjection($_POST['selectmonthto']);
  //echo @$Dateto;
  @$ActionDatefrom = BlockSQLInjection($_POST['selectActionmonthfrom']);
  @$ActionDateto = BlockSQLInjection($_POST['selectActionmonthto']);
/*  if($Datefrom == '')
 {
	
	$Datefrom =  date("d-m-Y"); 
	//echo $Datefrom;
	@$SearchDateFrom = $Datefrom;
	/* @$g=split("-",$Datefrom);
	@$date = $g[0];
	@$month =  $g[1];
	@$year =  $g[2];
	$numberOfDatefrom = @cal_days_in_month(CAL_GREGORIAN, $date, $month, $year); 
	echo $numberOfDatefrom;  
	
 } 
 if($Datefrom != '')
 {
	 $PushDate = '1';
	//echo $Datefrom;
	// echo $PushDate;
	@$SearchDateFrom = $Datefrom;
	/* @$g=split("-",$Datefrom);
	@$date = $g[0];
	@$month =  $g[1];
	@$year =  $g[2];
	$numberOfDatefrom = @cal_days_in_month(CAL_GREGORIAN, $date, $month, $year);
		echo $numberOfDatefrom; 
 } */
/*  if($Dateto == '')
 {
	$Dateto =  date("d-m-Y"); 
	//@$SearchDateto = $Dateto;
	/* @$g=split("-",$Dateto);
	@$date = $g[0];
	@$month =  $g[1];
	@$year =  $g[2];
	$numberOfDateto = @cal_days_in_month(CAL_GREGORIAN, $date, $month, $year);
		echo $numberOfDateto; 
 }

 
 if($ActionDateto == '')
 {
	$ActionDateto =  date("d-m-Y"); 
	//echo $ActionDateto;
	@$ActionDateto = $ActionDateto;
	/* @$g=split("-",$Dateto);
	@$date = $g[0];
	@$month =  $g[1];
	@$year =  $g[2];
	$numberOfDateto = @cal_days_in_month(CAL_GREGORIAN, $date, $month, $year);
		echo $numberOfDateto; 
 } */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta information -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<!-- End Meta information -->
	
<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
 <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
	<!-- Title-->
	<title>User</title>
	<!-- End Title-->
	<style>
	.hd{
		
		display:none;
	}
		.label-container
		{
			position:fixed;
			bottom:48px;
			right:105px;
			display:table;
			visibility: hidden;
		}

		.label-text
		{
			color:#FFF;
			background:rgba(51,51,51,0.5);
			display:table-cell;
			vertical-align:middle;
			padding:10px;
			border-radius:8px;
		}
		.label-arrow
		{
			display:table-cell;
			vertical-align:middle;
			color:#333;
			opacity:0.5;
		}
		.myfloatfont
		{
			font-family: "Open Sans", Arial, sans-serif;
		}

		.float
		{
			position: fixed;
			width: 80px;
			height: 50px;
			bottom: 10px;
			right: 10px;
			z-index: 888888888;
			background-color: #0EB2A3;
			color: #FFF;
			border-radius: 100px;
			text-align: center;
			box-shadow: 2px 2px 3px #999;
		}

		.my-float
		{
			font-size: 16px;
			margin-top: 18px;
		}

		a.float + div.label-container 
		{
		  visibility: hidden;
		  opacity: 0;
		  transition: visibility 0s, opacity 0.5s ease;
		}
		a.float:hover + div.label-container
		{
		  visibility: visible;
		  opacity: 1;
		  color: #FFF;
		}
	</style>
	<script>
/* 	$('.date').each(function () {
   var maxDate = getDateYymmdd($(this).data("val-rangedate-max"));
   $(this).datepicker({
         dateFormat: "dd-mm-yy", 
         minDate: 0,
         maxDate: maxDate
   });
}); */
	</script>
	<script>
	$("#ImageButton").MonthPicker({
    Button: '<img class="icon" src="//rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/images/icon.gif" />'
});
	</script>

	
	<script type="text/javascript">
    var p = jQuery.noConflict()
	
	function load_options(id){
		document.getElementById("langId").value = id;
	 
	}
	</script>
	
	<script type="text/javascript">
    var p = jQuery.noConflict()
	
	function load_options(id,index){ 
		var defaultLanguageId = document.getElementById('defaultLanguage').value;
		if(defaultLanguageId == 1 && id == 1)
		{
			var text = document.getElementById('countryLebalInEnglish').value;
			document.getElementById('areaText').innerText = text;
		}
		else if(defaultLanguageId == 2 && id == 1)
		{
			var text = document.getElementById('countryLebalInUnicode').value;
			document.getElementById('areaText').innerText = text;
		}
		else if(defaultLanguageId == 1 && id == 2)
		{
			var text = document.getElementById('cityLebalInEnglish').value;
			document.getElementById('areaText').innerText = text;
		}
		else if(defaultLanguageId == 2 && id == 2)
		{
			var text = document.getElementById('cityLebalInUnicode').value;
			document.getElementById('areaText').innerText = text;
		}
		else if(defaultLanguageId == 1 && id == 3)
		{
			var text = document.getElementById('regionLebalInEnglish').value;
			document.getElementById('areaText').innerText = text;
		}
		else if(defaultLanguageId == 2 && id == 3)
		{
			var text = document.getElementById('regionLebalInUnicode').value;
			document.getElementById('areaText').innerText = text;
		} 
		var empid = document.getElementById('empId').value;  
		var langId = document.getElementById('langId').value;  
		$.ajax({
			url: "displayAreaDataAnalytics.php?index="+index+"&id="+id+"&empid="+empid+"&langId="+langId,
			complete: function(){$("#loading1").hide();},
			success: function(data) { 
				$("#"+index).html(data);
			}
		})
	}
	
	
	$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
	</script>
	 
     
</head>
<body class="leftMenu nav-collapse in">
	 
	<div id="wrapper">
		<!-- Header -->
		<?php include "header.php"; ?>
		<!-- End Header -->
		
		<!-- User List -->
		<div id="main">
			<ol class="breadcrumb">		
				<li><a href="#">Analytics</a></li>		
			</ol>
			<div id="content">
				<div class="row">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
					<input type="hidden" class="form-control" id="empId" name="empId" value="<?php echo $_SESSION['EMP_ID'];  ?>">
					<input type="hidden" class="form-control" id="langId" name="langId" value="<?php echo $defaultLanguage;  ?>"> 
					<div class="col-md-1">  
						<h4>
							<?php 
							
							$sqlQueryRegion= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from makerlebal where labelInEnglish='Geography'"));
							if($defaultLanguage == 1) 
							{ 
								echo $sqlQueryRegion['labelInEnglish']; 
							} 
							else if($defaultLanguage == 2) 
							{ 
								echo $sqlQueryRegion['labelInUnicode']; 
							} 
							?>
						</h4>
						<div class="form-group text-left" style="margin-top:10px;" > 
							<select data-live-search="true" class="form-control selectpicker contantLanguage"  id="areaId" name="areaId" onChange="load_options(this.value,'areaRecord');" >
								<option  value=""  >
								<?php 
								$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Select'"));
								if($defaultLanguage == 1) 
								{ 
									echo $sqlQuerySelect['labelInEnglish']; 
								} 
								else if($defaultLanguage == 2) 
								{ 
									echo $sqlQuerySelect['labelInUnicode']; 
								} 
								?>
							
								</option>
								
								<option value="1" <?php if(@$geographyId == 1) { ?> Selected="selected" <?php } ?> >
								<?php 
								$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Country'"));
								if($defaultLanguage == 1) 
								{ 
									echo $sqlQuerySelect['labelInEnglish']; 
								} 
								else if($defaultLanguage == 2) 
								{ 
									echo $sqlQuerySelect['labelInUnicode']; 
								} 
								?> 
								</option>
								<option value="2" <?php if(@$geographyId == 2) { ?> Selected="selected" <?php } ?> >
								<?php 
								$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='City'"));
								if($defaultLanguage == 1) 
								{ 
									echo $sqlQuerySelect['labelInEnglish']; 
								} 
								else if($defaultLanguage == 2) 
								{ 
									echo $sqlQuerySelect['labelInUnicode']; 
								} 
								?>
								</option>
								<option value="3" <?php if(@$geographyId == 3) { ?> Selected="selected" <?php } ?> >
								<?php 
								$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Region'"));
								if($defaultLanguage == 1) 
								{ 
									echo $sqlQuerySelect['labelInEnglish']; 
								} 
								else if($defaultLanguage == 2) 
								{ 
									echo $sqlQuerySelect['labelInUnicode']; 
								} 
								?>
								</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<input type="hidden" id="defaultLanguage" value="<?php echo $defaultLanguage; ?>">
						
						<?php 
							$sqlQueryCountry= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Country'"));	
						?>
						<input type="hidden" id="countryLebalInEnglish" value="<?php echo $sqlQueryCountry['labelInEnglish']; ?>">
						<input type="hidden" id="countryLebalInUnicode" value="<?php echo $sqlQueryCountry['labelInUnicode']; ?>">
						
						<?php 
							$sqlQueryCity= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='City'"));	
						?>
						<input type="hidden" id="cityLebalInEnglish" value="<?php echo $sqlQueryCity['labelInEnglish']; ?>">
						<input type="hidden" id="cityLebalInUnicode" value="<?php echo $sqlQueryCity['labelInUnicode']; ?>">
						
						<?php 
							$sqlQueryRegion= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Region'"));	
						?>
						<input type="hidden" id="regionLebalInEnglish" value="<?php echo $sqlQueryRegion['labelInEnglish']; ?>">
						<input type="hidden" id="regionLebalInUnicode" value="<?php echo $sqlQueryRegion['labelInUnicode']; ?>">
						<h4 id="areaText">
							<?php 
								$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Select'"));
								if($defaultLanguage == 1) 
								{ 
									echo $sqlQuerySelect['labelInEnglish']; 
								} 
								else if($defaultLanguage == 2) 
								{ 
									echo $sqlQuerySelect['labelInUnicode']; 
								} 
							?>
						</h4>
						<div class="form-group text-left " style="margin-top:10px;" > 
							<select data-live-search="true" class="form-control " id="areaRecord" name="areaRecord" >
								<option  value=" ">
								<?php 
								$sqlQuerySelect1= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Select'"));
								if($defaultLanguage == 1) 
								{ 
									echo $sqlQuerySelect1['labelInEnglish']; 
								} 
								else if($defaultLanguage == 2) 
								{ 
									echo $sqlQuerySelect1['labelInUnicode']; 
								} 
								//echo $areaid;
								?>
								</option>
								<?php if($areaid != ''){  
								 
								$index = $areaid;
								$length = strlen($index);
								
								if($length == 2)
								{
									$x = str_split($index);
									 $codeLebal = $x[0];
									 $actualareaId = $x[1];
									 echo $actualareaId;
								}
								if($length == 4)
								{
									$x = str_split($index);
									$codeLebal = $x[0]."".$x[1]."".$x[2];
									$actualareaId = $x[3];
									echo $actualareaId;
								}

								if($codeLebal == 'c')
								{	
								
									$sqlCity= mysqli_query($dbconnect, "select * from mcity where cityCode = '$index'"); 
									while($displayCity = mysqli_fetch_assoc($sqlCity)) 
									{	 
									?>
									<?php if($defaultLanguage == 1) { ?>
									<option value="<?php echo $displayCity['cityId']; ?>" selected="selected"><?php echo $displayCity['citynameInEnglish']; ?></option>
									<?php } else if($defaultLanguage == 2) { ?>
									<option value="<?php echo $displayCity['cityId']; ?>" selected="selected"><?php echo $displayCity['citynameInUnicode']; ?></option>
									<?php } } 
									
								}
								else if($codeLebal == 'r')
								{
									 
									$sqlRegion= mysqli_query($dbconnect, "select * from mregion where regionCode = '$index'"); 
									while($sqlRegion = mysqli_fetch_assoc($sqlRegion)) 
									{	 
									?>
									<?php if($defaultLanguage == 1) { ?>
									<option value="<?php echo $sqlRegion['regionId']; ?>" selected="selected"><?php echo $sqlRegion['regionnameInEnglish']; ?></option>
									<?php } else if($defaultLanguage == 2) { ?>
									<option value="<?php echo $sqlRegion['regionId']; ?>" selected="selected"><?php echo $sqlRegion['regionnameInUnicode']; ?></option>
									<?php } }
								}
								else if($codeLebal == 'CON')
								{
									 
									$sqlCountry= mysqli_query($dbconnect, "select * from mcountry where countryCode = '$index'"); 
									while($displayCountry = mysqli_fetch_assoc($sqlCountry)) 
									{	 
									?>
									<?php if($defaultLanguage == 1) { ?>
									<option value="<?php echo $displayCountry['countryId']; ?>" selected="selected"><?php echo $displayCountry['countryNameInEnglish']; ?></option>
									<?php } else if($defaultLanguage == 2) { ?>
									<option value="<?php echo $displayCountry['countryId']; ?>" selected="selected"><?php echo $displayCountry['countryNameInUnicode']; ?></option>
									<?php } }
								}
									 
								?>						
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: -18px;">
					<input type="checkbox" id="Post_Date" onclick="enable_text(this.checked)" <?php if($Datefrom != null){ echo "checked"; }?> />
					<span><strong>Post</strong></span>
					<div id="post_date" class="disabled" >
						<div class="col-md-6 ">
							<h5>
								<?php 
									$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Date From'"));
									if($defaultLanguage == 1) 
									{ 
										echo $sqlQuerySelect['labelInEnglish']; 
									} 
									else if($defaultLanguage == 2) 
									{ 
										echo $sqlQuerySelect['labelInUnicode']; 
									} 
								?>
							</h5>
							<div class="form-group"  style="margin-top:10px;" >
								<div id="datepicker" class="input-group date" >
									<input class="form-control" type="text" id="selectmonthfrom" name="selectmonthfrom" value="<?php if( $Datefrom != null ){echo @$Datefrom;} ?>" disabled="disabled" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h5>
								<?php 
									$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Date To'"));
									if($defaultLanguage == 1) 
									{ 
										echo $sqlQuerySelect['labelInEnglish']; 
									} 
									else if($defaultLanguage == 2) 
									{ 
										echo $sqlQuerySelect['labelInUnicode']; 
									} 
								?>
							</h5>
							<div class="form-group"  style="margin-top:10px;" >
								<div id="datepicker1" class="input-group date" >
									<input class="form-control" type="text" id="selectmonthto" name="selectmonthto" onchange="return datevalidate();" value="<?php if( $Dateto != null ){echo $Dateto;} ?>" disabled="disabled" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: -18px;">
					
					<input type="checkbox" id="Action_Date" onclick="enable_text(this.checked)" <?php if($ActionDatefrom != null){ echo "checked"; }?> />
					
					<span><strong>Action</strong></span>

					<div id="Action_Date">
						<div class="col-md-6 ">
							<h5>
								<?php 
									$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Date From'"));
									if($defaultLanguage == 1) 
									{ 
										echo $sqlQuerySelect['labelInEnglish']; 
									} 
									else if($defaultLanguage == 2) 
									{ 
										echo $sqlQuerySelect['labelInUnicode']; 
									} 
								?>
							</h5>
							<div class="form-group"  style="margin-top:10px;" >
								<div id="datepicker2" class="input-group date" >
									<input class="form-control" type="text" id="selectActionmonthfrom" name="selectActionmonthfrom" value="<?php if( $ActionDatefrom != null ){echo $ActionDatefrom;} ?>" disabled="disabled" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h5>
								<?php 
									$sqlQuerySelect= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from  makerlebal where labelInEnglish='Date To'"));
									if($defaultLanguage == 1) 
									{ 
										echo $sqlQuerySelect['labelInEnglish']; 
									} 
									else if($defaultLanguage == 2) 
									{ 
										echo $sqlQuerySelect['labelInUnicode']; 
									} 
								?>
							</h5>
							<div class="form-group"  style="margin-top:10px;" >
								<div id="datepicker3" class="input-group date" >
									<input class="form-control" type="text" id="selectActionmonthto" name="selectActionmonthto" value="<?php if( $ActionDateto != null ){echo @$ActionDateto;}?>" onchange="return Actiondatevalidate();" disabled="disabled" />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
					</div>

					
					</div>
					<div class="col-md-1" style="margin-top: 27px;">
					
							<button type="submit" style="margin-right:20px; " class="pull-right btn btn-theme-inverse btn-md" >
								Search
							</button>
						
						<!--<div class="col-md-6" >
							<a href="PostAnalyticReport.php?areaId=<?php echo $geographyId; ?>&areaRecord=<?php echo $areaid;?>&selectmonthfrom=<?php echo $Datefrom; ?>&selectmonthto=<?php echo $Dateto; ?>&selectActionmonthfrom=<?php echo$ActionDatefrom; ?>&selectActionmonthto=<?php echo $ActionDateto; ?>" class="fa fa-file-excel-o" style="font-size: 50px;margin-top:20px;" ></a>
						</div>  --->
					</div>
					</form>
				</div>
				<table id="datatable-default" class="display nowrap" cellspacing="0">
					<thead>
						<tr>
							<th class="text-left">Sr. No.</th>
							<th class="text-center">Post Id</th>
							<th class="text-center">Post Date</th>
							<th class="text-center">Geography</th>
							<th class="text-center">Post Title</th>
							<th class="text-center">Comment</th>
							<th class="text-center">Comment By</th>
							<th class="text-center">Liked By</th>
							<th class="text-center">Action Date</th>
							<th class="text-center">Mobile No.</th>
							<th class="text-center">Region</th>
							<th class="text-center">Country</th>	
						</tr>
					</thead>
					<tbody>
					<?php
					if($geographyId != '' and $areaid != '' and $Datefrom != '' and $ActionDatefrom != '')
					{
						//echo "1";
				
						
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') AND STR_TO_DATE(cm.commentDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') AND STR_TO_DATE(cl.likeDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION
						select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId 
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode 
						where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y')  
						ORDER BY postId DESC");


					}
					
					else if($geographyId != '' and $Datefrom != '')
					{
						//echo "3";
						
					
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE cgm.geographyId = '$geographyId'  AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId 
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode 
						where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y')  
						ORDER BY postId DESC");

					}
					else if($geographyId != '' and $ActionDatefrom != '')
					{
						//echo "4";
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(cm.commentDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId' AND STR_TO_DATE(cl.likeDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId 
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and cgm.geographyId = '$geographyId' AND cgm.areaId ='$actualareaId'  
						ORDER BY postId DESC");

					}
					else if($geographyId != '' and $areaid != '')
					{
						//echo "2";

						
					
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE cgm.geographyId = '$geographyId' and cgm.areaId ='$actualareaId' and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE cgm.geographyId = '$geographyId' and cgm.areaId ='$actualareaId' and c.finalStatus ='approved'
						UNION
						select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId 
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode 
						where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and cgm.geographyId = '$geographyId' and cgm.areaId ='$actualareaId'  
						ORDER BY postId DESC");


					}

					else if ($Datefrom != '' and $ActionDatefrom != '')
					{
						//echo "5";
						
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') AND STR_TO_DATE(cm.commentDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') AND STR_TO_DATE(cl.likeDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId 
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y')  
						ORDER BY postId DESC");
						
						
						

					}
					else if($geographyId != '')
					{
						//echo "6";
				
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE cgm.geographyId = '$geographyId' and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE cgm.geographyId = '$geographyId' and c.finalStatus ='approved'
						UNION select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId 
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and cgm.geographyId = '$geographyId' 
						ORDER BY postId DESC");
						
					}
					
					
					else if($Datefrom != '')
					{
						//echo "7";

						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile FROM chitti as c inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved' and STR_TO_DATE(c.approveDate, '%d-%m-%Y') between STR_TO_DATE('$Datefrom', '%d-%m-%Y') and STR_TO_DATE('$Dateto', '%d-%m-%Y')
						ORDER BY postId DESC");
						
					}
					else if($ActionDatefrom != '')
					{
						//echo "8";
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						inner join msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						inner join userCity as ucty on msl.userCityId = ucty.cityId
						WHERE STR_TO_DATE(cm.commentDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved'
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
				left join userCity as ucty on msl.userCityId = ucty.cityId  
						WHERE STR_TO_DATE(cl.likeDate, '%d-%m-%Y') between STR_TO_DATE('$ActionDatefrom', '%d-%m-%Y') and STR_TO_DATE('$ActionDateto', '%d-%m-%Y') and c.finalStatus ='approved' ORDER BY postId DESC");
						
						
					}
					else
					{
						//echo "All";
						$sqlfilterdata = mysqli_query($dbconnect, "SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title,cm.Comment as comment, cm.name AS commentBy,  '' AS Likeby, cm.commentDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile,cm.IP AS UserIP
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						INNER JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						INNER JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						INNER JOIN chitticomment AS cm ON c.chittiId = cm.chittiId
						INNER JOIN msubscriberlist as msl on cm.subscriberId = msl.subscriberId
						INNER JOIN userCountry as uc on msl.userCountryId = uc.countryId
						INNER JOIN userCity as ucty on msl.userCityId = ucty.cityId
						UNION ALL 
						SELECT c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, msl.name AS Likeby, cl.likeDate AS ActtionDTTM,uc.countryNameInEnglish as User_Country, ucty.cityNameInEnglish as User_City,msl.mobileNo as Mobile,cl.IP AS UserIP
						FROM chitti AS c
						INNER JOIN chittigeographymapping AS cgm ON c.chittiId = cgm.chittiId
						inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode
						inner JOIN chittilike AS cl ON c.chittiId = cl.chittiId
						inner JOIN msubscriberlist AS msl ON cl.subscriberId = msl.subscriberId
						inner join userCountry as uc on msl.userCountryId = uc.countryId
						left join userCity as ucty on msl.userCityId = ucty.cityId
						UNION select c.chittiId AS postId, c.approveDate AS Post_Date, vg.geography AS Geography, c.Title AS Title, '' as comment ,'' AS commentBy, '' AS Likeby, '' AS ActtionDTTM,'' as User_Country, ''  as User_City,'' as Mobile, '' AS UserIP FROM chitti as c inner JOIN vChittiGeography AS cg ON c.chittiId = cg.chittiId
						inner JOIN vGeography AS vg ON cg.Geography = vg.geographycode where c.chittiId not in (select distinct chittiId from chitticomment union select distinct chittiId from chittilike) and c.finalStatus ='approved'
						ORDER BY postId DESC");
					}
					$i = 1;
					while($ReportData = mysqli_fetch_assoc($sqlfilterdata))
					{ ?>
						<tr>
							<td class="text-left"><?php echo $i; ?></td>
							<td class="text-center"><?php echo $ReportData['postId']; ?></td>
							<td class="text-center"><?php echo $ReportData['Post_Date']; ?></td>
							<td class="text-center"><?php echo $ReportData['Geography']; ?></td>
							<td class="text-center"><?php echo $ReportData['Title']; ?></td>
							<td class="text-center"><?php echo $ReportData['comment']; ?></td>
							<td class="text-center"><?php echo $ReportData['commentBy']; ?></td>
							<td class="text-center"><?php echo $ReportData['Likeby']; ?></td>
							<td class="text-center"><?php echo $ReportData['ActtionDTTM']; ?></td>
							<td class="text-center"><?php echo $ReportData['Mobile']; ?></td>
							<td class="text-center"><?php echo $ReportData['User_City']; ?></td>
							<td class="text-center"><?php echo $ReportData['User_Country']; ?></td>
						</tr>
					<?php $i++;} ?>
					
	    
					
					</tbody>
				</table>
			</div>	
		</div>	
		<!-- End User List -->
		
		 
		
	 
		 	
		
		<!-- Sidebar -->
		<?php include "sidebar.php"; ?>	
		<!-- End Sidebar -->
	</div>
	<!-- Footer -->
	<?php include "footer.php"; ?>	
	<!-- End Footer -->

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script src='https://cdn.jsdelivr.net/momentjs/latest/moment.min.js'></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function() {
    $('#datatable-default').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
/* function postDate(x)
{
	//document.getElementById('').
	$('#selectmonthfrom').attr('disabled');
	 /* var div = document.getElementById('post_date');
	 div.enabled = x.checked;
	 var chl = div.children;
	 for(var i=0; i< chl.length; i++)
	 {
	  chl[i].disabled = x.checked;
	 } 
} */
$("#Action_Date").click(function() {
    $("#selectActionmonthfrom").attr("disabled", !this.checked); 
	$("#selectActionmonthto").attr("disabled", !this.checked); 
});
$("#Post_Date").click(function() {
    $("#selectmonthfrom").attr("disabled", !this.checked); 
	$("#selectmonthto").attr("disabled", !this.checked); 
});
</script>
	<script type="text/javascript">
       $(function () {
  $("#datepicker").datepicker({
	  format: "dd-mm-yyyy",
/*                format: "mm-yyyy",

    startView: "months", 
    minViewMode: "months" */
		todayBtn: "linked",
	keyboardNavigation: false,
	forceParse: false,
	calendarWeeks: true,
	autoclose: true
            });
			
  $("#datepicker1").datepicker({
                format: "dd-mm-yyyy",
    /*startView: "months", 
    minViewMode: "months" */
		todayBtn: "linked",
	keyboardNavigation: false,
	forceParse: false,
	calendarWeeks: true,
	autoclose: true
            });	
  $("#datepicker2").datepicker({
                format: "dd-mm-yyyy",
    /*startView: "months", 
    minViewMode: "months" */
		todayBtn: "linked",
	keyboardNavigation: false,
	forceParse: false,
	calendarWeeks: true,
	autoclose: true
            });	
  $("#datepicker3").datepicker({
                format: "dd-mm-yyyy",
    /*startView: "months", 
    minViewMode: "months" */
		todayBtn: "linked",
	keyboardNavigation: false,
	forceParse: false,
	calendarWeeks: true,
	autoclose: true
            });				
        });
		

	function datevalidate()
	{
		//alert(document.getElementById('selectmonthfrom').value);
		//alert(document.getElementById('selectmonthto').value);
		//alert(Date.parse(document.getElementById('selectmonthfrom').value);
		//alert(Date.parse(document.getElementById('selectmonthto').value);
		if(Date.parse(document.getElementById('selectmonthfrom').value) <= Date.parse(document.getElementById('selectmonthto').value))
		{
			//alert(1);
			return true;
		}
		else
		{
			alert("Post To date can't be less than post from date");
			document.getElementById('selectmonthfrom').value = '';
			document.getElementById('selectmonthto').value = '';
		//return false;
		}
	}
	
	function Actiondatevalidate()
	{
		//alert(document.getElementById('selectmonthfrom').value);
		//alert(document.getElementById('selectmonthto').value);
		if(Date.parse(document.getElementById('selectActionmonthfrom').value) <= Date.parse(document.getElementById('selectActionmonthto').value))
		{
			//alert(1);
			return true;
		}
		else
		{
			alert("Action To date can't be less than Action from date");
			document.getElementById('selectActionmonthfrom').value = '';
			document.getElementById('selectActionmonthto').value = '';
		//return false;
		}
	}
    </script>
</body>
</html>
