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
                <li class="active"><a href="#">Search</a></li>
                <li><a href="#">Upload</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right navbar-collapse">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div class="jumbotron">
        <div class="container" >
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="hospitalName">Hospital</label>
                    <select class="form-control" id="hospitalName">
                        <option>ชื่อโรงพยาบาล</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="startDate">Start Date</label>
                    <input type="text" class="form-control" id="startDate" placeholder="วันที่เริ่ม">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="endDate">End Date</label>
                    <input type="text" class="form-control" id="endDate" placeholder="วันที่สิ้นสุด">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="namePro">name Pro</label>
                    <input type="text" class="form-control" id="namePro" placeholder="ชื่อยา">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="price">pro price</label>
                    <input type="text" class="form-control" id="price" placeholder="ราคาสุทธิเกินกว่า">
                </div>
                <button type="submit" class="btn btn-default">ค้นหา</button>
            </form>
            <hr>
            xxxx

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
						<tr class="gradeX">
							<td>Trident</td>
							<td>
								Internet
								 Explorer 
								4.0
								</td>
							<td>Win 95+</td>
							<td class="center">4</td>
							<td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
						</tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr><tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>

                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>
                                Internet
                                Explorer
                                4.0
                            </td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                            <td class="center">X</td>
                        </tr>

					</tbody>
					<tfoot>
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
					</tfoot>
				</table>
			</div>

        <hr>

		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
		<script src="js/datatables.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_full",
                "aaSorting": [ [0,'asc'], [1,'asc'] ]
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
            $('#startDate').datepicker({format:'dd/mm/yyyy'});
            $('#endDate').datepicker({format:'dd/mm/yyyy'})

        });
		</script>
	</body>
</html>