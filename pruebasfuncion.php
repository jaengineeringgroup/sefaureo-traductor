<?php
session_start();
$_SESSION['textoEnc'];
include_once 'bootstrap.php';
include 'diccionario.php';
// New Word Document
function multiexplode($delimiters, $string)
{
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters [0], $ready);
    return $launch;
    echo "<br>";
}
$phpWord = new \PhpOffice\PhpWord\PhpWord();
// Ads styles
$phpWord->addParagraphStyle('pStyle', array('spacing' => 100));
$phpWord->addFontStyle('BoldText', array('bold' => true));
$phpWord->addFontStyle('ColoredText', array('color' => 'FF8080', 'bgColor' => 'FFFFCC'));
$phpWord->addLinkStyle(
    'NLink', array('color' => '0000FF', 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE)
);

$textenc=$_SESSION['textoEnc'];
$sepenc = multiexplode($separadores, $textenc);
//Creando el string de salida
$textoenc =implode("",$sepenc);
$separacionenc=multiexplode("p",$textoenc);
$identificadores1enc=str_replace($remplazadores,$cambiados,$textoenc);
//creando array de trabajo
$probandoenc=multiexplode($probadores,$identificadores1enc);
$finalenc=array_filter($probandoenc);
// New portrait section
$section = $phpWord->addSection();
// Add text run
$Encabezado = $section->addHeader();
$celda = $Encabezado->addTable()->addRow();
$celda1=$celda->addCell(30*50);
$celda2=$celda->addCell(100*50);
$celas2 = $celda2->addTextRun('pStyle');
//Obteniendo posiciones
foreach ($finalenc as $pruebasenc) {
    $r = $pruebasenc;
    $estilado = multiexplode($separadorestilos, $r);
    $estilc = array_filter($estilado);
    foreach ($estilc as $estilole) {
        print_r($estilole);
        $d=$estilole;
        echo "<br>";
        $contenido=str_replace($cambiartext,"",$d);
        $acentosvoenc=str_replace($acentos,$letras,$contenido);
        $textos1=substr($acentosvoenc,strripos($acentosvoenc,";"));
        $textfinalenc=str_replace(";","",$textos1);
        echo $textfinalenc;
        //Obteniendo posiciones
        $possifo = strpos($d, "tamaño") + 9; //tamaño de letra
        $poslet = strpos($d, "letra") + 6; //color de letra
        $posfon = strpos($d, "fondo") + 6; //color de fondo
        $posfont = (strpos($d, "Tipofuente")) + 11;//nombre de fuente
        $posfontf = strpos($d, ","); // posicion final de fuente
        $posvarf = strpos($d, "¿/codigo?");//posicion final de la variable
        $posvari = (strpos($d, "¿codigo?") + 9);//posicion inicial de la variable

        if ($variable = strpos($d, "codigo") !== false) {
            $variable = substr($d, $posvari, $posvarf - $posvari);
        } else {

            $variable = " ";
        }
        //Tipo de Letra
        $letra = ($letra = strpos($d, "Tipofuente") == false) ? "arial" : substr($b, $posfont, 20);
        //obtener tamaño de letra
        if ($sizefont = strpos($d, "tamaño") == false) {
            $sizefont = "12";
        } else {
            $sizefont = substr($d, $possifo, 2);


        }
        //obtener color de fondo
        if ($codfon = strpos($d, "fondo") == false) {
            $codfon = "FFFFFF";
        } else {
            $codfon = substr($d, $posfon, 6);

        }
        //obtener color de letra
        if ($codlet = strpos($d, "letra") == false) {
            $codlet = "000000";
        } else {
            $codlet = substr($d, $poslet, 6);

        }

        if ($negrita = strpos($d, "strong") !== false) {
            $negrita = true;
        } else {
            $negrita = false;
        }
        //Cursiva
        if ($italica = strpos($d, "csva") !== false) {
            $italica = true;
        } else {
            $italica = false;
        }
        //Subrayado
        if ($subra = strpos($d, "underline") !== false) {
            $subra = "single";
        } else {
            $subra = "none";
        }
        //Superindice
        if ($supind = strpos($d, "/sup") !== false) {
            $supind = true;
        } else {
            $supind = false;
        }
        //subindice
        if ($subind = strpos($d, "/sub") !== false) {
            $subind = true;
        } else {
            $subind = false;
        }
        //Tachado
        if ($tacha = strpos($d, "line-through;") !== false) {
            $tacha = true;
        } else {
            $tacha = false;
        }
        $celas2->addText($textfinalenc, array('doubleStrikethrough' => $tacha, 'bgcolor' => $codfon, 'underline' => $subra
        , 'bold' => $negrita, 'italic' => $italica, 'size' => $sizefont, 'superScript' => $supind, 'color' => $codlet
        , 'subScript' => $subind));
    }
    $celas2->addTextBreak();
}
//$celda->addCell()->addText("hola como estas 2");
// Save file
$objWriter = \PhpOffice\PhpWord\IOFactory:: createWriter($phpWord, 'Word2007');
$objWriter->save('estilotextrun.docx');
?>