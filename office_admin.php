<?php
require('../tms/send/login_common.php');
login();
?>
<!DOCTYPE html>
<html>
<head>
	<title>put_number</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/ecgods.css"/>
	<link rel="shortcut icon" href="img/favicon.ico" >
	<meta charset="UTF-8">
</head>
<body>
	<style type="text/css">
	.span_finish{
		background-color:darkslategray;
		color:white;
		border-radius: 5px;
		padding:2px 5px;
		margin-right:5px;
	}
	.span_drcheck{
		background-color:seagreen;
		color:white;
		border-radius: 5px;
		padding:2px 5px;
		margin-right:5px;
	}
	.span_putnum{
		background-color:mediumspringgreen;
		color:darkslategray;
		border-radius: 5px;	
		padding:2px 5px;
		margin-right:5px;
	}
	.ecg_title{
		font-size:24px;
		line-height: 30px;
		border-bottom: solid 2px darkslategray;
		padding:0 10px;
		margin-top: 15px;
	}
	.state{
		padding:3px;
		color:white;
		border-radius: 3px;
		text-align: center;
		border:solid 0px;
	}
	</style>
<header>
<?php 
$disabled=["TMS","","","","","disabled"];
include("nav.php");
?>
</header>
<h1 class="ecg_title">事務: 状況確認画面</h1>
<table id="myTable" class="table">
	<thead>	
		<tr><th>健診ID</th><th>事業所名</th><th>健診日付</th>
			<th>状況</th><th>担当医師</th><th>全件数</th><th>ナンバリング済</th>
		<th>診察済</th><th>ECGODS開始日時</th><th>更新日時</th>
	</thead>
	<tbody>	
	</tbody>
</table>
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
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> 
<!-- <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script>
$(function(){
adata=[]; //define as a global array
$.ajax({
	type: "POST",
	url: "send/ecgods.php",
	data: {
		command: "office_admin_dataget",
	},
	dataType: "json"}
	).done(
	function(data){
		console.log(data);
		var state=['未開始','前処理','医師登録待','医師診断中','診断完了','処理完了'];
		var backcolor=['#7d0f80','#b08829','#a03c44','#018a9a','#ab045c','#391d2b'];
		$('#myTable').DataTable({
			paging: true,
			searching: true,
			ordering: true,
			info: true,
			data:data,
			language: {
				url: "//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
			},
			columns:[
				{data:"kenshin_id",
					render:function(data){
						return "<a href='kenshin_ecg.php?id="+data+"'>"+data+"</a>";
					}
				},
				{data:"jigyosho_meisho"},
				{data:"hiduke"},
				{data:"state",
					render:function(data){
						value="<button class='state' data-toggle='modal' data-target='#general_modal' data-id="+data+" style='background-color:"
						+backcolor[data]
						+"'>"+state[data]+'</button>';
						return value;
					}
				},
				{data:"shimei"},
				{data:"all_num"},
				{data:"numbered_num"},
				{data:"diagnosed_num"},
				{data:"created"},
				{data:"modified"}
			]
		});

	}
	).fail(
	function(){
		alert("failed");
	}
	);

});

$(document).on('show.bs.modal','#general_modal', function (event) {
	var button = $(event.relatedTarget);
	data_id = Number(button.data('id')); 
	var modal_title="設定変更"
	href=(button.closest('tr')).find('a').attr('href');
	
	var modal_info='<a href="'+href+'" type="button" class="btn btn-default">詳細情報</a>';
	if(data_id<4){
	  modal_info+=' <button type="button" class="btn btn-danger state_back">一段階前に</button>';
	}
	$(this).find('.modal-title').html(modal_title);
	$(this).find('.modal-info').html(modal_info);
	$(this).find('.modal-footer').hide();
	});


$('.state_back').on.click(){
  var state=['未開始','前処理','医師登録待','医師診断中','診断完了','処理完了'];
if(data_id==1){
		modal_info="1ステップ前の「"+state[data_id-1]+"」に戻ります。よろしいですか？<br>この健診IDへの画像紐付けは全て解除されます。"
	}
  if(data_id==2){
		modal_info="1ステップ前の「"+state[data_id-1]+"」に戻ります。よろしいですか？"
	}
	if(data_id==3){
		modal_info="1ステップ前の「"+state[data_id-1]+"」に戻ります。よろしいですか？<br>この操作は非常に重大な操作なので、依頼している医師の方に確認してから行ってください。医師が入力した診断データは削除されます。"
	}
	$('#general_modal').find('.modal-title').html(modal_title);
	$('#general_modal').find('.modal-info').html(modal_info);
	$('#general_modal').find('.modal-footer').show();
}	
	$('.original_image').on('click',function(){
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
	})
	
	$('#confirm_on_modal').on('click',function(){
		$.ajax({
	type: "POST",
	url: "send/ecgods.php",
	data: {
		command: "state_back",
		data_id: data_id
	},
	dataType: "text"}
	).done(
	function(data){
		console.log(data);
	}).fail(
function(){
alert (“failed”);
}
);
	});
</script>
</body>
</html>
