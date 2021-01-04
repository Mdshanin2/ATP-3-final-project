<!DOCTYPE html>
<html>
<head>
	<title>Billing List</title>
</head>
<body>
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
		<h3>Total billing : {{$count}}</h3>
		<h3>Total amount received : {{$amount}}</h3>
		<h3>Total tax paid : {{$tax}}</h3>
	</div>
	
</body>
</html>