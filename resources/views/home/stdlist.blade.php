<!DOCTYPE html>
 <!-- @include('home.header')  -->
<html>
<head>
	<title>Student List</title>
</head>
<body>
	<a href="/home">Back</a> |
	<a href="/logout">logout</a>
	<br>

	<table border="1">
		<tr>
			<td>Id</td>
			<td>Username</td>
			<td>Name</td>
			<td>Dept</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($students); $i++)

			<tr>
				<td>{{$students[$i]['id']}}</td>
				<td>{{$students[$i]['username']}}</td>
				<td>{{$students[$i]['password']}}</td>
				<td>{{$students[$i]['type']}}</td>
				<td>
					<a href="{{route('home.edit', $students[$i]['id'])}}">Edit </a> |
					<a href="{{route('home.show', $students[$i]['id'])}}">Details </a> |
					<a href="/delete/{{$students[$i]['id']}}">Delete </a> 
				</td>
			</tr>

		@endfor


	</table>
</body>
</html>