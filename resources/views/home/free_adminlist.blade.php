<!DOCTYPE html>
  @include('home.free_header');


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

		@for($i=0; $i < count($adminlists); $i++)

			<tr>
				<td>{{$adminlists[$i]['id']}}</td>
				<td>{{$adminlists[$i]['fname']}}</td>
				<td>{{$adminlists[$i]['username']}}</td>
				<td>{{$adminlists[$i]['email']}}</td>
				<td>{{$adminlists[$i]['phone']}}</td>
				<td>{{$adminlists[$i]['address']}}</td>
				
				<td>
					<!-- <a href="{{route('home.edit', $adminlists[$i]['id'])}}" class="btn btn-success">Edit </a> |
					<a href="{{route('home.show', $adminlists[$i]['id'])}}">Details </a> | -->
					<a href="/admin/reply/{{$adminlsits[$i]->username}}" class="btn btn-success" >chat </a> 
				</td>
			</tr>

		@endfor


	</table>
</div>
</body>
</html>