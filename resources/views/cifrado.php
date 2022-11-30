<?php 

    function cifrar($mensaje, $clave) {
        $menEncriptado= '';
        $tamMensaje = strlen($mensaje);
        $numColumnas = ceil($tamMensaje / $clave);
        

        //echo $tamMensaje . ' ' . $numColumnas;
        
        $contador =0;
        for ($i=0; $i<$clave; $i++){
            for ($j=0; $j<$numColumnas; $j++){
                if($contador<$tamMensaje){
                    $matriz[$i][$j] = $mensaje[$contador];
                    $contador++;
                }
                else{
                    $matriz[$i][$j] = ' ';
                }
            }
        }

        //asignar el mensaje cifrado, recorre la matriz
        for ($i=0; $i<$numColumnas; $i++){
            for ($j=0; $j<$clave; $j++){
                $menEncriptado.=$matriz[$j][$i];
                //echo $menEncriptado;
            }
        }

        return $menEncriptado;
    }

    function desCifrar($mensajeEn, $clave) {
        $menDesEncriptado= '';
        $tamMensaje = strlen($mensajeEn);
        $numColumnas = ceil($tamMensaje / $clave);
        

        //echo $tamMensaje . ' ' . $numColumnas;
        
        $contador =0;
        for ($i=0; $i<$numColumnas; $i++){
            for ($j=0; $j<$clave; $j++){
                if($contador<$tamMensaje){
                    $matriz[$j][$i] = $mensajeEn[$contador];
                    $contador++;
                }
                else{
                    $matriz[$i][$j] = ' ';
                }
            }
        }

        //asignar el mensaje cifrado, recorre la matriz
        for ($i=0; $i<$clave; $i++){
            for ($j=0; $j<$numColumnas; $j++){
                $menDesEncriptado.=$matriz[$i][$j];
                //echo $menEncriptado;
            }
        }

        return $menDesEncriptado;
    }




?>