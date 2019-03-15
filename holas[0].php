<?php 
    session_start();
    include_once 'bootstrap.php';
    include_once 'diccionario.php';
      
      
      $phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addParagraphStyle('pStyle', array('spacing' => 100));
$section=$phpWord->addSection();
$Encabezado = $section->addHeader();
$celda = $Encabezado->addTable()->addRow();
switch ($_SESSION['encabezado']) {
    case 1:

        //Agregar imagen a la izquierda y texto
        $celda1=$celda->addCell(30*50);
        $celda2=$celda->addCell(70*50);
        $celdas1=$celda1->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $celas2 = $celda2->addTextRun('pStyle');
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
                $celas2->addText($textfinalenc."", array('doubleStrikethrough' => $tacha, 'bgcolor' => $codfon, 'underline' => $subra
                , 'bold' => $negrita, 'italic' => $italica, 'size' => $sizefont, 'superScript' => $supind, 'color' => $codlet
                , 'subScript' => $subind));
            }
            $celas2->addLine();
        }
        break;
    case 2:
        $celda1=$celda->addCell(70*50);
        $celda2=$celda->addCell(30*50);
        //Agregar imagen a la derecha y texto
        $celas2 = $celda1->addTextRun('pStyle');
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
            $celas2->addTextBreak(1);
        }
        $celdas1=$celda2->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        break;
    case 3:
        //Agregar imagen a la izquierda
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $texto = $table->addCell(30 * 50)->addText();
        break;
    case 4:
        //Agregar imagen a la derecha
        $texto = $table->addCell(30 * 50)->addText();
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        break;
    case 5:
        //Agregar texto
        $celda1=$celda->addCell(100*50);
        $celas2 = $celda1->addTextRun('pStyle');
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
            $celas2->addTextBreak(1);
        }
        break;
    case 6:
        //Agregar vacio
        $texto = $table->addCell(70 * 50);
        break;

}
//Creando pie de pagina
$Encabezado = $section->addFooter();
$celda = $Encabezado->addTable()->addRow();
//Obtencion de contenido del Encabezado
switch ($_SESSION['PiePagina']) {
    case 1:
        //Agregar imagen a la izquierda y texto
        $celda1=$celda->addCell(30*50);
        $celda2=$celda->addCell(70*50);
        $celda1->addImage("logotipoJA-dorado-trazo.png", array(
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $celas2 = $celda2->addTextRun('pStyle');
        foreach ($finalpie as $pruebaspie) {
            $pag = $pruebaspie;
            $estilado = multiexplode($separadorestilos, $pag);
            $estilc = array_filter($estilado);
            foreach ($estilc as $estilole) {
                $pagi=$estilole;
                echo "<br>";
                $contenidopie=str_replace($cambiartext,"",$pagi);
                $acentosvopie=str_replace($acentos,$letras,$contenidopie);
                $textos1pie=substr($acentosvopie,strripos($acentosvopie,";"));
                $textfinalpie=str_replace(";","",$textos1pie);
                echo $textfinalpie;
                //Obteniendo posiciones
                $possifo = strpos($pagi, "tamaño") + 9; //tamaño de letra
                $poslet = strpos($pagi, "letra") + 6; //color de letra
                $posfon = strpos($pagi, "fondo") + 6; //color de fondo
                $posfont = (strpos($pagi, "Tipofuente")) + 11;//nombre de fuente
                $posfontf = strpos($pagi, ","); // posicion final de fuente
                $posvarf = strpos($pagi, "¿/codigo?");//posicion final de la variable
                $posvari = (strpos($pagi, "¿codigo?") + 9);//posicion inicial de la variable

                if ($variable = strpos($pagi, "codigo") !== false) {
                    $variable = substr($pagi, $posvari, $posvarf - $posvari);
                } else {

                    $variable = " ";
                }
                //Tipo de Letra
                $letra = ($letra = strpos($pagi, "Tipofuente") == false) ? "arial" : substr($b, $posfont, 20);
                //obtener tamaño de letra
                if ($sizefont = strpos($pagi, "tamaño") == false) {
                    $sizefont = "12";
                } else {
                    $sizefont = substr($pagi, $possifo, 2);


                }
                //obtener color de fondo
                if ($codfon = strpos($pagi, "fondo") == false) {
                    $codfon = "FFFFFF";
                } else {
                    $codfon = substr($pagi, $posfon, 6);

                }
                //obtener color de letra
                if ($codlet = strpos($pagi, "letra") == false) {
                    $codlet = "000000";
                } else {
                    $codlet = substr($pagi, $poslet, 6);

                }

                if ($negrita = strpos($pagi, "strong") !== false) {
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
                if ($subra = strpos($pagi, "underline") !== false) {
                    $subra = "single";
                } else {
                    $subra = "none";
                }
                //Superindice
                if ($supind = strpos($pagi, "/sup") !== false) {
                    $supind = true;
                } else {
                    $supind = false;
                }
                //subindice
                if ($subind = strpos($pagi, "/sub") !== false) {
                    $subind = true;
                } else {
                    $subind = false;
                }
                //Tachado
                if ($tacha = strpos($pagi, "line-through;") !== false) {
                    $tacha = true;
                } else {
                    $tacha = false;
                }
                $celas2->addText($textfinalpie, array('doubleStrikethrough' => $tacha, 'bgcolor' => $codfon, 'underline' => $subra
                , 'bold' => $negrita, 'italic' => $italica, 'size' => $sizefont, 'superScript' => $supind, 'color' => $codlet
                , 'subScript' => $subind));
            }
            $celas2->addTextBreak(1);
        }
        break;
    case 2:
        //Agregar imagen a la derecha y texto
        $celda1=$celda->addCell(30*50);
        $celda2=$celda->addCell(70*50);
        $celas2 = $celda1->addTextRun('pStyle');
        foreach ($finalpie as $pruebaspie) {
            $pag = $pruebaspie;
            $estilado = multiexplode($separadorestilos, $pag);
            $estilc = array_filter($estilado);
            foreach ($estilc as $estilole) {
                $pagi=$estilole;
                echo "<br>";
                $contenidopie=str_replace($cambiartext,"",$pagi);
                $acentosvopie=str_replace($acentos,$letras,$contenidopie);
                $textos1pie=substr($acentosvopie,strripos($acentosvopie,";"));
                $textfinalpie=str_replace(";","",$textos1pie);
                echo $textfinalpie;
                //Obteniendo posiciones
                $possifo = strpos($pagi, "tamaño") + 9; //tamaño de letra
                $poslet = strpos($pagi, "letra") + 6; //color de letra
                $posfon = strpos($pagi, "fondo") + 6; //color de fondo
                $posfont = (strpos($pagi, "Tipofuente")) + 11;//nombre de fuente
                $posfontf = strpos($pagi, ","); // posicion final de fuente
                $posvarf = strpos($pagi, "¿/codigo?");//posicion final de la variable
                $posvari = (strpos($pagi, "¿codigo?") + 9);//posicion inicial de la variable

                if ($variable = strpos($pagi, "codigo") !== false) {
                    $variable = substr($pagi, $posvari, $posvarf - $posvari);
                } else {

                    $variable = " ";
                }
                //Tipo de Letra
                $letra = ($letra = strpos($pagi, "Tipofuente") == false) ? "arial" : substr($b, $posfont, 20);
                //obtener tamaño de letra
                if ($sizefont = strpos($pagi, "tamaño") == false) {
                    $sizefont = "12";
                } else {
                    $sizefont = substr($pagi, $possifo, 2);


                }
                //obtener color de fondo
                if ($codfon = strpos($pagi, "fondo") == false) {
                    $codfon = "FFFFFF";
                } else {
                    $codfon = substr($pagi, $posfon, 6);

                }
                //obtener color de letra
                if ($codlet = strpos($pagi, "letra") == false) {
                    $codlet = "000000";
                } else {
                    $codlet = substr($pagi, $poslet, 6);

                }

                if ($negrita = strpos($pagi, "strong") !== false) {
                    $negrita = true;
                } else {
                    $negrita = false;
                }
                //Cursiva
                if ($italica = strpos($pagi, "csva") !== false) {
                    $italica = true;
                } else {
                    $italica = false;
                }
                //Subrayado
                if ($subra = strpos($pagi, "underline") !== false) {
                    $subra = "single";
                } else {
                    $subra = "none";
                }
                //Superindice
                if ($supind = strpos($pagi, "/sup") !== false) {
                    $supind = true;
                } else {
                    $supind = false;
                }
                //subindice
                if ($subind = strpos($pagi, "/sub") !== false) {
                    $subind = true;
                } else {
                    $subind = false;
                }
                //Tachado
                if ($tacha = strpos($pagi, "line-through;") !== false) {
                    $tacha = true;
                } else {
                    $tacha = false;
                }
                $celas2->addText($textfinalpie, array('doubleStrikethrough' => $tacha, 'bgcolor' => $codfon, 'underline' => $subra
                , 'bold' => $negrita, 'italic' => $italica, 'size' => $sizefont, 'superScript' => $supind, 'color' => $codlet
                , 'subScript' => $subind));
            }
            $celas2->addTextBreak(1);
        }
        $celda2->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));

        break;
    case 3:
        //Agregar imagen a la izquierda
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        $texto = $table->addCell(30 * 50)->addText();
        break;
    case 4:
        //Agregar imagen a la derecha
        $texto = $table->addCell(30 * 50)->addText();
        $imagen = $table->addCell(70 * 50)->addImage("logotipoJA-dorado-trazo.png", array(
            //'positioning' => 'relative',
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.3),
            'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5),
            'align' => 'center',
            'wrappingStyle' => 'infront',));
        break;
    case 5:
        //Agregar texto
        $celda1=$celda->addCell(100*50);
        $celas2 = $celda1->addTextRun('pStyle');
        foreach ($finalpie as $pruebaspie) {
            $pagi = $pruebaspie;
            $estilado = multiexplode($separadorestilos, $pagi);
            $estilc = array_filter($estilado);
            foreach ($estilc as $estilole) {
                print_r($estilole);
                $pagi=$estilole;
                $contenidopie=str_replace($cambiartext,"",$pagi);
                $acentosvopie=str_replace($acentos,$letras,$contenidopie);
                $textos1pie=substr($acentosvopie,strripos($acentosvopie,";"));
                $textfinalpie=str_replace(";","",$textos1pie);
                //Obteniendo posiciones
                $possifo = strpos($pagi, "tamaño") + 9; //tamaño de letra
                $poslet = strpos($pagi, "letra") + 6; //color de letra
                $posfon = strpos($pagi, "fondo") + 6; //color de fondo
                $posfont = (strpos($pagi, "Tipofuente")) + 11;//nombre de fuente
                $posfontf = strpos($pagi, ","); // posicion final de fuente
                $posvarf = strpos($pagi, "¿/codigo?");//posicion final de la variable
                $posvari = (strpos($pagi, "¿codigo?") + 9);//posicion inicial de la variable

                if ($variable = strpos($pagi, "codigo") !== false) {
                    $variable = substr($pagi, $posvari, $posvarf - $posvari);
                } else {

                    $variable = " ";
                }
                //Tipo de Letra
                $letra = ($letra = strpos($pagi, "Tipofuente") == false) ? "arial" : substr($b, $posfont, 20);
                //obtener tamaño de letra
                if ($sizefont = strpos($pagi, "tamaño") == false) {
                    $sizefont = "12";
                } else {
                    $sizefont = substr($pagi, $possifo, 2);


                }
                //obtener color de fondo
                if ($codfon = strpos($pagi, "fondo") == false) {
                    $codfon = "FFFFFF";
                } else {
                    $codfon = substr($pagi, $posfon, 6);

                }
                //obtener color de letra
                if ($codlet = strpos($pagi, "letra") == false) {
                    $codlet = "000000";
                } else {
                    $codlet = substr($pagi, $poslet, 6);

                }

                if ($negrita = strpos($pagi, "strong") !== false) {
                    $negrita = true;
                } else {
                    $negrita = false;
                }
                //Cursiva
                if ($italica = strpos($pagi, "csva") !== false) {
                    $italica = true;
                } else {
                    $italica = false;
                }
                //Subrayado
                if ($subra = strpos($pagi, "underline") !== false) {
                    $subra = "single";
                } else {
                    $subra = "none";
                }
                //Superindice
                if ($supind = strpos($pagi, "/sup") !== false) {
                    $supind = true;
                } else {
                    $supind = false;
                }
                //subindice
                if ($subind = strpos($pagi, "/sub") !== false) {
                    $subind = true;
                } else {
                    $subind = false;
                }
                //Tachado
                if ($tacha = strpos($pagi, "line-through;") !== false) {
                    $tacha = true;
                } else {
                    $tacha = false;
                }
                $celas2->addText($textfinalpie, array('doubleStrikethrough' => $tacha, 'bgcolor' => $codfon, 'underline' => $subra
                , 'bold' => $negrita, 'italic' => $italica, 'size' => $sizefont, 'superScript' => $supind, 'color' => $codlet
                , 'subScript' => $subind));
            }
            $celas2->addTextBreak(1);
        }
    case 6:
        //Agregar vacio
        break;

}
//creando texto del documento
$textrun=$section->addTextRun('pStyle');
foreach ($probando as $prueba ) {
    $document = $prueba;
    $documentof=multiexplode($separadorestilos,$document);
    $documento=array_filter($documentof);
        foreach ($documento as $normas){

            $b=$normas;

    $possifo = strpos($b, "tamaño") + 9; //tamaño de letra
    $poslet = strpos($b, "letra") + 6; //color de letra
    $posfon = strpos($b, "fondo") + 6; //color de fondo
    $posfont = (strpos($b, "Tipofuente")) + 11;//nombre de fuente
    $posfontf = strpos($b, ","); // posicion final de fuente
    $posvarf = strpos($b, "¿/codigo?");//posicion final de la variable
    $posvari = (strpos($b, "¿codigo?") + 9);//posicion inicial de la variable

    //////////////////////////////
    //////////////////////////////
    ///

    //Obtener Texto a ingresar

    $contenido=str_replace($cambiartext,"",$b);
    $acentosvo=str_replace($acentos,$letras,$contenido);
    $textos1=substr($acentosvo,strripos($acentosvo,";"));
    $textfinal=str_replace(";","",$textos1);
    //Obtener Variable
    if ($variable = strpos($b, "codigo") !== false) {
        $variable = substr($b, $posvari, $posvarf - $posvari);
    } else {

        $variable = " ";
    }
    //Tipo de Letra
    $letra = ($letra = strpos($b, "Tipofuente") == false) ? "arial" : substr($b, $posfont, 20);
    //obtener tamaño de letra
    if ($sizefont = strpos($b, "tamaño") == false) {
        $sizefont = "12";
    } else {
        $sizefont = substr($b, $possifo, 2);


    }
    //obtener color de fondo
    if ($codfon = strpos($b, "fondo") == false) {
        $codfon = "FFFFFF";
    } else {
        $codfon = substr($b, $posfon, 6);

    }
    //obtener color de letra
    if ($codlet = strpos($b, "letra") == false) {
        $codlet = "000000";
    } else {
        $codlet = substr($b, $poslet, 6);

    }

    if ($negrita = strpos($b, "strong") !== false) {
        $negrita = true;
    } else {
        $negrita = false;
    }
    //Cursiva
    if ($italica = strpos($b, "csva") !== false) {
        $italica = true;
    } else {
        $italica = false;
    }
    //Subrayado
    if ($subra = strpos($b, "underline") !== false) {
        $subra = "single";
    } else {
        $subra = "none";
    }
    //Superindice
    if ($supind = strpos($b, "/sup") !== false) {
        $supind = true;
    } else {
        $supind = false;
    }
    //subindice
    if ($subind = strpos($b, "/sub") !== false) {
        $subind = true;
    } else {
        $subind = false;
    }
    //Tachado
    if ($tacha = strpos($b, "line-through;") !== false) {
        $tacha = true;
    } else {
        $tacha = false;
    }
   // echo $quitarcom;
    $textrun->addText($textfinal,array('doubleStrikethrough' => $tacha , 'bgcolor' => $codfon,'underline' => $subra
    ,'bold' => $negrita,'italic' => $italica,'size' => $sizefont,'superScript' => $supind,'color'=>$codlet
    ,'subScript'=>$subind));

}
}

$objWriter = \PhpOffice\PhpWord\IOFactory:: createWriter($phpWord, 'Word2007');
$objWriter->save('creado.docx');
?>
    