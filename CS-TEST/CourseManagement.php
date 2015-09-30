<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>CourseManagement</title>
<style>
body{
	width:1100px;
	height:100%;
	position:relative;
	margin:0 auto;
}
table{
	position:relative;
	height:auto;
	width:1100px;
}
table tbody tr td{border:1px solid black;height:30px;text-align:center;font-size:14px;}
table tbody tr th{border:1px solid black;height:30px;text-align:center;}
h1{text-align:center;}	
</style>

<script>
function chk(){
	var filename=document.getElementById("file").value;
	var data=filename.split(".");
	if(filename=="")
	{
		alert("请选择文件!");
	}
	else if(data[1]!="xls")
	{
		alert("请选择Excel文件！");
	}
	else
	{
        document.getElementById("frm").submit();
		alert("导入成功！");
	}
		
}
</script>
</head>

<body>

<form method="post" id="frm" action="excel_load.php" enctype="multipart/form-data" >
         <h3>导入Excel表：</h3>
		 <input  type="file" name="file" id="file" />  
            <input type="button"  value="导入" onclick="chk()" />
</form>
 
<h1>教师报课统计</h1>
<table cellspacing="0px">
<tbody>
<tr>
<th>年级</th>
<th>专业</th>
<th>专业人数</th>
<th>课程名称</th>
<th>选修类型</th>
<th>学分</th>
<th>学时</th>
<th>实验学时</th>
<th>上机学时</th>
<th>起讫周数</th>
<th>任课教师</th>
<th>备注</th>
</tr>
<?php 
include("conn.php");
$conn->query("set names utf8");
$sql ="SELECT * FROM courselist";//查询数据库
$query=$conn->query($sql);
while($result=$query->fetch_array(MYSQL_NUM))//读取一条数据
{
   if($result==true){
	   do
	   {
?>
<tr>
<td><?php echo $result[1];?></td>
<td><?php echo $result[2];?></td>
<td><?php echo $result[3];?></td>
<td><?php echo $result[4];?></td>
<td><?php echo $result[5];?></td>
<td><?php echo $result[6];?></td>
<td><?php echo $result[7];?></td>
<td><?php echo $result[8];?></td>
<td><?php echo $result[9];?></td>
<td><?php echo $result[10];?></td>
<td><?php echo $result[11];?></td>
<td><?php echo $result[12];?></td>
</tr>
<?php }while($result=$query->fetch_array(MYSQL_NUM));
}?>
  </tbody>
  </table>
  <?php
  exit;//退出
}?>
</body>
</html>
