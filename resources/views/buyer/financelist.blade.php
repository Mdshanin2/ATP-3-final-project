<!DOCTYPE html>
<html>
<head>
	<title>Finance List</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Finance List</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Month</td>
			<td>Amount</td>
		</tr>

		@for($i=0; $i < count($finance); $i++)
			<tr>
				<td>{{$finance[$i]['id']}}</td>
				<td>{{$finance[$i]['month']}}</td>
				<td>{{$finance[$i]['amount']}}</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>