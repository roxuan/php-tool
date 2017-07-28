<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>我的计算器</title>
		<script type="text/javascript">
			// js写法
			function getResult()
			{
				var num1 = document.getElementById("t1");
				var num2 = document.getElementById("t2");
				var result = document.getElementById("t3");
				var oper = document.getElementById('operation');

				// 所有通过js获得的表单上的值都是字符串而已
				var n1 = parseFloat(num1.value);
				var n2 = parseFloat(num2.value);
				var op = oper.value;

				if(isNaN(n1) || isNaN(n2))
				{
					alert("请输入数字.");
					return;
					// 此return并不返回值,此处的作用只是结束当前函数>
				}
				var res = 0; // = ni+ op + n2; //先这样想 "1" +"+" + "2" 

				switch(op)
				{
					case "+":
						res = n1 +n2;
					break;
					case "-":
						res = n1 -n2;
					break;
					case "*":
						res = n1 *n2;
					break;
					case "/":
						res = n1 /n2;
					break;
					case "%":
						res = n1 %n2;
					break;
					default:
					window.alert("请选择运算符号!");
				}
				result.value = res; //[这个要注意，不能写成res=result.value;否则不输出结果。]
			}
		</script>
	</head>  
<body>
	<label for="">js计算器</label>
	<br/>
	<input type="text" name="t1" id="t1" value="" />
	<select id="operation" >
		<option value="+">+</option>
		<option value="-">-</option>
		<option value="*">*</option>
		<option value="/">/</option>
		<option value="%">%</option>
	</select>
	<input type="text" name="t2" id="t2" value="" />
	<input type="button" name="btn" value="=" onclick="getResult()" />
	<input type="text" name="t3" id="t3" value="" />
</body>
</html>


<!-- php写法 -->
<?php
	if(isset($_POST['op'])){
		// 判断操作符$_POST['op']; 以post形式提交到表单内,元素name属性为op的值
    switch($_POST['op']) {
        case '+':
            $result = $_POST['param1'] + $_POST['param2'];
            break;
        case '-':
            $result = $_POST['param1'] - $_POST['param2'];
            break;
        case 'x':
            $result = $_POST['param1'] * $_POST['param2'];
            break;
        case '/':
            $result = $_POST['param1'] / $_POST['param2'];
            break;
        case '%':
            $result = $_POST['param1'] % $_POST['param2'];
            break;
    }
	}
?>
<br/>
<br/>
<label for="">PHP计算器</label>
<br/>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<input type="text" name="param1" value="<?php echo isset($_POST['param1'])?$_POST['param1']:'';?>">
<select name="op" id="">
<option value="+">+</option>
<option value="-">-</option>
<option value="*">*</option>
<option value="/">/</option>
<option value="%">%</option>
</select>
<input type="text" name="param2"  value="<?php echo isset($_POST['param2'])?$_POST['param2']:'';?>">
<input type="submit" value="=">
<input type="text" value="<?php echo isset($result)?$result:'';?>">
</form>