<?php
require('../tms/send/login_common.php');
login('doctor');
if(!isset($_GET['id'])){
	header('Location: ./dr_index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="img/favicon.ico" >
	<meta charset="UTF-8">
</head>
<body>
	<style type="text/css">
	.brown_border{
		border:solid 1px brown;
	}
	tbody .dia_title{
		/*padding: 0, 12px;*/
		height: 10px;
		padding-top: 0px;
		padding-bottom: 0px;
		background-color: maroon;
		color:white;
		font-weight: bold;
	}
	.hilight{
		border:solid 5px orange;
		background-color: lightyellow;
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
	.palevioletred{
		background-color: palevioletred;
	}
</style>
<header>
	<?php 
	$disabled=["Dr","","","",""];
	include("nav.php");
	?>
</header>
<div class="img_container">
	<!-- <img src="rotate_corrected4/4096_1.jpg" width="100%"> -->
	<!-- <img src="rotate_corrected4/4096_2.jpg" width="100%"> -->
</div>
<div class="row" style="margin:0px;">
	<div class="patient_info col-sm-12">
		<div class="patient_info_head"><b>患者情報：<br></b></div>漆黒の空が徐々に濃藍色を帯びはじめ、眼下に波打つ赤瓦の屋根が姿を現した。「バァバ、鳥さん！」膝の上の孫が、藍色の空を指さした。かもめが１羽、影絵の様に飛んでいた。時刻は明け方４時半だ。
	</div>
</div>
<div class="row" style="margin:0px;">
	<div class="col-sm-12">
		<table class="table">
		<tbody>
			<?php for($i=0;$i<4;$i++){ ?>
			<tr><td colspan="4" class="dia_title">診断<?php echo $i+1; ?></td></tr>
			<tr id="ansbox<?php echo ($i+1);?>">
				<td>
					
				</td>
				<td>
		<button type="button" class="dgn_bool" bivalue=-1>P</button>
		<button type="button" class="dgn_bool" bivalue=-2>Q</button>
		<button type="button" class="dgn_bool" bivalue=-4>QRS</button>
		<button type="button" class="dgn_bool" bivalue=-8>ST</button>
		<button type="button" class="dgn_bool" bivalue=-16>T</button>
		<button type="button" class="dgn_bool" bivalue=-32>U</button>
				</td>
				<td>
		<button type="button" class="dgn_bool" bivalue=-64>増高・上昇</button>
		<button type="button" class="dgn_bool" bivalue=-128>低下</button>
		<button type="button" class="dgn_bool" bivalue=-256>陽性</button>
		<button type="button" class="dgn_bool" bivalue=-512>陰性</button>
		<button type="button" class="dgn_bool" bivalue=-1024>異常</button>
				</td>
				<td>
		<button type="button" class="dgn_bool" bivalue=-2048>I</button>
		<button type="button" class="dgn_bool" bivalue=-4096>II</button>
		<button type="button" class="dgn_bool" bivalue=-8192>III</button>
		<button type="button" class="dgn_bool" bivalue=-16384>avR</button>
		<button type="button" class="dgn_bool" bivalue=-32768>avL</button>
		<button type="button" class="dgn_bool" bivalue=-65536>avF</button>
		<button type="button" class="dgn_bool" bivalue=-131072>V1</button>
		<button type="button" class="dgn_bool" bivalue=-262144>V2</button>
		<button type="button" class="dgn_bool" bivalue=-524288>V3</button>
		<button type="button" class="dgn_bool" bivalue=-1048576>V4</button>
		<button type="button" class="dgn_bool" bivalue=-2097152>V5</button>
		<button type="button" class="dgn_bool" bivalue=-4194304>V6</button>
		<button type="button" class="dgn_bool_multi">II, III, avF</button>
		<button type="button" class="dgn_bool_multi">V1~V6</button>
				<input type="number" class="bivalue"/>
				</td>
			</tr>
			<tr><td>OR</td><td colspan="3">
				<select name="opinion" class="form-control opinion"></select>
			</td></tr>
			<?php } ?>
		</tbody>
		</table>
</div>
<div class="row" style="margin:0px;">
	<div class="col-sm-10">
		<button type="button" class="btn btn-default start">最初へ</button>
		<button type="button" class="btn btn-info previous_local">前へ(各停)</button>
		<button type="button" class="btn btn-info previous_express">前の未確定へ</button>
		<button type="button" class="btn btn-warning confirm_express">確定して次へ(各停)</button>
		<button type="button" class="btn btn-warning confirm_local">確定して次の未確定へ</button>
		<button type="button" class="btn btn-default pend_local">保留して次へ(各停)</button>
		<button type="button" class="btn btn-default pend_express">保留して次の未確定へ</button>
		<button type="button" class="btn btn-danger">終了</button>
	</div>
	
	<div class="col-sm-2">
		<div class="form-group">
			<label for="exampleFormControlTextarea1">自由記述</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
		</div>
	</div>
</div>
<script src="//code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(function(){
	
	adata=[];

	 <?php echo "id=".htmlspecialchars($_GET['id']).";"; ?>
	$.ajax({
		type: "POST",
		url: "send/ecgods.php",
		data: {
			command: "diagnosis_dataget",
			kenshin_id:id
		},
		dataType: "json"}
	).done(
	function(data){
		console.log(data);
		adata=data[0];
		init();
		button_view();
		console.log("expresslist");
		console.log(expresslist);
	}
	).fail(
	function(){
		alert("failed");
	}
	);

function init(option=0){
	imgsrc=[];
	var html='';
	start_index=option;
	superlist=[];
	expresslist=[];
	for (let ver in adata){
		// console.log(adata[ver]);
		let ecgnumber=adata[ver]['ecg_num'];
		if(ecgnumber==adata[start_index]['ecg_num']){
			imgsrc.push(adata[ver]['original_path']);
			html+='<img src="'+adata[ver]['original_path']+'" width="100%">';
		}
		if(superlist[ecgnumber]==void(0)){
			superlist[ecgnumber]=ver;
			expresslist.push({dia_state:adata[ver]['dia_state'],
							ecgnumber:ecgnumber
		});
		}

	}
	console.log(imgsrc);
	$('.img_container').html(html);
}
function button_view(){
	$('.previous_local').show();
	$('.previous_express').show();
	console.log("SI"+start_index)
	if(start_index==0){
		$('.previous_local').hide();
		$('.previous_express').hide();
	}
}

function next_local(){
	for (let ver in adata){
		console.log(adata[ver]);
		var bool=((adata[ver]['ecg_num']>adata[start_index]['ecg_num'])
		&&imgsrc.length==0)
		||((adata[ver]['ecg_num']==adata[start_index]['ecg_num'])
		&&(imgsrc.length!=0));
		if(adata[ver]['ecg_num']){
			imgsrc.push(adata[ver]['original_path']);
			html+='<img src="'+adata[ver]['original_path']+'" width="100%">';
		}else{
			break;
		}
	}
}


function index_change(option){
	switch(option){
		case "previous_local":
			start_index-=1;
			break;
		case "previous_express":
			while(1){
				start_index-=1;
				if(expresslist[dia_state]==0){
					break;
				}
			}
			break;
		case "next_local":
			console.log("ajaxprocess_todo");
			start_index+=1;
			break;
	}
}

});

	$(".opinion").on('click',function(){
		if(!$(this).closest("tr").hasClass("hilight")){
			$(this).closest("tr").addClass("hilight");
			$(this).closest("tr").prev("tr").removeClass("hilight");
			$(this).closest("tr").prev("tr").find(".dgn_bool").removeClass("palevioletred");
			$(this).closest("tr").prev("tr").find(".bivalue").val(0);
		}
	});
	$(".dgn_bool").on('click',function(){
		if(!$(this).closest("tr").hasClass("hilight")){
			$(this).closest("tr").addClass("hilight");
			$(this).closest("tr").next("tr").removeClass("hilight");
		}
		var val=Number($(this).closest("tr").find(".bivalue").val());
		if($(this).hasClass("palevioletred")){
			$(this).closest("tr").find(".bivalue").val(val-Number($(this).attr("bivalue")));
		}else{
			$(this).closest("tr").find(".bivalue").val(val+Number($(this).attr("bivalue")));
		}
		$(this).toggleClass("palevioletred");

	})



function decode_bin(bin,area){
 for(var d_i=0;d_i<22;d_i++){
 if(bin%2==1)
 $(area).find([bivalue=pow(2,d_i)]).addClass("palevioletred");
}
bin=(bin-bin%2)/2
}

function select_init(){
 var html=''
}

</script>
</body>
</html>