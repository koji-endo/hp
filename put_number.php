<?php
require('../tms/send/login_common.php');
login(); 
if(!isset($_GET['id'])){
	header("office_admin.php");
}
$id=htmlspecialchars($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>put_number</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
	<link rel="shortcut icon" href="img/favicon.ico" >
	<meta charset="UTF-8">
</head>
<body>
	<style type="text/css">
	h2{
		font-size:20px;
		margin:3px 2%;
		border-bottom: solid 2px darkgreen;
		border-left: solid 5px darkgreen;
		padding:2px;
		border-radius: 3px;
	}
	.ecg_title{
		font-size:24px;
		line-height: 30px;
		border-bottom: solid 2px darkslategray;
		padding:0 10px;
		margin-top: 15px;
	}
	.image_data td{
		padding-top: 1px;
		padding-bottom: 1px; 
	}

	input[type=checkbox]{
		background-color:yellow; 
	}
	.row{
		margin:0px;
	}

	.patient_info{
		font-family: serif;
		font-size: 12px;
		background-color: #f7fff7;
		border-radius: 10px;
		padding:5px;
	}
	.patient_info_head{
		border-bottom: solid 0.5px black;
	}
	.red{
		background-color: blue;
	}
</style>
<header>
<?php 
$disabled=["TMS","","","","",""];
include("nav.php");
?>
</header>
<h1 class="ecg_title">事務: 画像番号づけ</h1>
<form id="formx" method="post">
<table id="myTable" class="table">
	<thead>	
		<tr><td></td><td></td>
			<td>ID</td><td></td>
		</tr>
	</thead>
	<tbody>	
		<!-- <tr>
			<td><img src="rotate_corrected4/for_ocr/4096_1pg2.jpg" width="100px"></td>
			<td><img src="rotate_corrected4/for_ocr/4096_1pg1.jpg" width="100px"></td>
			<td><input type="number" class="form-control" placeholder="0000"></td>
			<td><button class="btn btn-warning original_image" href="rotate_corrected4/4096_1.jpg">元画像</button></td>
		</tr>
		<tr>
			<td><img src="rotate_corrected4/for_ocr/4097_1pg2.jpg" width="100px"></td>
			<td><img src="rotate_corrected4/for_ocr/4097_1pg1.jpg" width="100px"></td>
			<td><input type="number" class="form-control" placeholder="0000"></td>
			<td><button class="btn btn-warning original_image" href="rotate_corrected4/4097_1.jpg" target="_blank">元画像</a></td>

		</tr> -->
	</tbody>
</table>
<div class="row" style="margin:0px;">
	<div class="col-sm-4">
		<button type="button" class="btn btn-warning confirm">確定して次へ</button>
		<button type="button" class="btn btn-danger finish">終了</button>
	</div>
</div>
</form>

<!-- Modal start -->
<div class="modal fade" id="general_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header modal-title_cus">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="shutbutton" aria-hidden="true">&times;</span></button>
            </div> -->
            <div class="modal-body modal-font_cus">
                <div class="row">
                    <div class="col-lg-12 modal-info">保存しました。</div>
                </div>
                <input type="hidden" id="delete_keep">
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">戻る</button>
                <button id="confirm_on_modal" class="btn btn-primary">OK</button>
            </div> -->
        </div>
    </div>
</div>
<!-- Modal fin -->
<script src="//code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script>
	$(function(){
		get_exist=0;
		<?php if(isset($_GET['id'])){
			echo "get_exist=".htmlspecialchars($_GET['id']).";";
		}
		?>
		if(get_exist){
			$.ajax({
	              type: "POST",
	              url: "send/ecgods.php",
	              data: {
	                  command: "put_number_dataget",
	                  kenshin_id:get_exist
	              },
	              dataType: "json"}
	          ).done(
	              function(data){
		              console.log(data);
		              $('#myTable').DataTable({
					    	// displayLength: 10,
					    	paging: true,
					    	searching: true,
					        ordering: true,
					        info: true,
					        language: {
								url: "//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
							},
					        data:data,
					        columns:[
					        {data:"pg1_path",
					        	render: function(data){
					        		return "<img src='"+data+"' width='100px'>"
					        	}
					    	},
					        {data:"pg2_path",
					        	render: function(data){
					        		return "<img src='"+data+"' width='100px'>"
					        	}
					    	},
					        {data:"ecg_tmp_num",
					        	render: function(data){
					        		darray=data.split('@');
					        		return "<input type='number' name="
					        		+darray[1]
					        		+" class='form-control' placeholder='0000' "
					        		+"value="+darray[0]+">";
					        	}
					    	},
					        {data:"original_path",
					        	render: function(data){
					        		return "<button class='btn btn-warning original_image' type='button' href='"+data+"'>元画像</button>";
					        	}
						    }
						    // {data:"pg1_path"}
						    ]
					  });
	              }
	          ).fail(function(){
	              alert("failed");
	          });
	    }	




		$('.confirm.finish').on('click',function(){
			var param = $('#formx').serializeArray();
			console.log(param);
			let post=[{name: "command", value: "update_number"},
			{name: "id", value: get_exist}
			];
			$.merge(param , post);

			$.ajax({
						type: "POST",
						url: "send/ecgods.php",
						data: param,
						dataType: "text"})
					.done(function(dat){
						console.log(dat);
						$('#myTable_next').click();
						$('#general_modal').modal('show');
						setTimeout(function(){
							$('#general_modal').modal("hide");
						}, 1000);
						
					})
					.fail(function(){
						alert("failed");
					});
		});

	});

	$(document).on('click','.original_image',function(){
		let tr=$(this).closest("tr");
		let href=$(this).attr('href');
		let text=$(this).text();
		if(text=="元画像"){
			tr.addClass("red");
			tr.after("<tr><td colspan='5'><img src="+href+" width='90%'></td></tr>")
			$(this).text('閉じる')
		}else{
			tr.removeClass("red");
			tr.next("tr").remove();
			$(this).text('元画像');
		}
	});


	// $(document).on('show.bs.modal','#general_modal', function (event) {
	// 	var button = $(event.relatedTarget);
	// 	var data_id = button.data('id');
	// 	$('#confirm_on_modal').attr("data_id",data_id);
	// 	if(data_id=="finish"){
	// 		$('#confirm_on_modal').attr("data_imgid",img_id); 
	// 		var modal_title="終了の確認";
	// 		var modal_info="確定して次へボタンを押さないと、行った変更は保存されません。保存してから"
	// 	}
	// }
	// );

</script>
</body>
</html>