<?php 
  require_once 'PHPExcel.php';
  $conn = new mysqli("localhost","root","1234","prueba");
  // Check connection
  if ($conn->connect_error) {
    die("Connexcion mala " . $conn->connect_error);
  } 
  $fechai=$_POST['fechainicio'];
  $fechaf=$_POST['fechafinal'];
  $sql = "SELECT SUM(total_libros)as libri, SUM(carteles) as cartele  ,SUM(dipticos) as dipti  ,SUM(cartillas)as carti ,SUM(asistentes)as asi,SUM(atendidos)as ate  FROM actividades WHERE fecha BETWEEN '$fechai' AND  '$fechaf' ";

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
      ->setCellValue("A".$i,'Libros')
      ->setCellValue("B".$i,'Carteles')
      ->setCellValue("C".$i,'Dipticos')
      ->setCellValue("D".$i,'Cartillas')
      ->setCellValue("E".$i,'Asistentes')
      ->setCellValue("F".$i,'Atendidos');
     
    while($row = $result->fetch_assoc()) {
      $i++;
      $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $row['libri'])
        ->setCellValue('B'.$i, $row['cartele'])
        ->setCellValue('C'.$i, $row['dipti'])
        ->setCellValue('D'.$i, $row['carti'])
        ->setCellValue('E'.$i, $row['asi'])
        ->setCellValue('F'.$i, $row['ate']);              
    }
  }
  else{
    echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
  }
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="estadisticas '.date("d,m,Y").'.xlsx"');
  header('Cache-Control: max-age=0');

  $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
  $objWriter->save('php://output');
  exit;

  mysqli_close($conn);
?>