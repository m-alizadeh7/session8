// JavaScript Document
function cheack_user()
{
	var u=document.getElementById("Username")
	var p=document.getElementById("Password")
	 if(u.value=="")
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
	else
		{
			return true;
		}
}