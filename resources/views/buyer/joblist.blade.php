<!DOCTYPE html>
<html>
<head>
	<title>Job List</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Job List</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Id</td>
			<td>Buyer User Name</td>
			<td>Buyer Email</td>
			<td>Job Description</td>
			<td>Job Date</td>
			<td>Salary</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($job_list); $i++)
			<tr>
				<td>{{$job_list[$i]['id']}}</td>
				<td>{{$job_list[$i]['buyer_uname']}}</td>
				<td>{{$job_list[$i]['buyer_email']}}</td>
				<td>{{$job_list[$i]['job_desc']}}</td>
				<td>{{$job_list[$i]['job_date']}}</td>
				<td>{{$job_list[$i]['salary']}}</td>
				<td>
					<a href="{{route('buyer.editjob', $job_list[$i]['id'])}}">Edit </a> |
					<a href="{{route('buyer.jobdetails', $job_list[$i]['id'])}}">Details </a> |
					<a href="{{route('buyer.deletejob', $job_list[$i]['id'])}}">Delete </a> 
				</td>
			</tr>
		@endfor

		</table>	
		<br/>
	</div>
	
</body>
</html>