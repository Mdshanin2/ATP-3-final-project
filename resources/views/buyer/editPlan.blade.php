<!DOCTYPE html>
<html>
<head>
	<title>Edit Plan</title>
</head>
<body>
	@include('buyer.NavBar')

	<div id="workspace">
		<h1 align='center'>Edit Plan</h1>
		<br/>
		<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table>
			<tr>
				<td>Description</td>
				<td><input type="text" name="fname" value="{{$description}}"></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
					 
					<button>
						<a href="{{route('buyer.companyplan')}}">
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