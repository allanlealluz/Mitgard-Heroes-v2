<?php

Class Funcoes{
    private $pdo;
   
    function __construct($host,$dbname,$user,$password,$charset) {
        try {
           $this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname.';charset='.$charset,$user,$password);  
        }  catch (PDOException $ex){
            echo 'Erro PDO:'.$ex->getMessage(),$ex->getLine(),$ex->getFile();
        } catch (Exception $ex){
            echo 'Erro:'.$ex->getMessage(),$ex->getLine(),$ex->getFile();
        }
       
    }
    function InserirPersonagem($nome,$descricao,$hab1,$hab2,$hab3,$hab4,$hab5,$vida,$defesa,$ini,$armadura,$duracao_arm,$raridade,$imagem = array() ,$banner = array()){
        $cmd = $this->pdo->prepare("INSERT INTO personagens (nome,descricao,hab1,hab2,hab3,hab4,hab5,vida,defesa,ini,armadura,duracao_arm,nome_imagem,banner,raridade) VALUES (:n,:d,:h1,:h2,:h3,:h4,:h5,:v,:s,:in,:a,:d,:i,:b,:r)");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":d", $descricao);
        $cmd->bindValue(":h1", $hab1);
        $cmd->bindValue(":h2", $hab2);
        $cmd->bindValue(":h3", $hab3);
        $cmd->bindValue(":h4", $hab4);
        $cmd->bindValue(":h5", $hab5);
        $cmd->bindValue(":v", $vida);
        $cmd->bindValue(":s", $defesa);
        $cmd->bindValue(':in', $ini);
        $cmd->bindValue(":a", $armadura);
        $cmd->bindValue('d', $duracao_arm);
        $cmd->bindValue(":i", $imagem);
        $cmd->bindValue(":b", $banner);
        $cmd->bindValue(":r", $raridade);
        $cmd->execute();
    }
    function BuscarPersonagens(){
        $cmd = $this->pdo->prepare('SELECT AVG(nota) as avaliacao,personagens.nome_imagem, personagens.nome,personagens.id, AVG(avaliação.mundo) as mun, AVG(avaliação.chefe)as che FROM avaliação RIGHT JOIN personagens ON avaliação.fk_personagem = personagens.id group by personagens.id ');
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
     function BuscarPersonagensPorAvaliacao(){
        $cmd = $this->pdo->prepare('SELECT AVG(nota) as avaliacao,personagens.nome_imagem, personagens.nome,personagens.id, AVG(avaliação.mundo) as mun, AVG(avaliação.chefe)as che FROM avaliação JOIN personagens ON avaliação.fk_personagem = personagens.id  group by personagens.id order by AVG(avaliação.nota) desc ,AVG(avaliação.mundo) desc, AVG(avaliação.chefe) desc   ');
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
    function BuscarPersonagemPorRari(){
        
    }
    function BuscarPersonagensPorNome($nome){
        $cmd = $this->pdo->prepare("SELECT AVG(nota) as avaliacao,personagens.nome_imagem, personagens.nome,personagens.id, AVG(avaliação.mundo) as mun, AVG(avaliação.chefe)as che FROM avaliação  JOIN personagens ON personagens.id = avaliação.fk_personagem  WHERE personagens.nome LIKE CONCAT('%',:n,'%')  group by personagens.nome ");
        $cmd->bindValue(":n", $nome);
        $cmd->execute();
        $dados = $cmd->fetchAll();
        return $dados;
    }
    function Cadastrar($nome,$email,$senha){
        $cmd = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :e');
        $cmd->bindValue(':e', $email);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            return false;
        }else{
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (:n,:e,:s)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();
            
        }
    }
    function Entrar($email,$senha){
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            $dados = $cmd->fetch();
            session_start();
            if($dados['id'] == 1){
                $_SESSION['id_master'] = 1;
            }else{
                $_SESSION['id_user'] = $dados['id'];
            }
            return true;
        }else{
            return false;
        }
    }
    function Votar($id,$arena,$mundo,$chefe,$id_personagem){
       /* $cmd = $this->pdo->prepare("SELECT * FROM avaliação WHERE fk_pessoa = :id");
        $cmd->bindValue(':id', $id);
        $cmd->execute();
        if($cmd->rowCount() > 0 ){
        */    
        //}else{
            $cmd = $this->pdo->prepare("INSERT INTO avaliação (nota,mundo,chefe,fk_pessoa,fk_personagem) VALUES (:n,:m,:c,:fkpe,:fkps)");
            $cmd->bindValue(':fkpe', $id);
            $cmd->bindValue(':n', $arena);
            $cmd->bindValue(':m', $mundo);
            $cmd->bindValue(':c', $chefe);
            $cmd->bindValue(':fkps', $id_personagem);
            $cmd->execute();
        }
        function BuscarPersonagemPorID($id){
            $cmd = $this->pdo->prepare("SELECT * FROM personagens WHERE id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $dados = $cmd->fetchAll();
            return $dados;
        }
        
    }
//}
