<?php
  header("Content-Type:text/html;charset=utf-8");
  include("conn.php");
  mysqli_query($conn,"set names utf8");
  require_once('PHPExcel.php');
  require_once ('PHPExcel/IOFactory.php');
  require_once ('PHPExcel/Reader/Excel5.php');
	  
if (! empty ( $_FILES ['file'] ['name'] ))
{
$objReader = new PHPExcel_Reader_Excel5(); //use excel2013
$objPHPExcel = $objReader->load($_FILES["file"]["name"]); //���ر��
$sheet = $objPHPExcel->getSheet(0); //��һ��������
$highestRow = $sheet->getHighestRow(); // ȡ��������
$highestColumn = $sheet->getHighestColumn(); // ȡ��������

 
for($j=4;$j<=$highestRow;$j++)
   {
$level= $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();
$major= $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
$number= $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
$course_name= $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
$choise_type= $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
$credit= $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
$class_hour= $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();
$sy_hour= $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();
$sj_hour= $objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue();
$from_to= $objPHPExcel->getActiveSheet()->getCell("J".$j)->getValue();
$teacher_name= $objPHPExcel->getActiveSheet()->getCell("K".$j)->getValue();
$remark= $objPHPExcel->getActiveSheet()->getCell("L".$j)->getValue();


$qurry=mysqli_query($conn,"INSERT INTO courselist values ('','$level','$major','$number','$course_name','$choise_type','$credit','$class_hour','$sy_hour','$sj_hour','$from_to','$teacher_name','$remark')");
   } 
}

header("Location:CourseManagement.php");
?>

