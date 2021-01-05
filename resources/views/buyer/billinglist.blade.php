<!DOCTYPE html>
<html>
<head>
	<title>Billing List</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Billing List</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Freelancer Name</td>
			<td>Amount</td>
			<td>Tax</td>
		</tr>

		@for($i=0; $i < count($billing); $i++)
			<tr>
				<td>{{$billing[$i]['id']}}</td>
				<td>{{$billing[$i]['fname']}}</td>
				<td>{{$billing[$i]['amount']}}</td>
				<td>{{$billing[$i]['tax']}}</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>