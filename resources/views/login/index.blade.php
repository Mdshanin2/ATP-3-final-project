<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.5.1.js')}}"></script>
	<title>Login</title>
</head>
<body>
	<header> 
		<div class="row">
		<div class= text2> New!!!! Register here ------->>>></div>
	<ul class="main-nav1">
	
			<li><a href="/register" ><input type="button" class="btn btn2" name ="register" value="Sign-Up"></a></li>
		
		</ul>
		</div>	
	</header> 
	<form method="post">
		<!-- @csrf -->
		<!-- {{csrf_field()}} -->
		
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		
	
		
			<div class="login-box">  
				<h1 class="text1">Login</h1>
			 <div class="textbox">
			
			 <input type="text" placeholder="Username" name ='username'  >
			 
			 </div>
	 
			  <div class="textbox">
			
			 <input type="password" placeholder="Password" name ='password' >
			  
			 </div>
			 
			 <input type="submit" class="btn btn1" name ="submit" value="Log in">
		 
		 </div>
		 <div style="color: red">{{session('msg')}} </div>
		
		
	</form>
</body>
</html>
