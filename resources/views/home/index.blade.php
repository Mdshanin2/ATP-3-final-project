
@include('home.admin_header');

	<h1>This is admin home page </h1>
	<!-- <h3>need to add job lists here</h3> -->
{{-- 	
		<!-- <a href="/user/create">Create New User</a> |
		<a href="/home/userlist">User list</a> |
		<a href="/logout">logout</a> -->
	<!-- <form>
		<input type="text" name="searchkey" placeholder="search">
		<input type="button" name="search" value="Search" >
	</form> --}}

{{-- <!--dashboard starts --> --}}
<div>
	<table  align="center">
		<tr>
			<td>
				<div class="card">
				<span class="text-white"> Total jobs available <br>
					{{-- <%= userlist[0].t_c %> --}}
					
				</span>
				</div>
			</td>
			<td>
				<div class="card">
				<span class="text-white"> Total buyers <br>
					{{-- <%= bc[0].t_c %> --}}
				</span>
				</div>
			</td>
			<td>
				<div class="card">
				<span class="text-white"> Total freelancer <br>
					{{-- <%= fc[0].t_c %> --}}
				</span>
				</div>
			</td>
		</tr>
	</table>
</div>


</body>
</html>