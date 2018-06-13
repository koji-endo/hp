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
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/ecgods.css"/>
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
	</style>
<header>
<?php 
$disabled=["TMS","","","","","disabled"];
include("nav.php");
?>
</header>
<h1 class="ecg_title">事務: 画像紐づけ</h1>
<h2>健診の情報</h2>
<table class="table table-striped">
	<thead><tr>
		<th>ID</th>
		<th>日付</th>
		<th>事業所名</th>
		<th>住所</th>
		<th>心電図検査数</th>
	</tr></thead>
	<tbody class='kenshin_kanri'>
	</tbody>
</table>
<h2>未紐づけ画像リスト</h2>
<form method="post" id="formx">
	<table id="myTable" class="table">
		<thead>	
			<tr><th><input type="checkbox" class="checkall"/>画像ID</th>
				<th>アップロード日時</th>
				<th>元画像</th>
			</tr>
		</thead>
		<tbody class="image_data">	
		</tbody>
	</table>
</form>
<div class="row">
	<div class="col-md-offset-2 col-md-8" style="text-align: center;">
		<span class="assign_explanation">
			健診先にチェックされた画像を
		</span>
		<button type="button" class="btn btn-danger assign">紐づけ</button>
	</div>
</div>

<!-- Modal start -->
<div class="modal fade" id="general_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-title_cus">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="shutbutton" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-font_cus">
                <div class="row">
                    <div class="col-lg-12 modal-info"></div>
                </div>
                <input type="hidden" id="delete_keep">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">戻る</button>
                <button id="confirm_on_modal" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal fin -->
<script src="//code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="//cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> 
<script src="js/jquery.shiftcheckbox.js"></script>

<!-- <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script>
	<?php
	echo "id=".htmlspecialchars($_GET['id']).";"
	?>
	$(function(){
		// $('.assign_explanation').text('');
		check=0;
		 $.ajax({
              type: "POST",
              url: "send/ecgods.php",
              data: {
                  command: "img_assign_dataget",
                  kenshin_id:id
              },
              dataType: "json"}
          ).done(
              function(cdata){
	              console.log(cdata);
	              if(cdata[1]=="not"){
	              	location.href="kenshin_ecg.php?id="+id;
	              	return;
	              }
	              data=cdata[1];
	              forge_kanri_table(cdata[0]);
	              $('#myTable').DataTable({
				    	paging: false,
				    	searching: false,
				        ordering: true,
				        info: true,
				        language: {
							url: "//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
						},
				        data:data,
				        columns:[
				        {data:"id",
				        	render: function(data){
				        		return "<input type='checkbox' class='checkboxgroup' id='chk"+data+"' name='"+data+"'> "+"<label for='chk"+data+"'> "+data;},
				        		orderable:false

				    	},
				        {data:"created"},
				        {data:"original_path",
				        	render: function(data){
				        		return "<a href='"+data+"' class='btn btn-sm btn-warning' target='_blank'>元画像</a>"
				        	},
				        {data:"id",
				        	render: function(data){
				        		return "<button data-imgid='"+data+"' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#general_modal' data-id='delete'>削除</button>";
				        	}
				    	}]
				  });
				$('.checkboxgroup').shiftcheckbox();
              }
          ).fail(function(){
              alert("failed");
          });
	});
	$(document).ready( function () {
} );
	$('.checkall').on('click',function(){
		if(!check){
			$('input[type="checkbox"]').prop("checked",true);
			check=1;
		}else{
			$('input[type="checkbox"]').prop("checked",false);
			check=0;
		}
	});

function forge_kanri_table(cata){
	var innerhtml='<tr>';
	innerhtml+='<td>'+cata['id']+'</td>';
	innerhtml+='<td>'+cata['hiduke']+'</td>';
	innerhtml+='<td>'+cata['jigyosho_meisho']+'</td>';
	innerhtml+='<td>'+cata['jusho']+'</td>';
	innerhtml+='<td>'+cata['shindenzukensasu']+'</td>';
	innerhtml+='</tr>';
	$('.kenshin_kanri').html(innerhtml);
}

$('.assign').on('click',function(){
	var post=[{name: "command", value: "img_assign"},
			{name:"id", value:id}];
	
	var param = $('#formx').serializeArray();
	$.merge(param , post);
	$.ajax({
		type: "POST",
		url: "send/ecgods.php",
		data: param,
		dataType: "text"})
	.done(function(dat){
		location.reload();
	})
	.fail(function(){
		alert("failed");
	});
})

$('#confirm_on_modal').on('click',function(){
    var data_id=$(this).attr("data_id")
    if(data_id=="delete"){	
        $.ajax({
            type: "POST",
            url: "send/ecgods.php",
            data: {
                command: "delete",
                kenshin_id:id
            },
            dataType: "text"}
            ).done(
            function(data){
                //console.log(data);
                location.reload();
            }
            ).fail(
            function(){
                alert("failed");
            }
        );
    }
});
</script>
</body>
</html>