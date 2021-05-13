<?php 
require_once '../app/model/unidade.class.php';
$u= new Unidade();
$u->login();
// $sw = isset($_GET['key']) ? $_GET['key'] : '';
// switch ($sw) {
// 	case 'login':
// 		echo autoCompleteLogin();
// 		break;
	
// 	default:
// 		break;
// }

// function autoCompleteLogin(){
// 	$conn = new Database();
// 	if(isset($_POST['query'])){
// 		$query = "SELECT id, nome_do_estabelecimento, ativo FROM tb_unidades WHERE nome_do_estabelecimento LIKE '%".$_POST['query']."%' AND ativo = 1 LIMIT 10";
		
// 		$res = $conn->runQuery($query);
		
// 		$text = "<ul>";
// 		if($res->rowCount() > 0){
// 			while($row = $res->fetch(PDO::FETCH_ASSOC)){
// 				$text .= "<option value='".$row['id']."'>".$row['id']." # " .$row['nome_do_estabelecimento']."</option>";
// 			}
// 		}else{
// 			$text .= "<option value=''> NAO ENCONTRADO </option>";
// 		}

// 		$text .= "</ul>";
// 		echo $text;
// 	}
//}