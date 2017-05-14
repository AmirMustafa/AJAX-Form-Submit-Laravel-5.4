<html>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
   <script src="js/app.js"></script>
   
<center>
      
      <h1> Sending Data through AJAX Laravel</h1><br><br>
       <form id="myForm" style="width: 40%" method="get">
       <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"><br>
       <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name"><br>
       <input type="text" class="form-control" name="email" id="email" placeholder="Email"><br>
       <input type="text" class="form-control" name="password" id="password" placeholder="Password"><br>
       <button type="submit" class="btn btn-warning" name="submit" id="submit">Submit</button>
   </form>

    <div class="msg"></div>   <!-- empty div for showing msg  -->
</center>
    
<script type="text/javascript">

        $(document).ready(function() {
          $("#submit").click(function() {   //button id
             var loginForm = $("#myForm");  //form id
             loginForm.submit(function(e){
                 e.preventDefault();
                 var formData = loginForm.serialize();

                 /*alert(formData);*/

                    $.ajax({
                        url:"create",
                        type:'get',
                        data:formData,
                        success:function(data){
                            alert(data);            
                            
                        },
                        error: function (data) {
                            /*console.log(data);*/
                            alert(data);
                        }
                    });
                });

        /*alert('Successfully Loaded');*/
            });                 
        });
</script>
    

</html>