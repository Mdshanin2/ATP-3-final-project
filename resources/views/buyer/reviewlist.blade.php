<!DOCTYPE html>
<html>
<head>
	<title>Review List</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Review List</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Freelancer Name</td>
			<td>Review</td>
			<td>Date</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($review); $i++)
			<tr>
				<td>{{$review[$i]['id']}}</td>
				<td>{{$review[$i]['fname']}}</td>
				<td>{{$review[$i]['review']}}</td>
				<td>{{$review[$i]['date']}}</td>
				<td>
					 
				</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>