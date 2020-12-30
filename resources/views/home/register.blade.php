<html lang="en" dir="ltr">
	<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/register.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery-3.5.1.js')}}"></script>
    </head>
	<body><div class= container>
        <span class="text1"><b> Membership Registration</b></span>
        <span class="text2">Complete the form below to sign up for our membership service.</span>	
        <hr>
        </div >
        <div class="form">
        <form method="post" onsubmit="return validate_form()" action="" enctype="">
                <!-- <table> -->
    @csrf
                        <div class="textbox">
                        <!-- <label style="color:white" for "name"><b>Name:</label> -->
                        <input type="text"  placeholder= "Full name"  id="name" name="name" value="{{old('name')}}"><span style="color:red" id="err_fname" name ="err_fname"></span>
                            <!-- <input type="text"  placeholder="Last name" value="<?php //echo $lname;?>" name="lname" > -->
                            <!-- <br><span>First Name</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span>Last Name</span> -->
                            <!-- <span style="color:red"><?php //echo $err_fname;?></span> -->
                        
                             
                            <br>
                            <!-- <span style="color:red"><?php //echo $err_lname;?></span> -->
                        
                     </div>
                    
                     <div class="textbox">
                        <input type="text"  placeholder="username" name="username" id="uname" value="{{old('username')}}"><span style="color:red" id="err_uname" name ="err_uname"></span>
                        <!-- <span style="color:red"><?php // echo $err_uname;?></span> -->
                        
                        
                    
                    </div>
    
                    <div class="textbox">
                        
                        <input type="password"  placeholder="password" name="password" id="pass" value="{{old('password')}}"><span style="color:red" id="err_pass" name ="err_pass"></span>
                        <input type="password"  placeholder="re-type password" name="pass2" id="pass2" >
 

                        <!-- <span style="color:red">< <span style="color:red"><?php //echo $err_pass;?></span>
                       ho $err_pass2;?></span> -->
                        
                        
                    
                    </div>
    
                    
    
                    <div class="textbox">
                        <!-- <label for "email" style="color:white"><b>E-mail: </label> -->
                        <input type="text"  placeholder="eg:myname@example.com" name="email" id="email" value="{{old('email')}}"><span style="color:red" id="err_email" name ="err_email"></span>
                        <!-- <span style="color:red"><?php //echo $err_email;?></span> -->
                        <!-- <br><span>Email</span> -->
                        
                    </div>
                    
                    <div class="textbox">
                        <!-- <td style="color:white"><b>Phone:</td> -->
                         
                        <!-- <input type="text" name="area" value="<?php //echo $area;?>"> -->
                        <input type="text" class= "textbox t4" placeholder="phonenumber" name="phone" id="phone" value="{{old('phone')}}" ><span style="color:red" id="err_phone" name ="err_phone"></span>
                        <!-- <br><span>area code</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span>phone number</span> -->
                            
                        
                            <!-- <span style="color:red"><?php //echo $err_area;?></span> -->
                        
                            <!-- <br><span style="color:red"><?php //echo $err_phone;?></span> -->
                        
                    </div>
    
                    <div class="textbox">
                        
                        <!-- <td style="color:white"><b>Address:</b></td> -->
                        <td><input type="text"  placeholder="Street address"  name="address" id="address1" value="{{old('address')}}"><span style="color:red" id="err_address" name ="err_address"></span>
                        <!-- <input type="text"  placeholder="Street address part 2" value="<?php //echo $address2;?>" name="address2" > -->
                            
                            <!-- <span style="color:red"><?php // echo $err_add1;?></span>     -->
                            <!-- <span style="color:red"><?php // echo $err_add2;?></span>	 -->
                        <!-- <br><span>Street address</span> -->
                        <!-- <br><span>Street address Line 2</span> -->
                            
                    </div>
                 
                    
                  
                    <div class="radio">
                    
                        <label for "member" style="color:rgb(0, 0, 0)"><b>Member type: </b></label>
                        <input type="radio" name="member" value="freelancer"> Freelancer 
                        <input type="radio" name="member" value="buyer"> Buyer
                        <span style="color:red" id="err_member" name ="err_member"></span>
                    </div>                   
                   
                    <div> <span style="color:red">
                     @if($errors) 
                    <ul>
                        @foreach($errors->all() as $err)
                    <li> {{$err}}</li>
                         @endforeach
                    </ul>
                   @endif
                    </span></div>

                  
        

                    <div class="cnt">
                            <input type="submit" align="center" class="btn btn1" name="submit" value="Submit">
                    </div>	                    
                <!-- </table> -->
            </form>
        </div>
       
       <script>
            //needs work
            function validate_form()
            {
                // var name=;
                var fname= document.getElementById("name").value;
                var uname= document.getElementById("uname").value;
                var pass= document.getElementById("pass").value;
                var pass2= document.getElementById("pass2").value;
                var phone= document.getElementById("phone").value;
                var email= document.getElementById("email").value;
                var address1= document.getElementById("address1").value;
                var member= document.getElementById("member").value;
                
                var valid=true;
                if (document.getElementById("name").value=="")
                {
                    alert("Product Name Required");
                    document.getElementById("err_fname").innerHTML="Name Required";
                    valid=false;
                }
                
                if (uname=="")
                {
                    document.getElementById("err_uname").innerHTML="User name Required";
                    valid=false;
                }
                
                
                 if (pass=="" || pass2=="" )
                {
                    document.getElementById("err_pass").innerHTML="Password Required ";
                    valid=false;
                }
                if (pass != pass2)
                {
                    document.getElementById("err_pass").innerHTML="Password did not match ";
                    valid=false;
                }
            
                 if (phone==""|| phone.length == 11 )
                {
                    document.getElementById("err_phone").innerHTML="Phone number Required";
                    valid=false;
                }
    
                if (email=="")
                {
                    document.getElementById("err_email").innerHTML="email Required";
                    valid=false;
                }
                if (address1=="")
                {
                    document.getElementById("err_address").innerHTML="address Required";
                    valid=false;
                }
                if (member=="")
			    {
				document.getElementById("err_member").innerHTML="Member Required";
				valid=false;
			    }
            return valid;
    
            }
    
    </script>
        
        </body>
    </html>
           
                    <!-- <div class="textbox">	
                            <input type="text"  placeholder="City" value="<?php //echo $city;?>" name="city" >
                            <!-- <input type="text"  placeholder="State/province"  value="<?php //echo $state;?>" name="state" > -->
                            
                            <!-- <br><span>City</span>  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span>State / Province </span> 
                            <span style="color:red"><?php //echo $err_city;?></span>
    
                            
                            <br>
                            <!-- <span style="color:red"><?php //echo $err_state;?></span> 
                            
                        
                    
                    </div> -->
          <!-- <div class="textbox">
                            <input type="text"   placeholder="Postal/Zip code" value="<?php //echo $postal;?>" name="postal" >
                            <!-- <br><span>postal / Zip Code</span> 
                            <span style="color:red"><?php //echo $err_postal;?></span>
                        
                    </div>
                      -->

       <!-- <div class= checkbox>
                        <label for "where" style="color:white"><b>where did you hear about us?</b> </label>
                        <input type="checkbox" name="hear[]" value="friend">A Friend or colleague <br>
                         <input type="checkbox" name="hear[]" value="Google"> Google<br> 
                         <input type="checkbox" name="hear[]" value="Blog"> Blog Post <br>
                         <input type="checkbox" name="hear[]" value="news"> News Article 
                        
                    </div> -->

     <!-- <div class= combobox>
                        <label for "dob" style="color:white"><b>Birth date</label>
                        <td>
                            <select>
                            <?php 
    
                                for($i=1; $i<=31; $i++)
                                     {
                                          ?>
    
                                        <option value="<?php //echo $i;?>"><?php //echo $i;?></option>
                                        <?php
                                    }
                                                ?> 
                            </select> 
                    
    
                        
                            <select>
                            <?php 
    
                                for($i=1; $i<=12; $i++)
                                     {
                                          ?>
    
                                        <option value="<?php //echo $i;?>"><?php //echo $i;?></option>
                                        <?php
                                    }
                                                ?> 
                            </select> 
                    
    
                        
                            <select>
                            <?php 
    
                                for($i=1970; $i<=2020; $i++)
                                     {
                                          ?>
    
                                        <option value="<?php //echo $i;?>"><?php //echo $i;?></option>
                                        <?php
                                    }
                                                ?> 
                            </select> 	
                    
                    
                    
                        <br><span>day</span>&emsp;&nbsp;<span>month</span>&emsp;<span>year</span>
                        
                    </div> -->