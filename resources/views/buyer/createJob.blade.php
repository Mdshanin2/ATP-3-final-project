<!DOCTYPE html>
<html>
<head>
	<title>Create Job</title>
</head>
<body>

	@include('buyer.NavBar')
	<div id="workspace">
		<h1 align='center'>Create Job</h1>
		<br/>
		<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<tr>
				<td>Buyer User Name</td>
				<td><input type="text" name="buyer_uname" value="{{old('buyer_uname')}}"></td>
			</tr>
			<tr>
				<td>Buyer Email</td>
				<td><input type="text" name="buyer_email" value="{{old('buyer_email')}}"></td>
			</tr>
			<tr>
				<td>Job Description</td>
				<td><input type="text" name="job_desc" value="{{old('job_desc')}}"></td>
			</tr>
			<tr>
				<td>Job Date</td>
				<td><input type="datetime-local" name="job_date" value="{{old('job_date')}}"></td>
			</tr>
			<tr>
				<td>Salary</td>
				<td><input type="text" name="salary" value="{{old('salary')}}"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
					 
					<button>
						<a href="{{route('buyer.home')}}">
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