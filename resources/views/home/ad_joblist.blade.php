<!DOCTYPE html>
  @include('home.admin_header');


<div class="center" id="search_result">
		<h3 class="text">Job list</h3>
		<table class="table table-striped" id="mytable">
		<tr>
			<td>Id</td>
			<td>Buyer_Name</td>
			<td>Buyer_email</td>
			<td>Job_description</td>
			<td>job date</td>
			<td>salary</td>
			<td>Action</td>
		</tr>

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

		<button class="btn btn-success" id="button-a">Create Excel</button>	
	</table>
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
			</script>
</body>
</html>