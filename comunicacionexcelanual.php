<?php

 
	require_once 'PHPExcel.php';
  $conn = new mysqli("localhost","root","1234","prueba");
  // Check connection
  if ($conn->connect_error) {
    die("Connexcion mala " . $conn->connect_error);
  } 
  $fechai=$_POST['fechainicio'];
  list( $anioi, $mesi, $diai ) = split( '[/.-]', $fechai);

  $diaf=$diai;
  $mesf=$mesi;
  $aniof=$anioi+1;

  $fechainicial=$anioi."-".$mesi."-".$diai;

  $fechafinal=$aniof."-".$mesf."-".$diaf;

  $sql = "SELECT * FROM comunicacion WHERE fecha_mensual BETWEEN '$fechainicial' AND  '$fechafinal' ";

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
        ->setCategory("Comunicacion");  

    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);  

    $i = 1; 
    $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue("A".$i,'Id')
      ->setCellValue("B".$i,'Spot Tv')
      ->setCellValue("C".$i,'Spot Radio')
      ->setCellValue("D".$i,'Fecha');
    while($row = $result->fetch_assoc()) {
      $i++;
   
      $objPHPExcel->setActiveSheetIndex(0)
      	->setCellValue('A'.$i, $row['id'])
        ->setCellValue('B'.$i, $row['spottv'])
        ->setCellValue('C'.$i, $row['spotradio'])
        ->setCellValue('D'.$i, $row['fecha_mensual']);
    }
  }
  else{
    echo "ERRr: ".$sql. "<br>" .mysqli_error($conn);
  }

  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="reportecomunicacion '.date("d,m,Y").'.xlsx"');
  header('Cache-Control: max-age=0');

  $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
  $objWriter->save('php://output');
  exit;

  mysqli_close($conn);

?>