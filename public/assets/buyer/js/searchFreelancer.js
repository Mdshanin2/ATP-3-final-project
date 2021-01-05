$(document).ready(function(){

	$('input[type=button]').click(function(){
		let json = {
			"searchkey" : $('#searchkey').val()
		}
		$.ajax({
			url: '/searchfreelancer',
			type: 'GET',
			dataType:'json',
			data: json,
			success: function(response){
				var string=`<table id="view" border="1">
							<tr>
								<td>Id</td>
								<td>Freelancer Name</td>
								<td>Freelancer User Name</td>
								<td>Email</td>
								<td>Phone</td>
								<td>Address</td>
							</tr>`;
				for(i=0; i<response.length ; i++)
				{
					string=string+"<tr>";
					string=string+"<td>"+response[i]['id']+"</td>";
					string=string+"<td>"+response[i]['fname']+"</td>";
					string=string+"<td>"+response[i]['username']+"</td>";
					string=string+"<td>"+response[i]['email']+"</td>";
					string=string+"<td>"+response[i]['phone']+"</td>";
					string=string+"<td>"+response[i]['address']+"</td>";
					string=string+"</tr>";
				}
				string=string+`</table>`;
				console.log(string);
				$("#searchresult").html(string);
			},
			error: function(error){

			}
		});

	});			
});