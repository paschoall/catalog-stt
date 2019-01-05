<?php 

    include "../database_credentials.php";
    //Declara quais varivais são obrigatoria e quais são multivaloradas
    $obrigatorios = ["titulo", "idioma", "repositorio", "descricao", "entidade_contribuinte", "versao", "status", "formato", "localizacao", "requisitos_tecnologicos", "instrucoes_instalacao", "tipo_interatividade", "tipo_recurso", "creative_commons", "copyright"];
    $multivalorado = ["autor_recurso", "palavraschave", "niveis", "tecnica", "criterio"];
    $error = [];

    foreach($obrigatorios as $o){
        if(strlen($_POST[$o]) == 0 ){
            $error["campo_em_branco"][$o] = $o;
        }
    }

    foreach($obrigatorios as $o){
        if(sizeof($_POST[$o]) == 0 ){
            $error["campo_vazio"][$o] = $o;
        }
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Email inválido";
    }

    if(count($error) == 0){
        $mysqli = new mysqli($hostname, $username , $password , $database);


        $mysqli->autocommit(FALSE);
        $mysqli->begin_transaction();
        try {
            $query = "INSERT INTO ";
            $query .= "recurso(";
            $query .= "titulo, idioma, descricao, repositorio, versao, status, ";
            $query .= "entidade_contribuinte, formato, tamanho, localizacao, ";
            $query .= "requisitos_tecnologicos, instrucoes_instalacao, duracao, ";
            $query .= "tipo_interatividade, tipo_recurso, descricao_educacional, ";
            $query .= "custo, creative_commons, copyright)";
            $query .= "values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('ssssssssisssisssissi',
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
                $_POST['copyright'],
                0
            );
            $stmt->execute();

            $id_recurso = $stmt->insert_id;

            foreach($multivalorado as $table_name){
                foreach($_POST[$table_name] as $name){
                    $mysqli->query("INSERT INTO ".$table_name."(nome, id_recurso) values('".$name."', '".$id_recurso."')");
                }
            }

        } catch (Exception $e) {
            //caso ocorra um erro na execuçaõ do sql


            $error["mysql"] = $e->getMessage();

            echo json_encode($error);

            //Retorna as condiçoes anteriores
            $mysqli->rollback();
            throw $e;
        }
        $mysqli->commit();


    }else{
        echo json_encode($error);
    }