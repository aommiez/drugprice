<?php
include_once "App.php";
$user = App::getUser();
$input = array();
foreach($_GET as $key=>$value){
    if(!empty($value)){
        $input[$key] = $value;
    }
}
if(!empty($input["receive_date"])){
    $ex = explode("/", $input["receive_date"]);
    $input["receive_date"] = $ex[2]."-".$ex[1]."-".$ex[0];
}
if(count($input)==0){
    $input = null;
}
$drugs = App::allDrug($input);
$stats = App::getStats($input);
$hospitals = App::hospitals();

if(!is_null($input)){
    $buffer = $drugs;
    $drugs = array();

    foreach($buffer as $key => $value){
        if((int)$value["price"]<(int)$stats["avg"]){
            $value["tr_class"] = "success";
            $drugs[] = $value;
        }
    }

    foreach($buffer as $key => $value){
        if((int)$value["price"]==(int)$stats["avg"]){
            $value["tr_class"] = "warning";
            $drugs[] = $value;
        }
    }

    foreach($buffer as $key => $value){
        if((int)$value["price"]>(int)$stats["avg"]){
            $value["tr_class"] = "danger";
            $drugs[] = $value;
        }
    }
}
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
        <link href="css/auto-complete.css" rel="stylesheet">
	</head>
	<body>
    <nav class="navbar navbar-default" role="navigation">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Search</a></li>
                <?php if(App::isLogin()){?>
                <li><a href="upload.php">Upload</a></li>
                <li><a href="upload_history.php">Upload History</a></li>
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
                    <select class="form-control" id="hospitalName" name="hospitalId" style="width: 177px;">
                        <option value="">ทั้งหมด</option>
                        <?php foreach($hospitals as $key =>$value){?>
                            <option value="<?php echo $value["idhospital"];?>"
                                <?php if(isset($_GET["hospitalId"]) && $_GET["hospitalId"]==$value["idhospital"]) echo "selected"; ?>>
                                <?php echo $value["hospital_name"];?>
                            </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="dt1">Receive Date</label>
                    <input type="text" class="form-control" id="receive_date" name="receive_date" value="<?php if(isset($_GET["receive_date"])) echo $_GET["receive_date"];?>" placeholder="วันที่รับเวชภัณฑ์">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="NAME">Name</label>
                    <input type="text" class="form-control auto-complete" id="NAME" name="NAME" value="<?php if(isset($_GET["NAME"])) echo $_GET["NAME"];?>" placeholder="ชื่อวัสดุ/เวชภัณฑ์">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="CONTENT">CONTENT</label>
                    <input type="text" class="form-control auto-complete" id="CONTENT" name="CONTENT" value="<?php if(isset($_GET["CONTENT"])) echo $_GET["CONTENT"];?>" placeholder="ขนาด">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="CONTENT">TYPE</label>
                    <input type="text" class="form-control auto-complete" id="TYPE" name="TYPE" value="<?php if(isset($_GET["TYPE"])) echo $_GET["TYPE"];?>" placeholder="ชนิด">
                </div>
                <br />
                <div class="form-group">
                    <label class="sr-only" for="pack">Pack</label>
                    <input type="text" class="form-control auto-complete" id="pack" name="pack" value="<?php if(isset($_GET["pack"])) echo $_GET["pack"];?>" placeholder="ขนาดบรรจุ">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="price">Price</label>
                    <input type="text" class="form-control auto-complete" id="price" name="price" value="<?php if(isset($_GET["price"])) echo $_GET["price"];?>" placeholder="ราคา/หน่วย">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="qty">QTY</label>
                    <input type="text" class="form-control auto-complete" id="qty" name="qty" value="<?php if(isset($_GET["qty"])) echo $_GET["qty"];?>" placeholder="ปริมาณซื้อ">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="total_money">Total Money</label>
                    <input type="text" class="form-control auto-complete" id="total_money" name="total_money" value="<?php if(isset($_GET["total_money"])) echo $_GET["total_money"];?>" placeholder="มูลค่ารวมเกินกว่า">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="startDate">VendorCode</label>
                    <input type="text" class="form-control auto-complete" id="VendorCode" name="VendorCode" value="<?php if(isset($_GET["VendorCode"])) echo $_GET["VendorCode"];?>" placeholder="VendorCode">
                </div>
                <button type="submit" class="btn btn-primary" style="width: 177px;">ค้นหา</button>
            </form>
            <hr>
            <div style="font-size: 18px;">
                <span style="padding: 0 20px;">max: <span class="stat-max"><?php echo (int)$stats["max"];?></span></span>
                <span style="padding: 0 20px 0 0;">avg: <span class="stat-avg"><?php echo (int)$stats["avg"];?></span></span>
                <span style="padding: 0 20px;">min: <span class="stat-min"><?php echo (int)$stats["min"];?></span></span>
                <!--
                <span style="padding: 0 20px;"><button class="btn btn-default stat-calculate">Calculate</button></span>
                -->
            </div>
        </div>
    </div>
		<div id="wrap">
			<div class="container">
                <div class="pull-right" style="padding-bottom: 20px;">
                    <i class="glyphicon glyphicon-download-alt"></i> <a href="export_pdf.php">PDF</a> <!--,<a href="export_excel.php">Excel</a>-->
                </div>
				<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
					<thead>
						<tr>
                            <th>โรงพยาบาล</th>
							<th>วันที่รับเวชภัณฑ์</th>
							<th>ชื่อวัสดุ/เวชภัณฑ์</th>
                            <th>ขนาด</th>
                            <th>ชนิด</th>
							<th>ขนาดบรรจุ</th>
							<th>ราคา/หน่วย</th>
                            <th>ปริมาณซื้อ</th>
                            <th>มูลค่ารวม</th>
                            <th>ผู้ขาย</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            foreach($drugs as $key=> $value){?>
                            <tr class="gradeX <?php if(isset($value["tr_class"])) echo $value["tr_class"];?>">
                                <td><?php echo $value["hospital_name"];?></td>
                                <td><?php $dateTime = new DateTime($value["receive_date"]); echo $dateTime->format("d/m/Y");?></td>
                                <td><?php echo $value["NAME"];?></td>
                                <td><?php echo $value["CONTENT"];?></td>
                                <td><?php echo $value["TYPE"];?></td>
                                <td><?php echo $value["pack"];?></td>
                                <td class="price-field"><?php echo $value["price"];?></td>
                                <td><?php echo $value["qty"];?></td>
                                <td><?php echo $value["price"]*$value["qty"];?></td>
                                <td><?php echo $value["VendorCode"];?></td>
                            </tr>
                        <?php }?>
				</table>
			</div>

        <hr>

		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
        <script src="js/datatables.js"></script>
        <!--
        <script src="js/TableTools.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/TableTools.css">
        -->
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/jquery.autocomplete.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var oTable = $('.datatable').dataTable({
				"sPaginationType": "bs_full",
                "aLengthMenu": [[200],[200]],
                "iDisplayLength": 200,
                "aaSorting": [],
                "sDom": 'T<"clear">lfrtip',
                "bFilter": false
                /*,
                "oTableTools": {
                    "sSwfPath": "media/swf/copy_csv_xls_pdf.swf"
                }
                */
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
            $('#DataTables_Table_0_filter input').attr("placeholder", "ค้นหาละเอียดอีกครั้ง");
            $('#receive_date').datepicker({format:'dd/mm/yyyy'});

            function calculateStats(){
                return;

                var rows = oTable._('tr', {"filter":"applied"});
                console.log(rows);
                var total = 0;
                var length = rows.length;
                var min = 99999999999999;
                var max = 0;
                $(rows).each(function(index, el){
                    var val = parseInt(el[3]);
                    total += val;
                    if(val<min){
                        min = val;
                    }
                    if(val>max){
                        max = val;
                    }
                });

                if(min == 99999999999999) min = 0;
                var avg = parseInt(total/length);
                if(isNaN(avg)) avg = 0;
                $('.stat-avg').text(avg);
                $('.stat-min').text(min);
                $('.stat-max').text(max);

                var trRow = $('.datatable tr');
                $(trRow).each(function(index, el){
                    var val = parseInt($(".price-field", el).text());
                    el.removeClass("danger").removeClass("success").removeClass("warning");
                    if(val<avg){
                        $(el).addClass("success");
                    }
                    else if(val>avg){
                        $(el).addClass("danger");
                    }
                    else {
                        $(el).addClass("warning");
                    }
                });
            }
            calculateStats();

            $('.stat-calculate').click(function(e){
                e.preventDefault();
                calculateStats();
            });

            $('.auto-complete[name="NAME"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=NAME'
            });
            $('.auto-complete[name="CONTENT"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=CONTENT'
            });
            $('.auto-complete[name="TYPE"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=TYPE'
            });
            $('.auto-complete[name="pack"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=pack'
            });
            $('.auto-complete[name="price"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=price'
            });
            $('.auto-complete[name="qty"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=qty'
            });
            $('.auto-complete[name="VendorCode"]').autocomplete({
                serviceUrl: 'auto-complete.php?field=VendorCode'
            });
        });
		</script>
	</body>
</html>