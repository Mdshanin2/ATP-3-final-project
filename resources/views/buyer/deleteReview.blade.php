<!DOCTYPE html>
<html>
<head>
	<title>Delete Review</title>
</head>
<body>
	@include('buyer.NavBar')
	<div id="workspace">
		<h1 align='center'>Delete Review</h1>
		<br/>
		<form method="post">
		<table border="1">
			<tr>
				<td>Freelancer Name</td>
				<td>{{$fname}}</td>
			</tr>
			<tr>
				<td>Review</td>
				<td>{{$review}}</td>
			</tr>
			<tr>
				<td>Date</td>
				<td>{{$date}}</td>
			</tr>
			<tr>
				<td colspan="2">
					<h1>Do you want to delete this review, for sure?</h1><br>
					<input type="submit" name="submit" value="Yes">
					<button>
						<a href="{{route('buyer.reviewlist')}}">No</a>
					</button>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</td>
			</tr>
		</table>
		<a href="{{route('buyer.reviewlist')}}">Back</a>
		</br>
	</form>
	</div>
	<br>
	<br>
</body>
</html>