<!DOCTYPE html>
  @include('home.free_header');

<div class="center" id="search_result">
    <h3 class="text">chat Box</h3>
    <table class="table table-striped">
    @csrf
        <thead>

            <th> Message</th>
            <th>Date</th>
            <th>Reply</th>

            <th></th>
            
        </thead>
        <tbody>

        @for($i=0; $i < count($replytxt); $i++)
                <tr>
                    <td>{{$replytxt[$i]->message}}</td> 
					<td>{{$replytxt[$i]->date}}</td>
					<td>{{$replytxt[$i]->reply}}</td>

                </tr>
                @endfor
                

          

        </tbody>
    </table>


    <div class="center">
        <form method="post"  action="" enctype="" class="form-horizontal form-material">

    <div class="form-group">
    @csrf
        <!-- <h4 class="text">Username:</h4>  -->
        
        <input type="text"  placeholder="Message" name="message" id="mes" class="form-control" size="50">
        <span style="color:red"id="err_uname" name ="err_uname"></span>
    </div>
      

    <div class="form-group text-center">
        
        <input type="submit"  class="btn btn-success" name="Reply" value="Reply" class="form-control">
    </div>
</form>
</div>
</div>



</body>
</html>






