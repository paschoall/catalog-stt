<?php 
    // DEU RUIM DA CTRL Z
    include ('../../database_credentials.php');
    session_start();
    //Declara quais varivais são obrigatoria e quais são multivaloradas
    $obrigatorios = ["titulo", "idioma", "repositorio","descricao", "descricao_educacional", "entidade_contribuinte", "versao", "status", "formato", "localizacao", "requisitos_tecnologicos", "instrucoes_instalacao", "tipo_interatividade", "tipo_recurso", "creative_commons", "copyright"];
    $multivalorado = ["autor_recurso", "palavraschave", "niveis", "tecnica", "criterio"];
    $error = [];

    foreach($obrigatorios as $o){
        if(strlen($_POST[$o]) == 0 ){
            $error["campo_em_branco"][$o] = $o;
        }
    }

    foreach($multivalorado as $o){
        $_POST[$o] = explode(", ", $_POST[$o]);
        if(count($_POST[$o]) == 0 ){

            $error["campo_vazio"][$o] = $o;
        }
    }

    foreach($_POST["autor_recurso"] as $email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error["email"] = "Email inválido";
        }
    }   

    if(count($error) == 0){
        $mysqli = new mysqli($hostname, $username , $password , $database);


        $mysqli->autocommit(FALSE);
        $mysqli->begin_transaction();
        try {
            $query = "INSERT INTO ";
            $query .= "RECURSO(";
            $query .= "cadastrador, titulo, idioma, descricao, repositorio, versao, status, ";
            $query .= "entidade_contribuinte, formato, tamanho, localizacao, ";
            $query .= "requisitos_tecnologicos, instrucoes_instalacao, duracao, ";
            $query .= "tipo_interatividade, tipo_recurso, descricao_educacional, ";
            $query .= "custo, creative_commons, copyright) ";
            $query .= "values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($query);
            if ($stmt === FALSE) {
                die ("Mysql Error: " . $mysqli->error);
            }
            $stmt->bind_param('sssssssssisssisssiss',
                $_SESSION['email'],
                $_POST['titulo'],
                $_POST['idioma'],
                $_POST['descricao'],
                $_POST['repositorio'],
                $_POST['versao'],
                $_POST['status'],
                $_POST['entidade_contribuinte'],
                $_POST['formato'],
                $_POST['tamanho'],
                $_POST['localizacao'],
                $_POST['requisitos_tecnologicos'],
                $_POST['instrucoes_instalacao'],
                $_POST['duracao'],
                $_POST['tipo_interatividade'],
                $_POST['tipo_recurso'],
                $_POST['descricao_educacional'],
                $_POST['custo'],
                $_POST['creative_commons'],
                $_POST['copyright']
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
        echo json_encode($error);
    }