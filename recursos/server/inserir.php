<?php 
    // DEU RUIM DA CTRL Z
    include ('../../database_credentials.php');
    session_start();
    //Declara quais varivais são obrigatoria e quais são multivaloradas
    $obrigatorios = ["titulo", "idioma", "repositorio","descricao", "versao", "status", "localizacao"];
    //formato, tipo_interatividade, tipo_recurso, descricao_educacional, copyright
    $multivalorado = ["autor_recurso", "entidade_contribuinte", "palavraschave", "niveis", "tecnica", "criterio"];
    $error = [];

    foreach($obrigatorios as $o){
        if(strlen($_POST[$o]) == 0 ){
            $error["campo_em_branco"][$o] = $o;
        }
    }

    foreach($multivalorado as $o){
        $_POST[$o] = explode(",", $_POST[$o]);
        if(count($_POST[$o]) == 0 ){

            $error["campo_vazio"][$o] = $o;
        }
    }

    foreach($_POST["autor_recurso"] as $email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error["email"] = "Email inválido";
        }

    }

    $mysqli = new mysqli($hostname, $username , $password , $database);

    foreach($_POST["autor_recurso"] as $email){
        
        $result = $mysqli->query("SELECT COUNT(*) FROM USUARIO WHERE EMAIL = '$email'");
        $row = $result->fetch_row();

        if ($row[0] == 0) {
            $error["nao_cad_email"] = $email;
        }
    }

    $mysqli->close();

    if(count($error) == 0){
        $mysqli = new mysqli($hostname, $username , $password , $database);

        $mysqli->set_charset("utf8mb4");


        $mysqli->autocommit(FALSE);
        $mysqli->begin_transaction();
        try {
            $query = "INSERT INTO ";
            $query .= "RECURSO(";
            $query .= "cadastrador, titulo, idioma, descricao, repositorio, versao, status, ";
            $query .= "localizacao, ";
            $query .= "requisitos_tecnologicos, instrucoes_instalacao, ";
            $query .= "creative_commons) ";
            $query .= "values(?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($query);
            if ($stmt === FALSE) {
                die ("Mysql Error: " . $mysqli->error);
            }

            $requisitos_tec = $_POST['requisitos_tecnologicos'];
            $intrucoes_instal = $_POST['instrucoes_instalacao'];
            $creative_comm = $_POST['creative_commons'];

            if( empty($requisitos_tec) ){
                $requisitos_tec = "Não há requisitos tecnológicos";
            }

            if( empty($intrucoes_instal) ){
                $intrucoes_instal = "Não há instruções para instalação";
            }

            if( empty($creative_comm) ){
                $creative_comm = "Não há creative commons";
            }

            $stmt->bind_param('sssssssssss',
                $_SESSION['email'],
                $_POST['titulo'],
                $_POST['idioma'],
                $_POST['descricao'],
                $_POST['repositorio'],
                $_POST['versao'],
                $_POST['status'],
                $_POST['localizacao'],
                $requisitos_tec, // $_POST['requisitos_tecnologicos']
                $intrucoes_instal, // $_POST['instrucoes_instalacao']
                $creative_comm //$_POST['creative_commons']
            );
            $stmt->execute();

            $id_recurso = $stmt->insert_id;


            foreach($multivalorado as $table_name){
                foreach($_POST[$table_name] as $name){
                    if (!$mysqli->query("INSERT INTO ".strtoupper($table_name)."(nome, id_recurso) values('".$name."', '".$id_recurso."')")) {
                        printf("Error: %s\n", $mysqli->error);
                    }
                   
                }
            }

        } catch (Exception $e) {
            //caso ocorra um erro na execuçaõ do sql


            $error["mysql"] = $e->getMessage();
            echo "ex:";
            echo $e->getMessage();

            //Retorna as condiçoes anteriores
            $mysqli->rollback();
            throw $e;
        }
        $mysqli->commit();
        $retorno = [
            'sucesso' => 'Recurso cadastrado com sucesso. Ele estará disponível após aprovação'
        ];

        echo json_encode($retorno);
    }else{
        echo json_encode(array(false, $error));
    }