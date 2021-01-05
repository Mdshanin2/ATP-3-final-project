<!DOCTYPE html>
<html>
<head>
	<title>Job Details</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Job Details</h1>
		<br/>
		<table border="1">
		<tr>
			<td>Buyer User Name</td>
			<td>{{$buyer_uname}}</td>
		</tr>
		<tr>
			<td>Buyer Email</td>
			<td>{{$buyer_email}}</td>
		</tr>
		<tr>
			<td>Job Description</td>
			<td>{{$job_desc}}</td>
		</tr>
		<tr>
			<td>Job Date</td>
			<td>{{$job_date}}</td>
		</tr>
		<tr>
			<td>Salary</td>
			<td>{{$salary}}</td>
		</tr>
	</table>
	<br/>
	<a href="{{route('buyer.joblist')}}">Back</a>
	<br/>
	</div>
</body>
</html>