<?php
session_start();
$_SESSION['probando']=htmlspecialchars($_POST['textos1']);
$text=$_SESSION['probando'];
include 'diccionario.php';
function multiexplode($delimiters, $string)
{
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters [0], $ready);
    return $launch;
    echo "<br>";
}
echo("<pre>");
//separando el string por etiquetas para el cuerpor del documento
$text=$_SESSION['probando'];
$sepetiquetas = multiexplode($separadores, $text);
//Creando el string de salida
$texto =implode("",$sepetiquetas);
//Cambiando las etiquetas de parrafo
$separacion=multiexplode("p",$texto);
//Creando identificadores
$identificadores1=str_replace($remplazadores,$cambiados,$texto);
//creando array de trabajo
$probando=multiexplode($probadores,$identificadores1);
/*
 * *///separando el string por etiquetas para el cuerpo del pie de pagina
$textpie=$_SESSION['textoPie'];
$seppie = multiexplode($separadores, $textpie);
//Creando el string de salida
$textopie =implode("",$seppie);
//Cambiando las etiquetas
$separacionpie=multiexplode("p",$textopie);
$identificadores1pie=str_replace($remplazadores,$cambiados,$textopie);
//creando array de trabajo
$probandopie=multiexplode($probadores,$identificadores1pie);
$finalpie=array_filter($probandopie);
/*
 * */
// Separando el string por etiquetas para el encabezado
$textenc=$_SESSION['textoEnc'];
$sepenc = multiexplode($separadores, $textenc);
//Creando el string de salida
$textoenc =implode("",$sepenc);
$separacionenc=multiexplode("p",$textoenc);
$identificadores1enc=str_replace($remplazadores,$cambiados,$textoenc);
//creando array de trabajo
$probandoenc=multiexplode($probadores,$identificadores1enc);
$finalenc=array_filter($probandoenc);

include_once 'creararchivo.php';
?>



