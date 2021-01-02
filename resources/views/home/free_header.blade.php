<!DOCTYPE html>

<html>
<head>
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
 <scriptsrc="jquery.js"> </script>
 <scriptsrc="js/bootstrap.js"> </script>
 <script type="text/javascript" src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- <script src="jquery-2.1.4.js"></script> -->
<script lang="javascript" src="{{asset('js/xlsx.full.min.js')}}"></script>
<script lang="javascript" src="{{asset('js/FileSaver.min.js')}}"></script>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></link>
<style>


</style>
<!-- //////////////////////////////////// --> 


</head>

<body>
  <div class="menu-bar">


  <ul>
    <li class="active"><a href="/free_home"></i>Home</a>
        <div class="sub-menu-1">
            <ul>          
               
                 <!-- <li><a href="/logout">logout</a></li> -->
            </ul>
          </div>
    </li>
	 <li><a href="{{route('free_home.joblist')}}">job lists</a></li>
	<div class="sub-menu-1">
  	<ul>
           <!-- <li><a href="/">Inbo//  -->
  	</ul>
    </div>

</li>
    <li><a href="{{route('free_home.adminlist')}}">Admin</a>
	<div class="sub-menu-1">
  	<ul>
   
		  <!-- <li><a href="/">Replacement order</a></li> -->
  
  	</ul>
    </div>
	
</li>
<li><a href="{{route('home.inbox')}}">Inbox</a></li>
    <!-- <li><a href="">Product</a>
<div class="sub-menu-1">
  <ul>
		<li><a href="">Add Products</a></li>
		<li><a href="">All category</a></li>
		<li><a href="">Add category</a></li>
	  <li><a href="#">Cakes</a></li>
		<li><a href="#">soft drinks</a></li> 

  </ul>

</div>
    </li> -->
	<!-- <li><a href="delivery.php">Delivery</a></li> -->
  <li><a href="/home/admin_info">User info</a></li>
  <li><a href="/logout">Log Out</a></li>
  
  </ul>
  </div>