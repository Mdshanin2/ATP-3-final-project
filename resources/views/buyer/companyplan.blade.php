<!DOCTYPE html>
<html>
<head>
	<title>Company Plan</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Company Plan</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Description</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($company_plan); $i++)
			<tr>
				<td>{{$company_plan[$i]['id']}}</td>
				<td>{{$company_plan[$i]['description']}}</td>
				<td>
					<a href="{{route('buyer.editplan', $company_plan[$i]['id'])}}">Edit </a>
				</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>