
<!DOCTYPE html>

<html>

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

		

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	

	<script src="jquery-2.1.4.min.js"></script>



	<script  src="getUrlParam.js"></script>



	<script type="text/javascript" src="jquery-form.js"></script>



</head>

<body>

&nbsp;&nbsp;<a style=" color:red; font-size:30px;" href="http://exp.szer.me/rh/home/delete_modefy/index.html">返回</a>

<h1>修改单个数据：</h1>



<a>该数据的具体信息如下</a>



<div id="contentpage" style="display:none"></div>

    <script type="text/javascript">



	var myurl="http://exp.szer.me/parry/testlib/problem/"+ <?php echo $_POST["pid"]; ?>;



	$(document).ready(function(){

 

		$.get(myurl,function(data,status){
		var jsonReturn = JSON.parse(data);
		//======为修改读取数值====================================================
		$("#problem").val(jsonReturn.retdata.problem.title);
		//$("#answers").val(jsonReturn.retdata.problem.answers);
		$("#hint").val(jsonReturn.retdata.problem.hint);
		$("#pro_source").val(jsonReturn.retdata.problem.pro_source);
		$("#classification").val(jsonReturn.retdata.problem.classification);
		$("#option_num").val(jsonReturn.retdata.problem.optionAr.length);
		$("#ans_num").val(jsonReturn.retdata.problem.answers.length);



		if(jsonReturn.retdata.problem.pro_type=="exclusive choice")
			$("[name='pro_type']:eq(0)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.pro_type=="multiple choice")
			$("[name='pro_type']:eq(1)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.pro_type=="exclusive fill")
			$("[name='pro_type']:eq(2)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.pro_type=="multiple fill")
			$("[name='pro_type']:eq(3)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.pro_type=="short answer")
			$("[name='pro_type']:eq(4)").attr("checked","checked");


		if(jsonReturn.retdata.problem.language=="multi")
			$("[name='language']:eq(0)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.language=="zh")
			$("[name='language']:eq(1)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.language=="en")
			$("[name='language']:eq(2)").attr("checked","checked");
		else if(jsonReturn.retdata.problem.language=="all")
			$("[name='language']:eq(3)").attr("checked","checked");

		var optionstring="";
		var ansstring="";
		var optindex2=["a","b","c","d","e","f","g","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
	
			for(i=0;i<jsonReturn.retdata.problem.optionAr.length;i++)
			{
				//var x=optindex2[i];
				if(jsonReturn.retdata.problem.optionAr[i].content){
				optionstring=optionstring+"选项内容"+optindex2[i]+"：<input type='text' name='optionAr["+optindex2[i]+"]' value="+jsonReturn.retdata.problem.optionAr[i].content+" style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>　</br></br>";
				}
				else{
					optionstring=optionstring+"选项内容"+optindex2[i]+"：<input type='text' name='optionAr["+optindex2[i]+"]' value='' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>　</br></br>";
				}
			}
			for(i=0;i<jsonReturn.retdata.problem.answers.length;i++)
			{
				//var x=optindex2[i];
				ansstring=ansstring+"答案"+(i+1)+"：<input type='text' name='answers["+i+"]' value="+jsonReturn.retdata.problem.answers[i]+" style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>　</br></br>";
			}
			$("#optionstring").append(optionstring);

			$("#optionstring").show();

			$("#optionstring").html(optionstring);

			$("#ansstring").append(ansstring);

			$("ansstring").show();

			$("#ansstring").html(ansstring);
		
		



		//==============================================================================

		var pagestring="";

		pagestring=pagestring +"<tr><td>题目id:</td><td>"+jsonReturn.retdata.problem.pid+"</td><td>语言：</td><td>"+jsonReturn.retdata.problem.language+"</td></tr>";

		pagestring=pagestring +"<tr><td>最后一次编辑时间:</td><td>"+jsonReturn.retdata.problem.edit_time+"</td><td>编辑次数：</td><td>"+jsonReturn.retdata.problem.total_edit+"</td></tr>";

		pagestring=pagestring +"<tr><td>pro_type：</td><td>"+jsonReturn.retdata.problem.pro_type+"</td><td>题目来源为：</td><td>"+jsonReturn.retdata.problem.pro_source+"</td></tr>";

		pagestring=pagestring +"<tr><td>题目：</td><td colspan='3'>"+jsonReturn.retdata.problem.title+"</td></tr>";

		if(jsonReturn.retdata.problem.title_pic!=null)

		pagestring=pagestring +"<tr><td>题目图片：</td><td colspan='3'><img src="+jsonReturn.retdata.problem.title_pic+" /></td></tr>";

		if(jsonReturn.retdata.problem.optionAr[0]){

			if(jsonReturn.retdata.problem.optionAr[0].is_pic=="1"){

				for(i=0;i<jsonReturn.retdata.problem.optionAr.length;i++){

					pagestring=pagestring +"<tr><td>选项名：</td><td colspan='3'>"+jsonReturn.retdata.problem.optionAr[i].key+"</td></tr>";

					pagestring=pagestring +"<tr><td>选项内容:</td><td colspan='3'><img src="+jsonReturn.retdata.problem.optionAr[i].content+" /></td></tr>";

				}

		

			}

			else{

				for(i=0;i<jsonReturn.retdata.problem.optionAr.length;i++){

					pagestring=pagestring +"<tr><td>选项名：</td><td colspan='3'>"+jsonReturn.retdata.problem.optionAr[i].key+"</td></tr>";

					pagestring=pagestring +"<tr><td>选项内容:</td><td colspan='3'>"+jsonReturn.retdata.problem.optionAr[i].content+"</td></tr>";

				}

			
	
			}

		}else{
			pagestring;
		}

		pagestring=pagestring +"<tr><td>提示：</td><td colspan='3'>"+jsonReturn.retdata.problem.hint+"</td></tr>";

		pagestring=pagestring +"<tr><td>答案：</td><td colspan='3'>"+jsonReturn.retdata.problem.answers+"</td></tr>";

		for(j=0;j<jsonReturn.retdata.problem.comments.length;j++){

			

			pagestring=pagestring +"<tr><td>评论的内容"+(j+1)+":</td><td>"+jsonReturn.retdata.problem.comments[j].comment+"</td><td>评论的时间：</td><td>"+jsonReturn.retdata.problem.comments[j].time+"</td></tr>";

		}







		var contenttablehead="<table border='1'width='1000px'height='200px'bordercolor='pink'cellspacing='0'cellpadding='10px'>";

		var contenttablefoot="</table>";

		$("#contentpage").append(pagestring);

		$("#contentpage").show();

		$("#contentpage").html(contenttablehead +pagestring +contenttablefoot);

		});

	});

	

</script>	













<script type="text/javascript">

function ajaxsubmit(){

	

	$(function(){



		/** 验证文件是否导入成功  */



		$("#testlib").ajaxForm(function(data){  



			var jsonReturn = JSON.parse(data);

			if(jsonReturn.retcode=="200200"){

				 alert("修改成功，修改后题目ID是："+jsonReturn.retdata.pid);

				 window.location.reload();

			 }

			else

			 	alert("添加失败");



			



		});     



	});



}

</script>



<form method="POST" id="testlib" action=""name="testlib" target="nm_iframe" >



     <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">



 

      <tr>

		</br>

          <td height="50">题　　目：<input type="text" id="problem" name="title" size="200" maxlength="500" style="width:920px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;" placeholder="请输入题目"></td>

        </tr>

 

      <tr>


 <td height="50">题目类型：		  <label id="t1"><input  type="radio" name="pro_type" value="exclusive choice" onclick="javascript:changetype()" checked>单选</label>　		  <label id="t2"><input type="radio" name="pro_type" value="multiple choice" onclick="javascript:changetype()">多选　</label>		  <label id="t3"><input type="radio" name="pro_type" value="exclusive fill" onclick="javascript:changetype()">单项填空</label>　		  <label id="t4"><input type="radio" name="pro_type" value="multiple fill" onclick="javascript:changetype()">多项填空</label>　		  <label id="t5"><input type="radio" name="pro_type" value="short answer" onclick="javascript:changetype()">简答题</label>		</td>
       </tr>

 
	
     <tr>
		
			<td height="50"> <div id="if_option">选项数量：<input type="text" name="option_num" id="option_num" value="" OnChange="change_answernum();"></div></td>
		
	</tr>

      
 

      <tr>



          <td height="50"><div id="optionstring"></div>
		 
		  <div id="ans_num1">答案数量：<input type="text" name="ans_num" id="ans_num" value="0" OnChange="change_answernum();"></div></br>

			
       </tr>

 <tr><td height="50"><div id="ansstring"></div></td></tr>

      <tr>

		 

          <td height="50">提　　示：<input type="text" name="hint" id="hint" value=""size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'></td>

       </tr>

 

      <tr>



          <td height="50">IQ题类目：<input type="text" name="classification" id="classification" value=""></td>

       </tr>

 

      <tr>



          <td height="50">语言类别：<label id="l1"><input type="radio" name="language" value="multi">中英文</label>　		  <label id="l2">　<input type="radio" name="language" value="zh" >中文</label>　		  <label id="l3">　<input type="radio" name="language" value="en" checked>英文</label>　		  <label id="l4">　<input type="radio" name="language" value="all">其他</label></td>
       </tr>

 

      <tr>



          <td height="50">题目来源的xml文件名<input type="text" name="pro_source" id="pro_source" value=" logic-diagram "></td>

       </tr>

 

      <tr>



          <td height="50"><input type="submit" value=" 提   交 " name="" onclick=" ajaxsubmit(); " style="line-height:19px;  font-size:14px"></td>

		  

       </tr>

    

     </table>

<a style="color:red">注：若改变选项和答案数量或题目类型，则选项内容及答案皆会重置</a>

	





<script type="text/javascript">

	var myurl_2="http://exp.szer.me/parry/testlib/problem/"+ <?php echo $_POST["pid"]; ?>;

	//document.testlib.action = myurl_2; 

	$("#testlib").attr("action",myurl_2);

	
function show_ans_num(){
	var num = getprotype();
	$("#ans_num1").hide();
}
//show_ans_num();
function getprotype(){

   var x=document.getElementsByName("pro_type");

   for(i=0;i<=4;i++)

   	if(x[i].checked) num=i;

   return num;

}

function changetype(){

   var num =getprotype();

  // if(num == 4)document.testlib.option_num.value="0";

   //else if(num == 2)document.testlib.option_num.value="1";

   //else document.testlib.option_num.value="4";



   change_answernum();

   if(num >=2)$("#optionstring").hide();
   else $("#optionstring").show();
	if(num==1)  $("#ans_num1").show();
   else $("#ans_num1").hide();
   if(num==2||num==4){
		$("#if_option").hide();
   }
   else if(num==3){
		 $("#if_option").hide();
	     $("#ans_num1").show();
   }else $("#if_option").show();

}



function change_answernum(){

	var ans_type=getprotype();

	var ans_string="答　　案：<input type='text' name='answers[0]'  value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'> <br/><br/>";

	if(ans_type==3){

		ans_num=document.testlib.ans_num.value;

		
		for(i=1;i<ans_num;i++){

			

			ans_string=ans_string  + "答　案 " +(i+1) +"：<input type='text' name='answers["+i+"]'  value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'><br/><br/>";

		}

	}else if(ans_type==0){
		var optsring="选项内容a：<input type='text' name='optionAr[a]' value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>";
		var optindex=["a","b","c","d","e","f","g","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
		ans_num=document.testlib.option_num.value;
		for(i=2;i<=ans_num;i++){
			optsring=optsring + "<br/><br/>";
			
			optsring=optsring  + "选项内容" + optindex[i-1] +"：<input type='text' name='optionAr[" + optindex[i-1] + "]' value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>";
		}
	}else if(ans_type==1){
		var optsring="选项内容a：<input type='text' name='optionAr[a]' value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>";
		var optindex=["a","b","c","d","e","f","g","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
		ans_num=document.testlib.option_num.value;
		for(i=2;i<=ans_num;i++){
			optsring=optsring + "<br/><br/>";
			
			optsring=optsring  + "选项内容" + optindex[i-1] +"：<input type='text' name='optionAr[" + optindex[i-1] + "]' value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'>";
		}
		ans_num=document.testlib.ans_num.value;
		for(i=1;i<ans_num;i++){
			
			ans_string=ans_string  + "答　案 " +(i+1) +"：<input type='text' name='answers["+i+"]'  value=''size='200' maxlength='500' style='width:520px; height:50px; vertical-align:middle; border:1px solid #ccc; padding:0 10px; line-height:38px; font-size:16px;'><br/><br/>";
		}

	}

	$("#ans").html(ans_string);

	if(ans_type<=1){

		$("#optionstring").html(optsring+"<br><br>");

	}

}





</script>

</form>



<iframe id="id_iframe"  name="nm_iframe" align="top" frameborder="0" width="0px" height="0px" scrolling="auto"  ></iframe> 


<h1>删除单个数据：</h1>


<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	
	<tr>

          <td height="50" align="center"><input type="submit" style=" color:red; font-size:20px;"  value="删除数据" id="submit" name="" onclick="deletedata();"  >
		  </td>

    </tr>
 </table>

<script type="text/javascript">
function deletedata(){

	var r=confirm("确定删除？");


	

	if(r==true){
		$(document).ready(function(){
			var myurl="http://exp.szer.me/parry/testlib/problem/delete/"+<?php echo $_POST["pid"]; ?>;
  
			$.post(myurl,function(data,status){
			var jsonReturn = JSON.parse(data);
			if(jsonReturn.retcode=="200200"){
				alert(jsonReturn.retmsg);
				window.location.reload();
			}
			else
		 		alert("删除失败，可能不存在该题目id");
			});
  
		});
		}
	else
	{
		alert("删除失败!");
	}
}
</script>

<h1>对单个数据评论：</h1>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	
	<tr>
		 请输入评论：<textarea rows="10" cols="100" maxlength="1000" placeholder="请输入您的评论!" value="" id="comment" style="vertical-align: top;"></textarea><br/><br/>

		 </td>
    </tr>
	<tr>

          <td height="50"><input type="submit" value="提 交"  id="submit" name="" onclick="submit_comment();"  style="line-height:19px; font-size:14px">
		  </td>

    </tr>
</table>
<script type="text/javascript">
	function submit_comment(){
		
		var myurl2="http://exp.szer.me/parry/testlib/problem/comment/"+<?php echo $_POST["pid"]; ?>;
		var mycomment=document.getElementById("comment").value;
		$(document).ready(function(){
			$.post(myurl2,
			 {

				 comment:mycomment
				 
			},
			function(data,status){
				alert(status);
				window.location.reload();
			});


		});
	}

</script>
</body>

</html>