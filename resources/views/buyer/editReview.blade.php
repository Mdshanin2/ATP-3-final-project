<!DOCTYPE html>
<html>
<head>
	<title>Edit Review</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Edit Review</h1>
		<br/>
		<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<tr>
				<td>Freelancer Name</td>
				<td><input type="text" name="fname" value="{{$fname}}"></td>
			</tr>
			<tr>
				<td>Review</td>
				<td><input type="text" name="review" value="{{$review}}"></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><input type="text" name="date" value="{{$date}}"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
					 
					<button>
						<a href="{{route('buyer.reviewlist')}}">
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