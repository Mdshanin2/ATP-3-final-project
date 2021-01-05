<!DOCTYPE html>
<html>
<head>
	<title>Delete Job</title>
</head>
<body>
	@include('buyer.NavBar')
	<div id="workspace">
		<h1 align='center'>Delete Job</h1>
		<br/>
		<form method="post">
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
			<tr>
				<td colspan="2">
					<h1>Do you want to delete this job, for sure?</h1><br>
					<input type="submit" name="submit" value="Yes">
					<button>
						<a href="{{route('buyer.joblist')}}">No</a>
					</button>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</td>
			</tr>
		</table>
		<a href="{{route('buyer.joblist')}}">Back</a>
		</br>
	</form>
	</div>
	<br>
	<br>
</body>
</html>