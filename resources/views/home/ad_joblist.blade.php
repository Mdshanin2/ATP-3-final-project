<!DOCTYPE html>
  @include('home.admin_header');

<div class="container box">
	<div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search jobs available" />
     </div>
</div>
<div class="center" id="search_result">
		<h3 class="text">Job list</h3>
		 <div class="table-responsive">
		<table class="table table-striped" id="mytable">
		<thead>	
		<tr>
			<th>Id</th>
			<th>Buyer_Name</th>
			<th>Buyer_email</th>
			<th>Job_description</th>
			<th>job date</th>
			<th>salary</th>
			<th>Action</th>
		</tr>
   </thead>
	 <tbody>
	 	@for($i=0; $i < count($students); $i++)

			<tr>
				<td>{{$students[$i]['id']}}</td>
				<td>{{$students[$i]['buyer_uname']}}</td>
				<td>{{$students[$i]['buyer_email']}}</td>
				<td>{{$students[$i]['job_desc']}}</td>
				<td>{{$students[$i]['job_date']}}</td>
				<td>{{$students[$i]['salary']}}</td>
				
				<td>
					<!-- <a href="{{route('home.edit', $students[$i]['id'])}}" class="btn btn-success">Edit </a> |
					<a href="{{route('home.show', $students[$i]['id'])}}">Details </a> | -->
					<a href="/jdelete/{{$students[$i]['id']}}" class="btn btn-danger" >Delete </a> 
				</td>
			</tr>

		@endfor


       </tbody>
		<button class="btn btn-success" id="button-a">Create Excel</button>	
	</table>
	</div>

</div>
<div id="info"></div>
	
	<script>
			
				var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {sheet:"Sheet JS"});
				var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
		
				function s2ab(s) {
		
								var buf = new ArrayBuffer(s.length);
								var view = new Uint8Array(buf);
								for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
								return buf;
				}
				$("#button-a").click(function(){
				saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'job list.xlsx');
				});
		
	// create xl sheet  use the top functions
				$(document).ready(function(){

				fetch_customer_data();

				function fetch_customer_data(query = '')
				{
				$.ajax({
				url:"{{ route('live_search.action') }}",
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