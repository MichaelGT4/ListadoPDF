<?php
// todo lo que esta aqui es codigo php
// incluir mi proyecto la libreria fpdf
require('./fpdf182/fpdf.php');
 
class PDFReporte extends FPDF{
    function Header()
    {
        $this-> SetFont('Arial', 'B', 16);
        $this-> Image('./img/ucateci.png', 80, 8, 50);
        $this-> Cell(80);
        $this->Cell(30, 60, 'Listado de Estudiantes', 0, 0, 'C');
        $this->Ln(20);

        $this -> SetFont('Arial','B',11);
        $this -> Cell(0,40,"Asignatura:");
        $this -> SetFont('Arial','',11);
        $this -> Cell(-130,40,"Historia Dominicana", 0, 0, 'R');
        $this-> Ln(7);

        $this -> SetFont('Arial','B',11);
        $this -> Cell(0,40,"Profesor/a:");
        $this -> SetFont('Arial','',11);
        $this -> Cell(-145,40,"Jose Perez", 0, 0, 'R');
        $this-> Ln(7);

        $this -> SetFont('Arial','B',11);
        $this -> Cell(0,40,"Curso:");
        $this -> SetFont('Arial','',11);
        $this -> Cell(-155,40,"J-202", 0, 0, 'R');
    }

    function Footer()
    {
        $this-> SetY(-15);
 
        $this-> SetFont('Arial', 'I', 8);

        $this->Cell(0,10, 'Pag. '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}
$matricula=array('2017-1234', '2017-1823', '2017-2354', '2017-3123', '2018-0000', '2018-1111', '2018-2084', '2018-3565', '2018-3847', '2018-5855');
$nombre= array('Gisela', 'Isabela', 'Pedro', 'Jose', 'Ramon', 'Pablo', 'Francisco', 'Ivan', 'Maria', 'Angela');
$apellido= array('Gutierrez', 'Rodriguez', 'Ramirez', 'Delgado', 'Ortega', 'Frias', 'Parra', 'Brito', 'Gonzalez', 'Diaz');
 
// Trabajar con mi Reporte
$pdf = new PDFReporte();

$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf-> Ln(30);
$pdf-> SetFont('Arial', 'B', 12);
$pdf -> cell(50,1,'Matricula: ',0,0,'C');
$pdf -> cell(50,1,'Nombre: ',0,0,'C');
$pdf -> cell(50,1,'Apellido: ',0,0,'C');
$pdf -> SetFont('Helvetica', '', 11);

$pdf -> Ln(10);
for ($x=0;$x<=9;$x++){
    $pdf -> cell(50,6,$matricula[$x],1,0,'C');
    $pdf -> cell(50,6,$nombre[$x],1,0,'C');
    $pdf -> cell(50,6,$apellido[$x],1,0,'C');
    $pdf -> Ln();
}
$pdf ->Output();
?>