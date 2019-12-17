// JavaScript Document
function Cheack_Data()
{
	var n=document.getElementById("txtn");
	var f=document.getElementById("txtf");
	var u=document.getElementById("txtu");
	var p=document.getElementById("txtp");
	var j1=document.getElementById("j1");
	var j2=document.getElementById("j2");
	var c=document.getElementById("city");	
	if (n.value=="")
		{
			alert("نام را وارد کنید");
			n.focus();
			return false;
		}
	else if(f.value=="")
		{
			alert("خانوادگی را وارد کنید");
			f.focus();
			return false;
		}
	else if(u.value=="")
		{
			alert("نام کاربری را وارد نمایید")
			u.focus();
			return false;
		}
	else if(p.value=="")
		{
			alert("پسورد را وارد کنید")
			p.focus();
			return false;
		}
	else if(c.value==0)
		{
			alert("شهر را وارد کنید")		
			c.focus();
			return false
			
		}
		
	else 
		return true;

}
