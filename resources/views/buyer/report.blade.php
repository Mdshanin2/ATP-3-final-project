<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body>
	@include('buyer.NavBar')
	<div id="workspace">
		<h2 align='center'>Generate Billing Info</h2>
		<br/>
		<a href="{{route('buyer.billingreport')}}">
			<button type="button">
				Click Here
			</button>
		</a>
		<br/>
		<br/>
		<h2 align='center'>Generate Finance Info</h2>
		<br/>
		<a href="{{route('buyer.financereport')}}">
			<button type="button">
				Click Here
			</button>
		</a>
		<br/>
		<br/>
		<div style="color: red">{{session('msg')}} </div>
	</div>
</body>
</html>