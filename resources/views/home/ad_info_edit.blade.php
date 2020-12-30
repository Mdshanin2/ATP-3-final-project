<!DOCTYPE html>
@include('home.admin_header') 
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="center">
		
		<h3 class="text">edit list</h3>
		<form method="post" onsubmit=" return validate_form()"  action="" enctype="multipart/form-data" class="form-horizontal form-material">
			<div class="form-group">
				<h4 class="text">Full Name:</h4> 
				
				<input type="text" placeholder= "Full name" id="fname" name="fname" value="{{fname}}" class="form-control">
				<span style="color:red" id="err_fname" name ="err_fname"></span>
			</div>
			
			<div class="form-group">
				<h4 class="text">Username:</h4> 
				
				<input type="text"  placeholder="username" name="uname" id="uname" value="{{username}}" class="form-control">
				<span style="color:red"id="err_uname" name ="err_uname"></span>
			</div>
			<div class="form-group">
				<h4 class="text">Password:</h4> 
				
				<input type="password"  placeholder="password" name="pass" id="pass" value="{{password}}" class="form-control">
				<span style="color:red" id="err_pass" name ="err_pass"></span>
               
			</div>
			
			<div class="form-group">
				<h4 class="text">Re-type password:</h4> 
                <input type="password"  placeholder="re-type password" name="pass2" id="pass2"  class="form-control">
			</div>
			<!-- ////////////////////////////////// -->
			<div class="form-group">
					<h4 class="text">Email id:</h4> 
					<input type="text"  placeholder="eg:myname@example.com" name="email" id="email" value="{{email}}" class="form-control">
					<span style="color:red" id="err_email" name ="err_email"></span>
				</div>
	
			<!-- <div class="form-group">
				<h4 class="text">Description:</h4> 
				<textarea type="text" name="description" class="form-control"></textarea>
			</div> -->
			<div class="form-group">
				<h4 class="text">phone no:</h4> 
				<input type="text"  placeholder="phonenumber" name="phone" id="phone" value="{{phone}}"class="form-control" >
				<span style="color:red" id="err_phone" name ="err_phone"></span>
			</div>
			<div class="form-group">
				<h4 class="text">address:</h4> 
				<input type="text"  placeholder="Street address"  name="address1" id="address1" value="{{address}}"class="form-control">
				<span style="color:red" id="err_address" name ="err_address"></span>
			</div>
			
			<!-- <div class="form-group">
				<h4 class="text">member:</h4> 
				
				<input type="radio" name="member" id="member" value="freelancer" >Freelancer 
				<input type="radio" name="member" id="member" value="buyer">Buyer 
				<input type="radio" name="member" id="member" value="admin">Admin
				<span style="color:red" id="err_member" name ="err_member"></span>
			
			</div>   -->

			<div class="form-group text-center">
				
				<input type="submit"  class="btn btn-success" name="submit" value="Update" class="form-control">
			</div>
		</form>
	</div>
	
	<script>
		
		function validate_form()
		{
			// var name=;
			var fname= document.getElementById("fname").value;
			var uname= document.getElementById("uname").value;
			var pass= document.getElementById("pass").value;
			var pass2= document.getElementById("pass2").value;
			var phone= document.getElementById("phone").value;
			var email= document.getElementById("email").value;
			var address1= document.getElementById("address1").value;
			//var member= document.getElementById("member").value;
			
			var valid=true;
			if (document.getElementById("fname").value=="")
			{
				alert("Product Name Required");
				document.getElementById("err_fname").innerHTML="Name Required";
				valid=false;
			}
			
			if (uname=="")
			{
				document.getElementById("err_uname").innerHTML="User name Required";
				valid=false;
			}
			
			
			 if (pass=="" || pass2=="" )
			{
				document.getElementById("err_pass").innerHTML="Password Required ";
				valid=false;
			}
			if (pass != pass2)
			{
				document.getElementById("err_pass").innerHTML="Password did not match ";
				valid=false;
			}
		
			 if (phone==""|| phone.length == 11 )
			{
				document.getElementById("err_phone").innerHTML="Phone number Required";
				valid=false;
			}

			if (email=="")
			{
				document.getElementById("err_email").innerHTML="email Required";
				valid=false;
			}
			if (address1=="")
			{
				document.getElementById("err_address").innerHTML="address Required";
				valid=false;
			}
			// if (member=="")
			// {
			// 	document.getElementById("err_member").innerHTML="Member Required";
			// 	valid=false;
			// }
		return valid;

		}

</script>
	
</body>
</html>