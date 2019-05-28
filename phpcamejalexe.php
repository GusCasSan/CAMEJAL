<?php

 
	require_once 'PHPExcel.php';
 $conn = new mysqli("localhost","root","1234","prueba");
// Check connection
if ($conn->connect_error) {
    die("Connexcion mala " . $conn->connect_error);
} 
$fechai=$_POST['fechainicio'];
    $fechaf=$_POST['fechafinal'];

  $sql = "SELECT * FROM actividades WHERE fecha BETWEEN '$fechai' AND  '$fechaf' ";

$result = $conn->query($sql);
  
  // Return the number of rows in result set
  
  if($result->num_rows > 0){
  
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("Revinex")
        ->setLastModifiedBy("Revinex")
        ->setTitle("Reporte")
        ->setSubject("Reporte")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("Revinex con  phpexcel")
        ->setCategory("actividades");  

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);  

   $i = 1; 
      $objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$i,'Id')
->setCellValue("B".$i,'Evento')
->setCellValue("C".$i,'Asunto')
->setCellValue("D".$i,'Fecha')
->setCellValue("E".$i,'Lugar')
->setCellValue("F".$i,'Tipo de Participacion')
->setCellValue("G".$i,'Total Libros')
->setCellValue("H".$i,'Libros')
->setCellValue("I".$i,'Carteles')
->setCellValue("J".$i,'Dipticos')
->setCellValue("K".$i,'Cartillas')
->setCellValue("L".$i,'Asistentes')
->setCellValue("M".$i,'Atendidos')
->setCellValue("N".$i,'Funcionario');

   while($row = $result->fetch_assoc()) {

      $i++;
   

$objPHPExcel->setActiveSheetIndex(0)
        	->setCellValue('A'.$i, $row['id'])
            ->setCellValue('B'.$i, $row['evento'])
            ->setCellValue('C'.$i, $row['asunto'])
            ->setCellValue('D'.$i, $row['fecha'])
            ->setCellValue('E'.$i, $row['lugar'])
            ->setCellValue('F'.$i, $row['tipo_participacion'])
            ->setCellValue('G'.$i, $row['total_libros'])
            ->setCellValue('H'.$i, $row['libros'])
            ->setCellValue('I'.$i, $row['carteles'])
            ->setCellValue('J'.$i, $row['dipticos'])
            ->setCellValue('K'.$i, $row['cartillas'])
            ->setCellValue('L'.$i, $row['asistentes'])
            ->setCellValue('M'.$i, $row['atendidos']);
              $sqlatf = "SELECT * FROM actividad_tiene_funcionarios WHERE (id_evento=".$row['id'].")";
                  $resultatf = $conn->query($sqlatf);
                  if ($resultatf->num_rows > 0) {
                    while($rowatf = $resultatf->fetch_assoc()) {
                      $sqlf = "SELECT * FROM funcionarios WHERE (id=".$rowatf['id_funcionario'].")";
                      $resultf = $conn->query($sqlf);
                      //se despliega el resultado  
                      if ($resultf->num_rows > 0) {
                        while($rowf = $resultf->fetch_assoc()) {
                          $nombref = (string)$rowf['nombre']." ";
                          $apellido_p = (string)$rowf['apellido_p']." ";
                          $apellido_m = (string)$rowf['apellido_m'];
                          $cargo = (string)$rowf['cargo'];
                          $funcionarios .= $nombref ;
                          $objPHPExcel->setActiveSheetIndex(0)
        					->setCellValue('N'.$i, $funcionarios);

                        }
                      }
                    }
                  } 



 


   }


  }
  else{
	echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte '.date("d,m,Y").'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;

mysqli_close($conn);







?>