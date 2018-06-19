<?php
require_once("../../tms/quotation_common.php");

if($_POST["command"]=="img_assign_dataget"){
	$bind=["kenshin_id"=>$_POST['kenshin_id']];
	$sql_k="SELECT 
	hurrybird_hisa.kenshin_kanri.id, 
	hurrybird_hisa.kenshin_kanri.hiduke,
	hurrybird_hisa.kenshin_kanri.jigyosho_meisho,
	hurrybird_hisa.kenshin_kanri.jusho, 
	hurrybird_hisa.kenshin_kanri.shindenzukensasu 
	from hurrybird_hisa.kenshin_kanri 
	left join hurrybird_endo.kenshin_ecg 
	on 
	hurrybird_hisa.kenshin_kanri.id
	=hurrybird_endo.kenshin_ecg.kenshin_id  
	where 
	hurrybird_hisa.kenshin_kanri.id
	=:kenshin_id and hurrybird_endo.kenshin_ecg.state=1";
	$prepare=$dbh2->prepare($sql_k);
	$prepare->execute($bind);
	$kenshin_kanri_data=$prepare->fetch(PDO::FETCH_ASSOC);
	if($kenshin_kanri_data){
		$sql='SELECT id, created, original_path FROM ecgods_img WHERE kenshin_id=0 AND deleted=0';
		$prepare=$dbh->prepare($sql);
		$prepare->execute();
		$img_assign=$prepare->fetchAll(PDO::FETCH_ASSOC);
	}else{
		$img_assign="not";
	}
	$combine=[$kenshin_kanri_data,$img_assign];
	echo json_encode( array_values( $combine), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}

if($_POST["command"]=="put_number_dataget"){
	$bind=['kenshin_id'=>$_POST['kenshin_id']];
	$sql='SELECT 
	id, 
	CASE ecg_num 
		WHEN 0 THEN 
		concat((pg1_num + pg2_num),"@",id) 
		ELSE concat(ecg_num,"@",id)
	END
	as ecg_tmp_num,
	original_path,
	pg1_path,
	pg2_path
	FROM ecgods_img WHERE kenshin_id=:kenshin_id AND deleted=0';
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$image_datas=$prepare->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $image_datas), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}

if($_POST["command"]=="code_admin_allget"){
	$bind=['deleted'=>$_POST["deleted"]];
	$sql='SELECT 
	hurrybird_endo.ecg_code.id, 
	hurrybird_endo.ecg_code.opinion,
	hurrybird_endo.ecg_code.kana,
	ifnull(hurrybird_hisa.jugyoin.shimei,"TMS") as shimei,
	hurrybird_endo.ecg_code.created
	FROM hurrybird_endo.ecg_code 
	LEFT JOIN hurrybird_hisa.jugyoin 
	ON hurrybird_endo.ecg_code.who_added=hurrybird_hisa.jugyoin.id 
	WHERE deleted=:deleted';
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$code_admin_datas=$prepare->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $code_admin_datas), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}

if($_POST["command"]=="code_admin_edit"){
	$bind=['id'=>$_POST["id"]];
	$sql='SELECT 
	hurrybird_endo.ecg_code.id, 
	hurrybird_endo.ecg_code.opinion,
	hurrybird_endo.ecg_code.kana,
	ifnull(hurrybird_hisa.jugyoin.shimei,"TMS") as shimei,
	hurrybird_endo.ecg_code.created
	FROM hurrybird_endo.ecg_code 
	LEFT JOIN hurrybird_hisa.jugyoin 
	ON hurrybird_endo.ecg_code.who_added=hurrybird_hisa.jugyoin.id 
	WHERE hurrybird_endo.ecg_code.id=:id';
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$code_admin_edit=$prepare->fetch(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $code_admin_edit), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}

if($_POST["command"]=="code_admin_renew"){
	if( !isset( $_SESSION ) ) {
		session_start();
	}
	$who_added=(isset($_SESSION['dr_id']))?$_SESSION['dr_id']:"preset";//誰が追加したか
	if($_POST["id"]="new"){
		$sql='INSERT INTO ecg_code (opinion, kana, who_added, deleted, created) VALUES
		(:opinion, :kana, :who_added, 0, NOW())';
		$bind=['opinion'=>$_POST['opinion'], 'kana'=>$_POST['kana'],'who_added'=>$who_added];
	}else{
		$bind=['id'=>$_POST["id"], 'who_added'=>$who_added];
		$sql='UPDATE ecg_code 
		SET opinion=:opinion,kana=:kana,who_added=:who_added,created=NOW() 
		WHERE id=:id';
	}
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
}

if($_POST["command"]=="dr_ecg_dataget"){
	if( !isset( $_SESSION ) ) {
		session_start();
	}
	$bind=["dr_id"=>$_SESSION['dr_id']];
	$sql="SELECT * FROM dr_ecg WHERE dr_id=:dr_id";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$diagnosis_data=$prepare->fetch(PDO::FETCH_ASSOC);
	if(count($diagnosis_data)){
		echo json_encode( array_values( $diagnosis_data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );	
	}else{
		// $unzip_preference=[1=>39,2=>50,3=>92,4=>47,5=>,];
		//TODO
		$sql="INSERT dr_ecg SET dr_id=:dr_id, preference=:preference";
	}
}

if($_POST["command"]=="diagnosis_select_make"){
	$bind=["who_added"=>$_SESSION['dr_id']];
	$sql="(select id, opinion from ecg_code where deleted=0 and (common>0 or who_added=:who_added) order by freq desc limit 10)
		union all
		(select id, opinion from ecg_code where deleted=0 order by kana)";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$select_make=$prepare->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $select_make), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}



if($_POST["command"]=="diagnosis_dataget"){
	if( !isset( $_SESSION ) ) {
		session_start();
	}
	$bind=["dr_id"=>$_SESSION['dr_id'],"kenshin_id"=>$_POST['kenshin_id']];
	$sql="SELECT 
		kenshin_ecg.asked_date, 
		kenshin_ecg.due,
		ecgods_img.ecg_num, 
		ecgods_img.page,
		ecgods_img.original_path,
		ecgods_img.dia_state,
		ecgods_img.dia_text,
		ecgods_img.dia_code1,
		ecgods_img.dia_code2,
		ecgods_img.dia_code3,
		ecgods_img.dia_code4
	FROM kenshin_ecg 
	RIGHT JOIN ecgods_img ON kenshin_ecg.kenshin_id=ecgods_img.kenshin_id 
	WHERE kenshin_ecg.kenshin_id=:kenshin_id 
	AND ecgods_img.deleted=0 
	AND kenshin_ecg.dr_id=:dr_id 
	AND kenshin_ecg.state=3 ORDER by ecgods_img.ecg_num, ecgods_img.page";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$diagnosis_data=$prepare->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $diagnosis_data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}


if($_POST["command"]=="update_number"){
	$id=$_POST["id"];
	unset($_POST["command"]);
	unset($_POST["id"]);
	$bind=[];
	$ardata='';
	foreach($_POST as $key=>$value){
		$ardata.='(?,?),';
		$bind[]=$key;
		$bind[]=$value;
	}
	$ardata = rtrim($ardata, ',');
	$ardata.=' ';
	$sql='INSERT INTO ecgods_img (id, ecg_num) VALUES '.$ardata
    .'ON DUPLICATE KEY UPDATE ecg_num=VALUES(ecg_num)';
    echo $sql;
    $prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$bind2=["kenshin_id"=>$id, "kenshin_id2"=>$id];
	$sql2='INSERT INTO kenshin_ecg (numbered_num, kenshin_id) SELECT count(*) as numbered_num, :kenshin_id2 as kenshin_id FROM ecgods_img WHERE kenshin_id=:kenshin_id AND ecg_num>0 AND deleted=0 ON DUPLICATE KEY UPDATE numbered_num=VALUES(numbered_num)';
    $prepare=$dbh->prepare($sql2);
	$prepare->execute($bind2);
	$_POST["command"]="";
	var_dump($_POST);
}
if($_POST["command"]=="img_assign"){
	$id=$_POST["id"];
	unset($_POST["command"]);
	unset($_POST["id"]);
	var_dump($_POST);
	$bind=[];
	$ardata='';
	foreach($_POST as $key=>$value){
		$ardata.='(?,?),';
		$bind[]=$key;
		$bind[]=$id;
	}
	$ardata = rtrim($ardata, ',');
	$ardata.=' ';
	$sql='INSERT INTO ecgods_img (id, kenshin_id) VALUES '.$ardata
    .'ON DUPLICATE KEY UPDATE kenshin_id=VALUES(kenshin_id)';
    // echo $sql;
    $prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$bind2=["kenshin_id"=>$id,"kenshin_id2"=>$id];
	$sql2='INSERT INTO kenshin_ecg (all_num, kenshin_id) SELECT count(*) as all_num, :kenshin_id2 as kenshin_id FROM ecgods_img WHERE kenshin_id=:kenshin_id AND deleted=0 ON DUPLICATE KEY UPDATE all_num=VALUES(all_num)';
    $prepare=$dbh->prepare($sql2);
	$prepare->execute($bind2);
	$_POST["command"]="";
}

if($_POST["command"]=="image_server_delete"){
	var_dump($_POST);
	if($_POST["password"]=="leica"){
		echo unlink('../upload/'.$_POST['file_name']);
	}
}

if($_POST["command"]=="delete_img"){
	$bind=["id"=>$_POST['id']];
	$sql="UPDATE ecgods_img SET deleted=1 WHERE id=:id";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	//TODO
	$sql4='INSERT INTO kenshin_ecg (all_num, numbered_num, kenshin_id) 
	SELECT all_num, numbered_num, alln.kenshin_id FROM (SELECT count(*) as all_num, kenshin_id FROM ecgods_img WHERE kenshin_id=1095 AND deleted=0) as alln INNER JOIN (SELECT count(*) as numbered_num, kenshin_id FROM ecgods_img WHERE kenshin_id=1095 AND deleted=0 AND ecg_num>0) as num ON alln.kenshin_id=num.kenshin_id
	ON DUPLICATE KEY UPDATE all_num=VALUES(all_num), numbered_num=VALUES(numbered_num)';
	$sql5='INSERT INTO kenshin_ecg (all_num, numbered_num, kenshin_id) 
	SELECT all_num, numbered_num, alln.kenshin_id FROM (SELECT count(*) as all_num, kenshin_id FROM ecgods_img WHERE kenshin_id IN (SELECT kenshin_id FROM ecgods_img WHERE id=:id) AND deleted=0) as alln INNER JOIN (SELECT count(*) as numbered_num, kenshin_id FROM ecgods_img WHERE kenshin_id IN (SELECT kenshin_id FROM ecgods_img WHERE id=:id2) AND deleted=0 AND ecg_num>0) as num ON alln.kenshin_id=num.kenshin_id
	ON DUPLICATE KEY UPDATE all_num=VALUES(all_num), numbered_num=VALUES(numbered_num)';
	$bind2=["id"=>$_POST['id'],"id2"=>$_POST['id']];
	$prepare=$dbh->prepare($sql5);
	$prepare->execute($bind2);
}
if($_POST["command"]=="release_img"){
	$bind=["id"=>$_POST['id']];
	$sql="UPDATE ecgods_img SET kenshin_id=0 WHERE id=:id";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$sql5='INSERT INTO kenshin_ecg (all_num, numbered_num, kenshin_id) 
	SELECT all_num, numbered_num, alln.kenshin_id FROM (SELECT count(*) as all_num, kenshin_id FROM ecgods_img WHERE kenshin_id IN (SELECT kenshin_id FROM ecgods_img WHERE id=:id) AND deleted=0) as alln INNER JOIN (SELECT count(*) as numbered_num, kenshin_id FROM ecgods_img WHERE kenshin_id IN (SELECT kenshin_id FROM ecgods_img WHERE id=:id2) AND deleted=0 AND ecg_num>0) as num ON alln.kenshin_id=num.kenshin_id
	ON DUPLICATE KEY UPDATE all_num=VALUES(all_num), numbered_num=VALUES(numbered_num)';
	$bind2=["id"=>$_POST['id'],"id2"=>$_POST['id']];
	$prepare=$dbh->prepare($sql5);
	$prepare->execute($bind2);
}

if($_POST["command"]=="state_back"){
	echo $_POST['data_id'];
	$bind=["kenshin_id"=>$_POST['id']];
	if($_POST['data_id']==1){
		$sql="UPDATE ecgods_img set kenshin_id=0 where kenshin_id=:kenshin_id";
		$sql2="DELETE from kenshin_ecg WHERE kenshin_id=:kenshin_id";
	}
	if($_POST['data_id']==2){
		$sql="UPDATE kenshin_ecg set state=1 where kenshin_id=:kenshin_id";
		$sql2='';
	}
	if($_POST['data_id']==3){
		$sql="UPDATE ecgods_img set dia_state=0 where kenshin_id=:kenshin_id";
		$sql2="UPDATE kenshin_ecg set state=2, dr_id='' where kenshin_id=:kenshin_id";
	}
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	if($sql2!=''){	
		$prepare=$dbh->prepare($sql2);
		$prepare->execute($bind);
	}
}

if($_POST["command"]=="kenshin_ecg_init"){
	$bind0=['id1'=>$_POST['kenshin_id'],'id2'=>$_POST['kenshin_id'],
	'id3'=>$_POST['kenshin_id']];
	$bind=['kenshin_id'=>$_POST['kenshin_id']];
	$sql_k='SELECT 
	hurrybird_hisa.kenshin_kanri.id, 
	hurrybird_hisa.kenshin_kanri.hiduke,
	hurrybird_hisa.kenshin_kanri.jigyosho_meisho,
	hurrybird_hisa.kenshin_kanri.jusho, 
	hurrybird_hisa.jugyoin.shimei,
	hurrybird_hisa.kenshin_kanri.shindenzukensasu,
	hurrybird_endo.kenshin_ecg.due,
	alln.all_num,
	numn.numbered_num,
	hurrybird_endo.kenshin_ecg.diagnosed_num 
	from hurrybird_hisa.kenshin_kanri 
	left join hurrybird_endo.kenshin_ecg 
	on hurrybird_hisa.kenshin_kanri.id=hurrybird_endo.kenshin_ecg.kenshin_id 
	LEFT JOIN hurrybird_hisa.jugyoin
	ON hurrybird_endo.kenshin_ecg.dr_id
	= hurrybird_hisa.jugyoin.id
	LEFT JOIN (
		select count(*) as all_num, kenshin_id from hurrybird_endo.ecgods_img 
		where hurrybird_endo.ecgods_img.kenshin_id=:id1 and deleted=0
	) as alln
	ON hurrybird_endo.kenshin_ecg.kenshin_id
	= alln.kenshin_id
	LEFT JOIN (
		select count(*) as numbered_num, kenshin_id from hurrybird_endo.ecgods_img 
		where hurrybird_endo.ecgods_img.kenshin_id=:id2 and deleted=0
		and ecg_num>0
	) as numn
	ON hurrybird_endo.kenshin_ecg.kenshin_id
	= numn.kenshin_id
	where hurrybird_hisa.kenshin_kanri.id=:id3';
	$prepare=$dbh2->prepare($sql_k);
	$prepare->execute($bind0);
	$kenshin_kanri_data=$prepare->fetch(PDO::FETCH_ASSOC);
	
	$sql='SELECT * from kenshin_ecg where kenshin_id=:kenshin_id';
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$kenshin_ecg_data=$prepare->fetch(PDO::FETCH_ASSOC);
	// var_dump($kenshin_ecg_data);
	if(!$kenshin_ecg_data){
		$nodata=["state"=>0,"data"=>0,"kanri"=>$kenshin_kanri_data];
		echo json_encode( array_values( $nodata), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
		return;
	}else{
		switch($kenshin_ecg_data['state']){
			case 1: //preprocess
				$img_sql='SELECT id, ecg_num, original_path,page from ecgods_img where kenshin_id=:kenshin_id AND deleted=0 ORDER BY ecg_num, page';
				$prepare=$dbh->prepare($img_sql);
				$prepare->execute($bind);
				$img_list=$prepare->fetchAll(PDO::FETCH_ASSOC);
				$data=["state"=>1,"data"=>$img_list,"kanri"=>$kenshin_kanri_data];
				echo json_encode( array_values( $data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
				break;
			case 2: //医師assign待ち
				$dr_sql='SELECT id, shimei, furigana from jugyoin where shokushu_id="SNG01" order by furigana';
				$prepare=$dbh2->prepare($dr_sql);
				$prepare->execute();
				$dr_data=$prepare->fetchAll(PDO::FETCH_ASSOC);
				$data=["state"=>2,"data"=>$dr_data,"kanri"=>$kenshin_kanri_data];
				echo json_encode( array_values( $data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
				break;
			case 3: //医師診断中
				$data=["state"=>3,"data"=>0,"kanri"=>$kenshin_kanri_data];
				echo json_encode( array_values( $data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
				break;
			default:
				break;
		}
	}
}

if($_POST["command"]=="kenshin_ecg_browse_update"){
	$bind=["id"=>$_POST['id'],"ecg_num"=>$_POST['ecg_num'],"page"=>$_POST['page'],];
	$sql='UPDATE ecgods_img set ecg_num=:ecg_num, page=:page where id=:id';
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$bind2=["id"=>$_POST['id']];
	$sql2='INSERT INTO kenshin_ecg (numbered_num, kenshin_id) SELECT count(*) as numbered_num, kenshin_id FROM ecgods_img  
	WHERE kenshin_id IN (SELECT kenshin_id FROM ecgods_img WHERE id=:id) AND ecg_num>0 ON DUPLICATE KEY UPDATE numbered_num=VALUES(numbered_num)';
	$prepare=$dbh->prepare($sql2);
	$prepare->execute($bind2);
	// TODO
}


if($_POST["command"]=="kenshin_ecg_dbinsert"){
	$bind=["kenshin_id"=>$_POST['kenshin_id']];
	$sql='INSERT kenshin_ecg set kenshin_id=:kenshin_id,state=1,created=NOW(),modified=NOW()';
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
}

if($_POST["command"]=="office_admin_dataget"){
	$sql="SELECT 
	hurrybird_endo.kenshin_ecg.kenshin_id,
	hurrybird_hisa.kenshin_kanri.jigyosho_meisho, 
	hurrybird_hisa.kenshin_kanri.hiduke,
	hurrybird_endo.kenshin_ecg.state, 
	hurrybird_hisa.jugyoin.shimei,
	alln.all_num, 
	numn.numbered_num, 
	dian.diagnosed_num, 
	hurrybird_endo.kenshin_ecg.created, 
	hurrybird_endo.kenshin_ecg.modified
	FROM hurrybird_endo.kenshin_ecg
	LEFT JOIN hurrybird_hisa.kenshin_kanri
	ON hurrybird_endo.kenshin_ecg.kenshin_id
	= hurrybird_hisa.kenshin_kanri.id
	LEFT JOIN hurrybird_hisa.jugyoin
	ON hurrybird_endo.kenshin_ecg.dr_id
	= hurrybird_hisa.jugyoin.id 
	LEFT JOIN (SELECT count(*) as all_num, kenshin_id FROM ecgods_img WHERE deleted=0 GROUP BY kenshin_id) as alln
	ON alln.kenshin_id=hurrybird_hisa.kenshin_kanri.id
	LEFT JOIN (SELECT count(*) as numbered_num, kenshin_id FROM ecgods_img WHERE deleted=0 AND ecg_num>0 GROUP BY kenshin_id) as numn
	ON numn.kenshin_id=hurrybird_hisa.kenshin_kanri.id
	LEFT JOIN (SELECT count(*) as diagnosed_num, kenshin_id FROM ecgods_img WHERE deleted=0 AND dia_state=2 GROUP BY kenshin_id) as dian
	ON dian.kenshin_id=hurrybird_hisa.kenshin_kanri.id
	WHERE hurrybird_hisa.kenshin_kanri.id>0";
	$prepare=$dbh->prepare($sql);
	$prepare->execute();	
	$oa_data=$prepare->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $oa_data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );	
}

if($_POST["command"]=="kenshin_ecg_dr_assign"){
	$bind=["dr_id"=>$_POST['dr_id'], "kenshin_id"=>$_POST['kenshin_id'],
	"due"=>$_POST['due']];
	$sql="UPDATE kenshin_ecg SET dr_id=:dr_id, state=3, due=:due, modified=NOW(),asked_date=NOW() WHERE kenshin_id=:kenshin_id";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
}

if($_POST["command"]=="transition1_2"){
	$bind=["kenshin_id"=>$_POST['kenshin_id']];
	$sql="UPDATE kenshin_ecg SET state=2, modified=NOW() WHERE kenshin_id=:kenshin_id";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
}

if($_POST["command"]=="dr_index_dataget"){
	if( !isset( $_SESSION ) ) {
		session_start();
	}
	$bind=["dr_id"=>$_SESSION['dr_id']];
	$sql="SELECT 
	hurrybird_hisa.kenshin_kanri.id, 
	hurrybird_hisa.kenshin_kanri.jigyosho_meisho,
	hurrybird_hisa.kenshin_kanri.hiduke,
	hurrybird_endo.kenshin_ecg.diagnosed_num,
	hurrybird_endo.kenshin_ecg.all_num,
	hurrybird_endo.kenshin_ecg.asked_date,
	hurrybird_endo.kenshin_ecg.due
	from hurrybird_hisa.kenshin_kanri 
	left join hurrybird_endo.kenshin_ecg 
	on 
	hurrybird_hisa.kenshin_kanri.id
	=hurrybird_endo.kenshin_ecg.kenshin_id  
	where 
	hurrybird_endo.kenshin_ecg.dr_id
	=:dr_id and hurrybird_endo.kenshin_ecg.state>2";
	$prepare=$dbh->prepare($sql);
	$prepare->execute($bind);
	$di_data=$prepare->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode( array_values( $di_data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
}

if($_POST["command"]=="img_admin_dataget"){

}
