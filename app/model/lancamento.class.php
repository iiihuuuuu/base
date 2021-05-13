<?php

require_once 'database.class.php';
class Lancamento {

    private $db;

    private $id;  
    private $idTbLaboratorio;
    private $idTbQuestoes;  
    private $qde; 
    private $idTbUnidades;  
    private $dhEntrada;  
    private $ipRemoto;   
    private $nomeDigitador;  
    private $telefoneDigitador;
    
    public function __construct(){
        $this->db = new Database();
        $this->idTbUnidades = $_SESSION['id'];
    } 
    
    public function create($lancamento, $table) {
        try{
            
            $idColumn = ($table=="tb_lancamentos_excluidos")? "id,":"";
            $idValue = ($table=="tb_lancamentos_excluidos")? ":id,":"";

            $query = "INSERT INTO $table ($idColumn id_tb_laboratorio, id_tb_questoes, qde, id_tb_unidades, dh_entrada, ip_remoto, nome_digitador, telefone_digitador) 
            VALUES ($idValue :id_tb_laboratorio, :id_tb_questoes, :qde, :id_tb_unidades, :dh_entrada, :ip_remoto, :nome_digitador, :telefone_digitador)";

            $conn = $this->db->getConnection();
            $sql = $conn->prepare($query);

            if($table=="tb_lancamentos_excluidos"){
                $sql->bindValue(":id", $lancamento->getId(), PDO::PARAM_INT);              
            }
            $sql->bindValue(":id_tb_laboratorio", $lancamento->getIdTbLaboratorio(), PDO::PARAM_INT);
            $sql->bindValue(":id_tb_questoes", $lancamento->getIdTbQuestoes(), PDO::PARAM_INT);
            $sql->bindValue(":qde", $lancamento->getQde(), PDO::PARAM_INT);
            $sql->bindValue(":id_tb_unidades", $lancamento->getIdTbUnidades(), PDO::PARAM_INT);
            $sql->bindValue(":dh_entrada", $lancamento->getDhEntrada(), PDO::PARAM_STR);
            $sql->bindValue(":ip_remoto", $lancamento->getIpRemoto(), PDO::PARAM_STR);
            $sql->bindValue(":nome_digitador", $lancamento->getNomeDigitador(), PDO::PARAM_STR);
            $sql->bindValue(":telefone_digitador", $lancamento->getTelefoneDigitador(), PDO::PARAM_STR);
            $sql->execute();

        } catch(PDOException $pdoe){
            echo "<script> alert('".$pdoe->getMessage()."') </script>";
        }
    }


    public function consultarUltimoLancamento($opcao) {
        $sql = "SELECT la.* 
        FROM tb_lancamentos la, tb_laboratorios lab, tb_unidades uni
        WHERE lab.id = la.id_tb_laboratorio
        AND lab.ativo = 1
        AND la.id_tb_unidades = '$this->idTbUnidades'
        AND uni.id = la.id_tb_unidades
        AND la.dh_entrada = (select max(dh_entrada) from tb_lancamentos WHERE tb_lancamentos.id_tb_unidades = '$this->idTbUnidades')";
        $result = $this->db->runSelect($sql);                        
        return ($opcao=="JSON")?json_encode($result, JSON_UNESCAPED_UNICODE):$result;     
    }   
    
    public function consultarAlgumLancamentoNoDia() {
        $sql = "select * from tb_lancamentos where DATE(dh_entrada) = curdate() AND id_tb_unidades = '$this->idTbUnidades'";
        $result = $this->db->runSelect($sql);       
        var_dump($result);                 
        return $result;     
    }   


    public function getUltimaQtd($idLab, $idQto) {
        $sql = "SELECT qde FROM tb_lancamentos WHERE dh_entrada = (SELECT MAX(dh_entrada) 
                FROM tb_lancamentos) AND id_tb_laboratorio=$idLab AND id_tb_questoes=$idQto";
        return $this->db->runQueryFetch($sql);        
    } 

    public function delete($lancamento) {
        try {
            $query = "DELETE FROM tb_lancamentos WHERE id=:id";
            $conn = $this->db->getConnection();
            $sql = $conn->prepare($query);
            $sql->bindValue(":id", $lancamento->getId(), PDO::PARAM_INT);
            $sql->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function inserirLancamentosExcluidos($listaLancamentosNoDia){
        foreach($listaLancamentosNoDia as $row){
            $lancamento = new Lancamento();     
            $lancamento->setId(intval($row['id']));
            $lancamento->setIdTbLaboratorio(intval($row['id_tb_laboratorio'])); 
            $lancamento->setIdTbQuestoes(intval($row['id_tb_questoes']));
            $lancamento->setQde(intval($row['qde']));
            $lancamento->setIdTbUnidades(intval($row['id_tb_unidades']));
            $lancamento->setDhEntrada($row['dh_entrada']);
            $lancamento->setIpRemoto($row['ip_remoto']);
            $lancamento->setNomeDigitador($row['nome_digitador']);
            $lancamento->setTelefoneDigitador($row['telefone_digitador']);      
            $lancamento->create($lancamento,"tb_lancamentos_excluidos");
            $lancamento->delete($lancamento);
        }
    }


    function inserirLancamentos(){
       $post = $_POST['form'];   
       date_default_timezone_set('America/Sao_Paulo');
       $dh_entrada = date("Y/m/d H:i:s"); 
       $ip_remoto = $_SERVER['REMOTE_ADDR'];
       $id_tb_unidades = $_SESSION['id'];    
       $nomeDigitador="";
       $telefoneDigitador="";
       for($i=0; $i < count($post); $i++){
            if($post[$i]['name'] == 'nome'){
                $nomeDigitador = $post[$i]['value'];

            }if($post[$i]['name'] == 'telefone'){
                $telefoneDigitador = $post[$i]['value'];
            }
       }
       for($i=0; $i < (count($post) -2); $i++){
            $lancamento = new Lancamento();     
            if(is_numeric($post[$i]['name'][1])){ $lancamento->setIdTbLaboratorio($post[$i]['name'][1]); }
            if(is_numeric($post[$i]['name'][4])){ $lancamento->setIdTbQuestoes($post[$i]['name'][4]); };
            if($post[$i]['name'] != 'nome' && $post[$i]['name'] != 'telefone'){ $lancamento->setQde($post[$i]['value']);}   
            $lancamento->setIdTbUnidades($id_tb_unidades);
            $lancamento->setDhEntrada($dh_entrada);
            $lancamento->setIpRemoto($ip_remoto);
            $lancamento->setNomeDigitador($nomeDigitador);
            $lancamento->setTelefoneDigitador($telefoneDigitador);      
            $lancamento->create($lancamento,"tb_lancamentos");
        }
    }


    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id; }
   
    public function getIdTbLaboratorio(){ return $this->idTbLaboratorio;}
    public function setIdTbLaboratorio($idTbLaboratorio){ $this->idTbLaboratorio = $idTbLaboratorio; }
    
    public function getIdTbQuestoes(){ return $this->idTbQuestoes;}
    public function setIdTbQuestoes($idTbQuestoes){ $this->idTbQuestoes = $idTbQuestoes; }
    
    public function getQde(){ return $this->qde;}
    public function setQde($qde){ $this->qde = $qde; }

    public function getIdTbUnidades(){ return $this->idTbUnidades;}
    public function setIdTbUnidades($idTbUnidades){ $this->idTbUnidades = $idTbUnidades; }
    
    public function getDhEntrada(){ return $this->dhEntrada;}
    public function setDhEntrada($dhEntrada){ $this->dhEntrada = $dhEntrada; }

    public function getIpRemoto(){ return $this->ipRemoto;}
    public function setIpRemoto($ipRemoto){ $this->ipRemoto = $ipRemoto; }

    public function getNomeDigitador(){ return $this->nomeDigitador;}
    public function setNomeDigitador($nomeDigitador){ $this->nomeDigitador = $nomeDigitador; }
    
    public function getTelefoneDigitador(){ return $this->telefoneDigitador;}
    public function setTelefoneDigitador($telefoneDigitador){ $this->telefoneDigitador = $telefoneDigitador; }   

    public function getDb() {return $this->db; }
    public function setDb($db) { $this->db = $db; return $this;}
   
}