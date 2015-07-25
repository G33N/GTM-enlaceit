<?php
require('fpdf.php');
include ("../../conexion/php_conexion.php");
header('Content-Type: text/html; charset=UTF-8');

$query="SELECT * FROM orden WHERE id=(SELECT max(id) FROM orden)";
$rs=mysqli_query($conexion,$query);
while ($reg=mysqli_fetch_array($rs)){
$id = $reg["id"];
$mod = $reg["modelo"];
$pat = $reg["patente"];
$com = $reg["combustible"];
$cli = $reg["cliente"];
$vin = $reg["vin"];
$kil = $reg["kilometro"];
$aux = $reg["auxilio"];
$est = $reg["estereo"];
$tra = $reg["trabajo"];
$des = $reg["descripcion"];
$ing = $reg["ingreso"];
$sal = $reg["salida"];
$usu = $reg["usuario"];
$sta = $reg["estado"];
}

$ide = str_pad((int)$id,8,"0",STR_PAD_LEFT);

$query="SELECT * FROM cliente WHERE id='$cli'";
$rs=mysqli_query($conexion,$query);

while ($reg=mysqli_fetch_array($rs)){

$dni = $reg['dni'];
$nom = $reg['nombre'];
$mai = $reg['mail'];
$dom = $reg['direccion'];
$loc = $reg['localidad'];
$tel = $reg['telefono'];

}
$query="SELECT * FROM usuario WHERE id='$usu'";
$rs=mysqli_query($conexion,$query);
 while ($reg=mysqli_fetch_array($rs)){
$usu=$reg['nombre'];
 }
class PDF extends FPDF
{

 function logo()
    {
        $this->SetXY(10, 10);
        $this->SetFont('Arial','B',10);
        $this->Cell(95, 2, $this->Image('logo.png'));

    }

    function dreparacion()
    {
        global $ing;
        global $sal;
        global $ide;
        global $usu;
        $this->SetXY(95, 10);
        $this->SetFont('Arial','B',14);
        $this->Cell(105, 10, utf8_decode("ORDEN DE REPARACIÓN N°   $ide"), 1, 2, "L");
        $this->SetFont('Arial','',10);
        $this->MultiCell(105,5, utf8_decode("\n"."FECHA RECEPCIÓN: $ing"."\n\n"."RECIBIDO POR: $usu"."\n\n"."FECHA ENTREGA: $sal"."\n"), 1, "L");
    }

    function dcliente()
    {
        global $nom;
        global $loc;
        global $dni;
        global $dom;
        global $tel;
        global $mai;
        global $cli;
        $this->SetXY(10,59);
        $this->SetFont('Arial','B',10);
        $this->Cell(0,10, utf8_decode("DATOS DEL CLIENTE"), 0, 2, "L");
        $this->SetFont('Arial','',8);
        $this->Cell(95,10, utf8_decode("NOMBRE: $nom"), 1, "L");
        $this->ln(0);
        $this->SetXY(105,69);
        $this->Cell(95,10, utf8_decode("LOCALIDAD: $loc"), 1, "L");
        $this->ln(0);
        $this->SetXY(10,79);
        $this->Cell(95,10, utf8_decode("DNI: $dni"), 1, "L");
        $this->ln(0);
        $this->SetXY(105,79);
        $this->Cell(95,10, utf8_decode("DOMICILIO: $dom"), 1, "L");
        $this->ln(0);
        $this->SetXY(10,89);
        $this->Cell(95,10, utf8_decode("TELEFONO: $tel"), 1, "L");
        $this->ln(0);
        $this->SetXY(105,89);
        $this->Cell(95,10, utf8_decode("EMAIL: $mai"), 1, "L");

    }
 function dauto()
    {
        global $pat;
        global $vin;
        global $com;
        global $est;
        global $aux;
        global $kil;
        global $mod;
        $this->SetXY(10,99);
        $this->SetFont('Arial','B',10);
        $this->Cell(0,10, utf8_decode("DATOS DEL VEHÍCULO"), 0, 2, "L");
        $this->SetFont('Arial','',8);
        $this->Cell(60,10, utf8_decode("PATENTE: $pat"), 1, "L");
        $this->ln(0);
        $this->SetXY(70,109);
        $this->Cell(60,10, utf8_decode("COMBUSTILE: $com"), 1, "L");
        $this->ln(0);
        $this->SetXY(130,109);
        $this->Cell(70,10, utf8_decode("ESTEREO: $est"), 1, "L");
        $this->ln(0);
        $this->SetXY(10,119);
        $this->Cell(60,10, utf8_decode("AUXILIO: $aux"), 1, "L");
        $this->ln(0);
        $this->SetXY(70,119);
        $this->Cell(60,10, utf8_decode("KILOMETROS: $kil"), 1, "L");
        $this->ln(0);
        $this->SetXY(130,119);
        $this->Cell(70,10, utf8_decode("MODELO: $mod"), 1, "L");
        $this->SetXY(10,129);
        $this->Cell(120,10, utf8_decode("VIN: $vin"), 1, "L");

   }

        function trabajos()
    {
        global $tra;
        $this->SetXY(10,139);
         for($y = 157; $y <= 225;)
        {
                $this->Line(15, $y , 100, $y);
                $y = $y + 8;
        }

        $this->SetFont('Arial','B',10);
        $this->Cell(95,10, utf8_decode("SOLICITUD DE TRABAJOS"), 0, 2, "C");
        $this->SetFont('Arial','',8);
        $this->MultiCell(95,8, utf8_decode($tra), 0, "L");
        //$this->MultiCell(95,6,utf8_decode($str),0,"L");
        $this->SetXY(10,149);
        $this->Cell(95,75,"", 1,"L");
   }
   function operaciones()
    {
        global $des;
        $this->SetXY(105,139);
        for($y = 157; $y <= 225;)
        {
                $this->Line(110, $y , 195, $y);
                $y = $y + 8;
        }
        $this->SetFont('Arial','B',10);
        $this->Cell(95,10, utf8_decode("DESCRIPCIÓN DE LAS OPERACIONES"), 0, 2, "C");
        $this->SetFont('Arial','',8);
        $this->MultiCell(95,8, utf8_decode($des), 0, "L");
//      $this->MultiCell(95,6,utf8_decode($dop),0,"L");
        $this->SetXY(105,149);
        $this->Cell(95,75,"", 1,"L");
   }
	   function observaciones()
    {
	global $obs;
        $this->SetXY(10,228);
	 for($y = 244; $y <= 260;)
        {
                $this->Line(15, $y , 100, $y);
                $y = $y + 8;
        }
        $this->SetFont('Arial','B',10);
        $this->Cell(95,10, utf8_decode("OBSERVACIONES"), 0, 2, "L");
        $this->SetFont('Arial','',8);
        $this->MultiCell(95,30, utf8_decode($obs), 1, "L");
   }
	   function firma()
    {
	global $obs;
        $this->SetXY(105,228);
        $this->SetFont('Arial','B',10);
        $this->Cell(95,10, utf8_decode("FIRMA Y ACLARACION"), 0, 2, "L");
        $this->SetFont('Arial','',8);
        $this->MultiCell(95,30, utf8_decode($obs), 1, "L");
	}
}// FIN Class PDF
    
$pdf = new PDF();

$pdf->AddPage();
$pdf->logo();
$pdf->dreparacion();
$pdf->dcliente();
$pdf->dauto();
$pdf->trabajos();
$pdf->operaciones();
$pdf->observaciones();
$pdf->firma();

$pdf->Output(); //Salida al navegador

?>
