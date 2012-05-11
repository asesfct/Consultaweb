<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
    <head> 
        <title>Consulta de Asistencias </title> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" /> 
        
<link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/media/images/favicon.ico"> 

        <style type="text/css" title="currentStyle"> 
            @import "DataTables-1.9.1/media/css/demo_page.css"; 
            @import "DataTables-1.9.1/media/css/demo_table_jui.css"; 
            @import "DataTables-1.9.1/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css"; 
            @import "DataTables-1.9.1/TableTools-2.0.0/media/css/TableTools.css"; 
            @import "DataTables-1.9.1/extras/ColVis/media/css/ColVis.css"; 
			
        </style> 
		<link href="ases.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" charset="utf-8" src="DataTables-1.9.1/media/js/jquery.js"></script> 
        <script type="text/javascript" charset="utf-8" src="DataTables-1.9.1/media/js/gridcheck.js"></script> 
        <script type="text/javascript" charset="utf-8" src="DataTables-1.9.1/TableTools-2.0.0/js/ZeroClipboard.js"></script> 
        <script type="text/javascript" charset="utf-8" src="DataTables-1.9.1/TableTools-2.0.0/js/TableTools.js"></script> 
        <script type="text/javascript" charset="utf-8" src="DataTables-1.9.1/extras/ColVis/media/js/ColVis.js"></script> 
        <script type="text/javascript" charset="utf-8"> 
var asInitVals = new Array(); 

    $(document).ready(function() { 
                    $('#example').dataTable({ 
                       "bJQueryUI": true, 
                    "sPaginationType": "full_numbers", 
                    "sDom": 'T C lfrtip', 
                    "oTableTools": { 
                    "sSwfPath": "/TableTools-2.0.0/media/swfcopy_cvs_xls_pdf.swf", 
                    "aButtons": [ 
                    "xls", 
                    "pdf", 
                    { 
                    "sExtends": "print", 
                    "sButtonText": "Imprimir", 
                    "sInfo": "<br><center><h1>PRESIONAR ESCAPE AL TERMINAR</h1></center>", 
                    "sMessage": "<center><h2><b>TITULO!</b></h2></center>", 
                    "sTitle": "Listado x Obra Social", 
                    } 
                    ], 
                    }, 
                    "fnInitComplete": function () { 
                        var 
                            that = this, 
                            nTrs = this.fnGetNodes(); 
                        $('td', nTrs).click( function () { 
                            that.fnFilter( this.innerHTML ); 
                        } ); 
                    }, 
                    "oLanguage": { 
"oPaginate": { 
"sPrevious": "Anterior", 
"sNext": "Siguiente", 
"sLast": "Ultima", 
"sFirst": "Primera" 
}, 

"sLengthMenu": 'Mostrar <select>'+ 
'<option value="10">10</option>'+ 
'<option value="20">20</option>'+ 
'<option value="30">30</option>'+ 
'<option value="40">40</option>'+ 
'<option value="50">50</option>'+ 
'<option value="-1">Todos</option>'+ 
'</select> registros', 

"sInfo": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)", 

"sInfoFiltered": " - filtrados de _MAX_ registros", 

"sInfoEmpty": "No hay resultados de b�squeda", 

"sZeroRecords": "No hay registros a mostrar", 

"sProcessing": "Espere, por favor...", 

"sSearch": "Buscar:", 

} 
                }); 

    $("tfoot input").keyup( function () { 
        /* Filter on the column (the index) of this element */ 
        oTable.fnFilter( this.value, $("tfoot input").index(this) ); 
    } ); 


    /* 
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
     * the footer 
     */ 
    $("tfoot input").each( function (i) { 
        asInitVals[i] = this.value; 
    } ); 

    $("tfoot input").focus( function () { 
        if ( this.className == "search_init" ) 
        { 
            this.className = ""; 

            this.value = ""; 
        } 
    } ); 

    $("tfoot input").blur( function (i) { 
        if ( this.value == "" ) 
        { 
            this.className = "search_init"; 
            this.value = asInitVals[$("tfoot input").index(this)]; 
        } 
    } ); 
            });  // Termina document.ready 
        </script> 
<style> 
.data_table { 
font-family: helvetica; 
font-size: 1px; 
} 
#top_of_page { 
position: absolute; 
} 
#main_table_area {
	position:absolute;
	top: 212px;
	height: 540px;
	width: 800px;
	overflow: auto;
	left: 5px;
	margin-left:15%;
	margin-right:15%;
} 
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
#apDiv1 {
	position:absolute;
	width:484px;
	height:67px;
	z-index:1;
	left: 524px;
	top: 212px;
	background-color: #FFFFFF;
}
#apDiv2 {
	position:absolute;
	width:144px;
	height:32px;
	z-index:1;
	left: 606px;
	top: 28px;
}
</style> 
    </head> 
<?php 
// Arriba est� el c�digo de lo que va en el archivo include a continuaci�n: 

$conexion= mysql_connect("192.168.0.106","fct","adminfct");
mysql_select_db("mydb",$conexion);


// Pasa la fecha a espanol llamar FechaEsp($row['campo']); 
  function FechaESP ($fecha) { 
if ($fecha != '') { 
$data=explode("-",$fecha); 
$retfecha = substr($data[2],0,2).'/'.$data[1].'/'.$data[0]; 
return $retfecha; 
} else { 
$retfecha = ''; 
} 
} 

?> 

<body id="dt_example">
<div id="apDiv1">
  
</div> 
    <table width="100%" height="100%" border="0">
  <tr>
    <td height="98" align="center"><img src="img/insertara.jpg" width="510" height="152" align="middle" /></td>
  </tr>
  <tr>
    <td valign="top" align="center">
    <table width="101%" height="52" border="0" background="img/cabeceragif.gif">
      <tr>
        <td>
          <table width="616" border="0" align="center">
            <tr>
             <td width="91"  align="left"><a href="index.html" class="subrayado">Portada</a>&nbsp;&nbsp;</td>
              <td width="144"  align="left"><a href="consultaa.php" class="subrayado">Consulta de asistencia</a></td>
              <td width="128"  align="left"><a href="moda.php" class="subrayado">Insertar asistencia</a></td>
              <td width="119"  align="left"><a href="consultan.php" class="subrayado">Consulta de notas</a></td>
              <td width="112"  align="left"><a href="modn.php" class="subrayado">Insertar notas</a></td>
             
            </tr>
          </table></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
     <div id="demo"><font size=1><center>
       <div id="main_table_area"> 
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" class="data_table"> 
<thead> 
        <tr> 
            <th width="auto">Nombre</th> 
            <th width="auto">Apellido 1</th> 
            <th width="auto">Apellido 2</th> 
            <th width="auto">Ciclo</th>
    		<th width="auto">Asignatura</th> 
            <th width="auto">Fecha</th> 
            <th width="auto">Faltas</th>
            <th width="auto">Retrasos</th>  
   <!-- esto son la cantidad de columnas que tendra el grid         <th width="auto">Titulo 7</th> -->
        </tr> 
</thead> 
    <tbody> 
     <?php 
       //$i = 1; 
	   //if($_REQUEST["ciclo"] > 0 &&  $_REQUEST["asignatura"] > 0 && $_REQUEST["fecha"])
	 //{
	   //$alumnos="select a.nombre as nombrealumno, a.apellido1, a.apellido2, asig.nombre as nombreasignatura,c.nombre as nombreciclo,fecha,asis.falta, asis.tarde
//from alumnos a inner join ciclo c on a.ciclo_idciclo=c.idciclo inner join asistencia asis on a.idalumnos=asis.Alumnos_idalumnos inner join asignatura asig on asis.asignatura_idasignatura=asig.idasignatura
//where c.idciclo='".$_REQUEST["ciclo"]."' and asig.idasignatura='".$_REQUEST["asignatura"]."' and fecha='".$_REQUEST["fecha"]."'order by a.nombre";
		//}
		//else
		//{
		if($_REQUEST["ciclo"] > 0 &&  $_REQUEST["asignatura"] > 0)
		{
		$alumnos="select a.idalumnos,a.nombre as nombrealumno, a.apellido1, a.apellido2, asig.nombre as nombreasignatura,c.nombre as nombreciclo,asig.idasignatura, c.idciclo
from alumnos a inner join ciclo c on a.ciclo_idciclo=c.idciclo inner join curso on c.idciclo=curso.ciclo_idciclo inner join asignatura asig on curso.asignatura_idasignatura=asig.idasignatura
where c.idciclo='".$_REQUEST["ciclo"]."' and asig.idasignatura='".$_REQUEST["asignatura"]."' order by a.nombre";
		}
		//else
		//{
		//if($_REQUEST["ciclo"] > 0 &&  $_REQUEST["fecha"] > 0)
		//{
				//$alumnos="select a.nombre as nombrealumno, a.apellido1, a.apellido2, asig.nombre as nombreasignatura,c.nombre as //nombreciclo,fecha,asis.falta, asis.tarde
//from alumnos a inner join ciclo c on a.ciclo_idciclo=c.idciclo inner join asistencia asis on a.idalumnos=asis.Alumnos_idalumnos inner join asignatura asig on asis.asignatura_idasignatura=asig.idasignatura
//where c.idciclo='".$_REQUEST["ciclo"]."' and fecha='".$_REQUEST["fecha"]."' order by a.nombre";
		//}
		else
		{
		$alumnos="select a.idalumnos,a.nombre as nombrealumno, a.apellido1, a.apellido2, asig.nombre as nombreasignatura,c.nombre as nombreciclo, asig.idasignatura, c.idciclo
from alumnos a inner join ciclo c on a.ciclo_idciclo=c.idciclo inner join curso on c.idciclo=curso.ciclo_idciclo inner join asignatura asig on curso.asignatura_idasignatura=asig.idasignatura
where c.idciclo='".$_REQUEST["ciclo"]."' order by a.nombre";
				}
					
		//else
		//{
		//if($_REQUEST["ciclo"] > 0 &&  $_REQUEST["fecha"] > 0)
		//{
				//$alumnos="select a.nombre as nombrealumno, a.apellido1, a.apellido2, asig.nombre as nombreasignatura,c.nombre as //nombreciclo,fecha,asis.falta, asis.tarde
//from alumnos a inner join ciclo c on a.ciclo_idciclo=c.idciclo inner join asistencia asis on a.idalumnos=asis.Alumnos_idalumnos inner join asignatura asig on asis.asignatura_idasignatura=asig.idasignatura
//where c.idciclo='".$_REQUEST["ciclo"]."' and fecha='".$_REQUEST["fecha"]."' order by a.nombre";
		//}
		
			
		//}
	//}
		$i=0;
		$mysql=mysql_query($alumnos,$conexion);
       $total = mysql_num_rows($mysql); 
	   ?> <form name="insertarasistencias" method="post" action="insertado.php"> <?php 
       while ($row = mysql_fetch_array($mysql)) { 
               echo "<tr class='gradeA'>
            <td width='auto'>".$row['nombrealumno']."</td> 
            <td width='auto' class='center'>".$row['apellido1']."</td> 
            <td width='auto'>".$row['apellido2']."</td> 
            <td width='auto'>".$row['nombreciclo']."</td> 
            <td width='auto'>".$row['nombreasignatura']."</td>
			 <td width='auto'>".$_REQUEST['fecha']."</td>";
			 $falta="falta".$i;
			 $retraso="retraso".$i;
            echo "<td width='auto'><input type='checkbox' name='".$falta."'/></td> 
			<td width='auto'><input type='checkbox' name='".$retraso."'/></td> 
            </tr>"; 
			$alumno="alumno".$i;
			$ciclo="ciclo".$i;
			$asignatura="asignatura".$i;
			echo $row[$i]['nombrealumno'];
			echo "<input name='".$asignatura."' type='hidden' value='".$row['idasignatura']."'>";
			echo "<input name='".$alumno."' type='text' value='".$row['idalumnos']."'>";
			echo "<input name='".$ciclo."' type='hidden' value='".$row['idciclo']."'>";
			$i++;
       } 
	   ?><div id="apDiv2"> 
       <input type="submit" name="introducirasis" value="Enviar"></div></form><?php
       echo 'Total: ' . $total; 
      ?> 
    </tbody> 
</table> 

</div> 
</center>
</font> 
    </div> 
    <div class="spacer"></div> 
        </div> 
</body> 
</html>