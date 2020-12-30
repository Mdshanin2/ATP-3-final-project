<!DOCTYPE html>
  @include('home.admin_header');


<div class="center" id="search_result">
		<h3 class="text">Admin list</h3>
		<table class="table table-striped">
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Username</td>
			<td>Email</td>
			<td>Phone no</td>
			<td>Address</td>
			<td>Action</td>
		</tr>

		@for($i=0; $i < count($students); $i++)

			<tr>
				<td>{{$students[$i]['id']}}</td>
				<td>{{$students[$i]['fname']}}</td>
				<td>{{$students[$i]['username']}}</td>
				<td>{{$students[$i]['email']}}</td>
				<td>{{$students[$i]['phone']}}</td>
				<td>{{$students[$i]['address']}}</td>
				
				<td>
					<!-- <a href="{{route('home.edit', $students[$i]['id'])}}" class="btn btn-success">Edit </a> |
					<a href="{{route('home.show', $students[$i]['id'])}}">Details </a> | -->
					<a href="/delete/{{$students[$i]['id']}}" class="btn btn-danger" >Delete </a> 
				</td>
			</tr>

		@endfor


	</table>
</div>
</body>
</html>