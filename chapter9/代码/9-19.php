<?
header("Content-type: text/html; charset=gb2312"); 
 $strJsonp = "demo({name:'alonely', age:24,email:['ycplxl1314@163.com', 'ycplxl1314@gmail.com'], family:{parents:['父亲','母亲'],toString:function(){return '家庭成员';}}})";
  echo $strJsonp; 		  //输出JSONP格式代码	
?>


