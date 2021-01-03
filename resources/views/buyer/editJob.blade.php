<!DOCTYPE html>
<html>
<head>
	<title>Edit Job</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Edit Job</h1>
		<br/>
		<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<tr>
				<td>Buyer User Name</td>
				<td><input type="text" name="buyer_uname" value="{{$buyer_uname}}"></td>
			</tr>
			<tr>
				<td>Buyer Email</td>
				<td><input type="text" name="buyer_email" value="{{$buyer_email}}"></td>
			</tr>
			<tr>
				<td>Job Description</td>
				<td><input type="text" name="job_desc" value="{{$job_desc}}"></td>
			</tr>
			<tr>
				<td>Job Date</td>
				<td><input type="datetime-local" name="job_date" value="{{$job_date}}"></td>
			</tr>
			<tr>
				<td>Salary</td>
				<td><input type="text" name="salary" value="{{$salary}}"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
					 
					<button>
						<a href="{{route('buyer.joblist')}}">
							Back
						</a>
					</button>
					 
				</td>
			</tr>
		</table>
	</form>
		<div>
			@foreach($errors->all() as $err)
				{{$err}} <br>
			@endforeach
		</div>
	</div>
</body>
</html>