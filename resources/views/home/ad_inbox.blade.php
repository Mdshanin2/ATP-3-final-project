<!DOCTYPE html>
  @include('home.admin_header');





<div class="center" id="search_result">
    <h3 class="text">chat list</h3>
    <table class="table table-striped">
        @csrf
		<thead>
            <!-- <th>id</th>  -->
             <th> Message</th> 
            <th>User_name</th>
            <!-- <th> User id</th> -->
            <th> Action</th>
            <th>Action</th>
            <th></th>
            
        </thead>
        <tbody>
				@for($i=0; $i < count($students); $i++)
                <tr>
                    <!-- <td>{{$students[$i]->id_chat}}</td> -->
                    <td>{{$students[$i]->message}}</td> 
					<td>{{$students[$i]->username}}</td>
                    
                   
                    <td><a href="/inbox/reply/{{$students[$i]->username}}"class="btn btn-success">Reply</a></td>  
                    <td><a href="/inbox/delete/{{$students[$i]->id_chat}}" class="btn btn-danger">Delete</a></td>  
                    
                    
                </tr>
				@endfor
         
            
        </tbody>
    </table>
</div>


</body>
</html>