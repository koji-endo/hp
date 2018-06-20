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
		<button type="button" class="dgn_bool" bivalue=1>P</button>
		<button type="button" class="dgn_bool" bivalue=2>Q</button>
		<button type="button" class="dgn_bool" bivalue=4>QRS</button>
		<button type="button" class="dgn_bool" bivalue=8>ST</button>
		<button type="button" class="dgn_bool" bivalue=16>T</button>
		<button type="button" class="dgn_bool" bivalue=32>U</button>
				</td>
				<td>
		<button type="button" class="dgn_bool" bivalue=64>増高・上昇</button>
		<button type="button" class="dgn_bool" bivalue=128>低下</button>
		<button type="button" class="dgn_bool" bivalue=256>陽性</button>
		<button type="button" class="dgn_bool" bivalue=512>陰性</button>
		<button type="button" class="dgn_bool" bivalue=1024>異常</button>
				</td>
				<td>
		<button type="button" class="dgn_bool" bivalue=2048>I</button>
		<button type="button" class="dgn_bool" bivalue=4096>II</button>
		<button type="button" class="dgn_bool" bivalue=8192>III</button>
		<button type="button" class="dgn_bool" bivalue=16384>avR</button>
		<button type="button" class="dgn_bool" bivalue=32768>avL</button>
		<button type="button" class="dgn_bool" bivalue=65536>avF</button>
		<button type="button" class="dgn_bool" bivalue=131072>V1</button>
		<button type="button" class="dgn_bool" bivalue=262144>V2</button>
		<button type="button" class="dgn_bool" bivalue=524288>V3</button>
		<button type="button" class="dgn_bool" bivalue=1048576>V4</button>
		<button type="button" class="dgn_bool" bivalue=2097152>V5</button>
		<button type="button" class="dgn_bool" bivalue=4194304>V6</button>
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
		<button type="button" class="btn btn-warning confirm_local">確定して次へ(各停)</button>
		<button type="button" class="btn btn-warning confirm_express">確定して次の未確定へ</button>
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
		bdata=data[1];
		init();
		select_init();
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
	console.log("init");
	console.log(Math.pow(2,1));
	console.log($([bivalue=Math.pow(2,1)]).text());
	imgsrc=[];
	var html='';
	start_index=option;
	now_index=0;//TODO
	superlist=[];
	expresslist=[];
	var once=1;
	for (let ver in adata){
		// console.log(adata[ver]);
		let ecgnumber=adata[ver]['ecg_num'];
		if(ecgnumber==adata[start_index]['ecg_num']){
			imgsrc.push(ver);
			if(once){
				now_index=expresslist.length;
				once=0;
				console.log(now_index);
			}
			html+='<img src="'+adata[ver]['original_path']+'" width="100%">';
		}
		if(superlist[ecgnumber]==void(0)){
			superlist[ecgnumber]=ver;
			expresslist.push({dia_state:adata[ver]['dia_state'],
							ecgnumber:ecgnumber,
							img_num:ver
		});
		}

	}
	console.log(imgsrc);
	$('.img_container').html(html);
	decoder();
}
function button_view(){
	$('.previous_local').show();
	$('.previous_express').show();
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
	$(".opinion").on('change',function(){
		let sval=$(this).val();
		$(this).closest("tr").prev("tr").find(".bivalue").val(sval);
	});


	$(".dgn_bool").on('click',function(){
		if(!$(this).closest("tr").hasClass("hilight")){
			$(this).closest("tr").addClass("hilight");
			$(this).closest("tr").next("tr").removeClass("hilight");
			$(this).closest("tr").next("tr").find(".opinion").val("0");
			$(this).closest("tr").find(".bivalue").val(0);
		}
		var val=Number($(this).closest("tr").find(".bivalue").val());
		if($(this).hasClass("palevioletred")){
			$(this).closest("tr").find(".bivalue").val(val+Number($(this).attr("bivalue")));
		}else{
			$(this).closest("tr").find(".bivalue").val(val-Number($(this).attr("bivalue")));
		}
		$(this).toggleClass("palevioletred");

	});



	$(".confirm_local,.confirm_express").on('click',function(){
		confirm();
		$(window).scrollTop(0);
		if(now_index+1==expresslist.length){
			alert("最後の番号です。");
		}else{			
			if($(this).hasClass("confirm_local")){now_index+=1;}else{
while(1){
expresslist['']
}
}

			var once=1;
			var html='';
			start_index=expresslist[now_index]["img_num"];
			console.log("ni "+now_index+"si "+start_index);
			for (let ver in adata){
				// console.log(adata[ver]);
				let ecgnumber=adata[ver]['ecg_num'];
				imgsrc=[];
				if(ecgnumber==expresslist[now_index]["ecgnumber"]){
					imgsrc.push(ver);
					html+='<img src="'+adata[ver]['original_path']+'" width="100%">';
				}
			}
			$('.img_container').html(html);
			reset();
		}
	});

$(".previous_local").on('click',function(){
		confirm();
		$(window).scrollTop(0);
		if(now_index==0){
			alert("最初の番号です。");
		}else{			
			now_index-=1;
			var html='';
			start_index=expresslist[now_index]["img_num"];
			console.log("ni "+now_index+"si "+start_index);
			for (let ver in adata){
				// console.log(adata[ver]);
				let ecgnumber=adata[ver]['ecg_num'];
				imgsrc=[];
				if(ecgnumber==expresslist[now_index]["ecgnumber"]){
					imgsrc.push(ver);
					html+='<img src="'+adata[ver]['original_path']+'" width="100%">';
				}
			}
			$('.img_container').html(html);
			reset();
		}
	});



	function decode_bin(bin,area){
		console.log(bin,area);
		for(var d_i=0;d_i<22;d_i++){
			if(bin%2==1){
				console.log(1);
				console.log($(area).find([bivalue=Math.pow(2,d_i)]));
				$(area).find([bivalue=Math.pow(2,d_i)]).addClass("palevioletred");
			}else{
				console.log(0);
			}
			bin=(bin-bin%2)/2
		}
	}

	function decoder(){
		console.log("decode");
		// console.log(imgsrc);
		$.each(imgsrc,function(i,v){
			console.log(v);
			if(adata[v]["dia_code"+(i+1)]<0){
				decode_bin(-Number(adata[v]["dia_code"+(i+1)]),"#ansbox"+(i+1));
			}else{
				$("#ansbox"+(i+1)).next("tr").find(".opinion").val(adata[v]["dia_code"+(i+1)]);
			}
		});
	}


	function select_init(){
		var html='<option value="0">未選択</option>';
		$.each(bdata,function(ind,val){
			html+='<option value="'+val['id']+'">'+val['opinion']+'</option>';
			if(ind==10){
				// console.log(val);
				html+='<option disabled="disabled">——————</option>';
			}
		});
		$('.opinion').html(html);
	}

	function reset(){
		$('.bivalue').val(0);
		$('.palevioletred').each(function(){
			$(this).removeClass('palevioletred');
		});
		$('.hilight').removeClass('hilight');
		$(".opinion").val("0");
	}

	function confirm(){
		var diatext='';
		var anstext=[];
		for(var dind=0;dind<4;dind++){
			var tmp_bivalue=$('#ansbox'+(dind+1)).find('.bivalue').val();
			anstext.push(tmp_bivalue);
			if(tmp_bivalue<0){
				let objpale=$('#ansbox'+(dind+1)).find('.palevioletred');
				objpale.each(function(){
					diatext+=$(this).text();
				})
			}else{
				diatext+=$('#ansbox'+(dind+1)).next('tr').find('.opinion option:selected').text();
			}
			if(dind!=3){
				diatext+=', ';
			}
		}
		console.log(diatext);
		decoder();
		// diatext=$('.palevioletred');
		// console.log(diatext);
		$.ajax({
			type: "POST",
			url: "send/ecgods.php",
			data: {
				command: "diagnosis_confirm",
				dia_text: diatext,
				dia_code1:anstext[0],
				dia_code2:anstext[1],
				dia_code3:anstext[2],
				dia_code4:anstext[3],
				ecg_num:adata[start_index]['ecg_num'],
				kenshin_id:id
			},
			dataType: "text"}
			).done(
			function(data){
				console.log(data);
				for(let v in imgsrc){
					adata[v]["dia_state"]=2;
					adata[v]["dia_code1"]=anstext[0];
					adata[v]["dia_code2"]=anstext[1];
					adata[v]["dia_code3"]=anstext[2];
					adata[v]["dia_code4"]=anstext[3];
					adata[v]["dia_text"]=diatext;
				}
				console.log(adata);
			}
			).fail(
			function(){
				alert("failed");
			});
		}
	</script>
</body>
</html>