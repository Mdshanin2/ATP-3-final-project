
@include('home.free_header');

	<h1 align="center">Welcome Home - {{$username}}</h1>
	<br>

<div align="center">
	<table">
		<tr>
			<td>
				<div class="card">
				<span class="text-white"> Total jobs taken <br>
					{{$countjob}}
					
				</span>
				</div>
			</td>
			<td>
				<div class="card">
				<span class="text-white"> Total buyers <br>
				 	{{-- {{$countb}} --}}
				</span>
				</div>
			</td>
			<td>
				<div class="card">
				<span class="text-white"> Total freelancer <br>
					{{-- {{$countfree}} --}}
				</span>
				</div>
			</td>
		</tr>
	</table>
</div>


</body>
</html>