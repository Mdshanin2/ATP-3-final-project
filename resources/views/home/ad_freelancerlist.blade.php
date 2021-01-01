<!DOCTYPE html>
  @include('home.admin_header');

<div class="container box">
	<div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search jobs available" />
     </div>
</div>

<div class="center" id="search_result">
		<h3 class="text">Freelancer list</h3>
			 <div class="table-responsive">
			<table class="table table-striped">
		<thead>	
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Username</td>
			<td>Email</td>
			<td>Phone no</td>
			<td>Address</td>
			<td>Action</td>
		</tr>
     </thead>
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
					<a href="/fdelete/{{$students[$i]['id']}}" class="btn btn-danger" >Delete </a> 
				</td>
			</tr>

		@endfor
	</table>
</div>
</div>
	<script>
	$(document).ready(function(){

				fetch_customer_data();

				function fetch_customer_data(query = '')
				{
				$.ajax({
				url:"{{ route('freelancer_search.action') }}",
				method:'GET',
				data:{query:query},
				dataType:'json',
				success:function(data)
				{
					$('tbody').html(data.table_data);
					$('#total_records').text(data.total_data);
				}
				})
				}

				$(document).on('keyup', '#search', function(){
				var query = $(this).val();
				fetch_customer_data(query);
				});
				});

			</script>
</body>
</html>