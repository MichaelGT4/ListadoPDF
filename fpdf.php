<?php 
require('fpdf.php'); //Cargamos el archivo con la clase FPDF class PDF extends FPDF { // Cabecera de página function Header() { // Logo $this-&gt;Image('img/logo.png',10,8,33); //Imagen corporativa
    // Arial bold 15
$this-&gt;SetFont('Arial','B',15); //La "B" indica Negrita (Bold), otras opciones disponibles, por ejemplo subrayado sería U
    // Movernos a la derecha
$this-&gt;Cell(80);
    // Título
$this-&gt;Cell(30,10,'Reporte de calificaciones',0,0,'C'); //La "C" indica centrado, la "R" indicaría alineado a la derecha
    // Salto de línea
$this-&gt;Ln(20); //El número indica la distancia con la siguiente línea

 
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this-&gt;SetY(-15);
    // Arial italic 8
    $this-&gt;SetFont('Arial','I',8);
    // Observaciones
    $this-&gt;Cell(0,10,'Observaciones: ',0,0);
    // Número de página
    $this-&gt;Cell(0,10,'Pag.: '.$this-&gt;PageNo().'/{nb}',0,0,'R'); 
 
}
}
/*Datos aleatorios para el ejemplo*/
$nombres=array('Manuel','Nuria','Angela','Andrea','Ramiro','Victor','Miguel','Vanessa');
$apellidos=array('Molina','Aguirre','Cobos','Santos','Gurruchaga','Pino','Navarro','Medina');
$grados=array('1','2','3');
$cursos=array('A','B','C','D','E','F');
$habilidades=array('Hace esto muy bien','Hace aquello ni fu ni fa','Evoluciona en la materia','Sabe mucho de esto','Tiene una buena actitud','Tiene buenas aptitudes');
$asignaturas=array('Matemáticas','Lengua española','Geometría','Religión');
 
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf-&gt;AliasNbPages();
 
for($i=1;$i&lt;=10;$i++){ //Este bucle para reproducir 10 alumnos aleatorios no es útil con los datos reales que provienen de la consulta SQL $alumno=$nombres[rand(0, 7)].' '.$apellidos[rand(0, 7)].' '.$apellidos[rand(0, 7)]; //Genero aleatoriamente nombre y apellidos $grado=$grados[rand(0, 2)]; // Genero aleatoriamente el grado del alumno $curso=$cursos[rand(0, 5)]; // Genero aleatoriamente el curso del alumno $pdf-&gt;AddPage(); // En cada interacción del bucle genero una nueva página en el pdf
	$pdf-&gt;SetFont('Times','',12); // Indico la fuente para la siguiente línea
        $pdf-&gt;Cell(4,2,'Alumno: '.$alumno); // Se imprimen los datos de cada alumno
	$pdf-&gt;SetX(100); //Distancia horizontal hasta siguiente bloque de texto
	$pdf-&gt;Cell(4,2,'Grado: '.$grado.utf8_decode('º')); // Imprimo grado
	$pdf-&gt;SetX(140); 
	$pdf-&gt;Cell(4,2,'Curso: '.$curso,0,1); // Imprimo curso
	$pdf-&gt;Ln(7); // Salto de línea, puedo cambiar la distancia con la siguiente con el número pasado como parámetro entre paréntesis
	$pdf-&gt;Cell(0,2,utf8_decode('Num. Identificación').': '.$i,0,0); //Imprimo otro dato
	$pdf-&gt;Ln(12);
	$pdf-&gt;Line(12,47,200,47); // Dibujo línea horizontal. Puntos absolutos, los dos primeros definen punto de inicio, los dos siguientes punto final.
	$pdf-&gt;SetFont('Times','B',12);
	$pdf-&gt;Cell(0,2,'Materias-Asignaturas:',0,0);
 
	for($a=0;$a&lt;4;$a++){ // Bucle para incluir las asignaturas $pdf-&gt;SetFont('Times','B',16);
		$pdf-&gt;Ln(12);
		$nota=rand(10,100)/10; // Obtengo nota aleatoria
		$pdf-&gt;Cell(0,2,utf8_decode($asignaturas[$a]).' ('.rand(0,100).'%) - Nota: '.$nota,0,0); // Imprimo asignatura, porcentaje y nota.
		$pdf-&gt;Ln(12);
		$pdf-&gt;SetFont('Times','B',12);
		$pdf-&gt;Cell(0,2,'Logros evaluados:',0,0);
		$pdf-&gt;Ln(7);
		$pdf-&gt;SetFont('Times','',12);
		shuffle($habilidades); // desordeno los logros del array de ejemplo
		$pdf-&gt;Cell(0,2,'  - '.$habilidades[0],0,0); // Imprimo los logros obtenidas
		$pdf-&gt;Ln(7);
		$pdf-&gt;Cell(0,2,'  - '.$habilidades[1],0,0);
		$pdf-&gt;Ln(7);
		$pdf-&gt;Cell(0,2,'  - '.$habilidades[2],0,0);
		$pdf-&gt;Ln(7);
		$pdf-&gt;Cell(0,2,'_________________________________________________________________________',0,0,'C');
	}
 
}
$pdf-&gt;Output();
?-->