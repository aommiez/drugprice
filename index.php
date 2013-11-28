<?php
include_once "App.php";
$user = App::getUser();
$input = isset($_GET)? $_GET: null;
$drugs = App::allDrug($input);
$hospitals = App::hospitals();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Drug Price</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/datatables.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link href="css/a.css" rel="stylesheet">
	</head>
	<body>
    <nav class="navbar navbar-default" role="navigation">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Search</a></li>
                <?php if(App::isLogin()){?>
                <li class=""><a href="upload.php">Upload</a></li>
                <?php }?>
                <?php if(App::isAdmin()){?>
                <li><a href="admin/index.php">Admin</a></li>
                <?php }?>
            </ul>

            <?php if(!App::isLogin()){?>
            <ul class="nav navbar-nav navbar-right navbar-collapse">
                <form class="navbar-form navbar-left" role="search" method="post" action="login.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>
            </ul>
            <?php }else{?>
            <div class="pull-right" style="line-height: 50px;">
                <span style="font-size: 17px; padding: 0 10px;"><?php echo $user["first_name"]." ".$user["last_name"];?></span>
                <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
            <?php }?>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="jumbotron">
        <div class="container" >
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="hospitalName">Hospital</label>
                    <select class="form-control" id="hospitalName" name="hospitalId">
                        <option>ชื่อโรงพยาบาล</option>
                        <?php foreach($hospitals as $key =>$value){?>
                            <option value="<?php echo $value["idhospital"];?>"><?php echo $value["hospital_name"];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="startDate">Start Date</label>
                    <input type="text" class="form-control" id="startDate" name="date_start" value="<?php if(isset($_GET["date_start"])) echo $_GET["date_start"];?>" placeholder="วันที่เริ่ม">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="endDate">End Date</label>
                    <input type="text" class="form-control" id="endDate" name="date_end" value="<?php if(isset($_GET["date_end"])) echo $_GET["date_end"];?>" placeholder="วันที่สิ้นสุด">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="namePro">name Pro</label>
                    <input type="text" class="form-control" id="namePro" name="name" value="<?php if(isset($_GET["name"])) echo $_GET["name"];?>" placeholder="ชื่อยา">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="price">pro price</label>
                    <input type="text" class="form-control" id="price" name="total_money" value="<?php if(isset($_GET["total_money"])) echo $_GET["total_money"];?>" placeholder="ราคาสุทธิเกินกว่า">
                </div>
                <button type="submit" class="btn btn-default">ค้นหา</button>
            </form>
            <hr>
            <!--
            xxxx
            -->

        </div>
    </div>
		<div id="wrap">
			<div class="container">
				<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
					<thead>
						<tr>
							<th>วัน เดือน ปี</th>
							<th>ชื่อยา</th>
							<th>ขนาด</th>
							<th>บริษัท</th>
							<th>ราคา/หน่วย</th>
                            <th>ขนาดบรรจุ</th>
                            <th>ปริมาณ</th>
                            <th>ราคาสุทธิ</th>
                            <th>วิธีการจัดซื้อ</th>
                            <th>โรงพยาบาล</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach($drugs as $key=> $value){?>
                            <tr class="gradeX">
                                <td><?php $dateTime = new DateTime($value["date_start"]); echo $dateTime->format("d/m/y");?></td>
                                <td><?php echo $value["name"];?></td>
                                <td><?php echo $value["content"];?></td>
                                <td><?php echo $value["company"];?></td>
                                <td><?php echo $value["price"];?></td>
                                <td><?php echo $value["size"];?></td>
                                <td><?php echo $value["qtc"];?></td>
                                <td><?php echo $value["total_money"];?></td>
                                <td><?php echo $value["budget_type"];?></td>
                                <td><?php echo $value["hospital_name"];?></td>
                            </tr>
                        <?php }?>
				</table>
			</div>

        <hr>

		</div>

        <link rel="stylesheet" type="text/css" href="css/TableTools.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
        <script src="js/datatables.js"></script>
        <script src="js/TableTools.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_full",
                "aaSorting": [ [0,'asc'], [1,'asc'] ],
                "sDom": 'T<"clear">lfrtip',
                "oTableTools": {
                    "sSwfPath": "media/swf/copy_csv_xls_pdf.swf"
                }
			});
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
			});
            $('#startDate').datepicker({format:'yyyy-mm-dd'});
            $('#endDate').datepicker({format:'yyyy-mm-dd'})

        });
		</script>
	</body>
</html>