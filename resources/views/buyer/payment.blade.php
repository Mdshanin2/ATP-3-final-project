<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Payment</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Freelancer Name</td>
			<td>Amount</td>
			<td>Date</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($payment); $i++)
			<tr>
				<td>{{$payment[$i]['id']}}</td>
				<td>{{$payment[$i]['fname']}}</td>
				<td>{{$payment[$i]['amount']}}</td>
				<td>{{$payment[$i]['date']}}</td>
				<td>
					<a href="{{route('buyer.editpayment', $payment[$i]['id'])}}">Edit </a>
				</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>