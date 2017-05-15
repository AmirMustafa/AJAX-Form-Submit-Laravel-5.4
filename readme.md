
This project is developed in Laravel 5.4. It will help us to send form data in Laravel with the help of AJAX.

## Installation

1. Download or Clone the repository
2. Keep this project in server or XAMPP
3. jQuery must be added(Added jQuery CDN)
3. Run this code through XAMPP
4. Try filling the form and submitting data will response in alert without refreshing the page. Hence AJAX successful
5. I ahave commented the code properly for better understanding

## Logic

1. First run this code and click Click here link.You will see the form page.
2. In the signup form (i.e. resources/views/user.blade.php) you will find a form, an empty div and ajax script :
   
   Form must have id, get method and submit button id. AJAX Script samepage: Now Ajax should be of method get, action not required

   ```

   <center>
      
      <h1> Sending Data through AJAX Laravel</h1><br><br>
       <form id="myForm" style="width: 40%" method="get">		<!-- form id must -->
       <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"><br>
       <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name"><br>
       <input type="text" class="form-control" name="email" id="email" placeholder="Email"><br>
       <input type="text" class="form-control" name="password" id="password" placeholder="Password"><br>
       <button type="submit" class="btn btn-warning" name="submit" id="submit">Submit</button>  <!-- button id must -->
   </form>

    <div class="msg"></div>   //empty div for showing msg
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
                            //alert(data); 	//for redirecting instead of alert try below code

                            if(data == "") {		//True Case i.e. passed validation
                            window.location = {{route('Your_Route_to Redirect_to_Homepage')}}
                            }
                            else {					//False Case: With error msg
                            $("#msg").html(data);	//$msg is the id of empty msg
                            }
                            
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

   

3. Now goto Routes(i.e. routes/web.php) to handle set it:

	```

	Route::get('/', function () {	// welcome page click here route
	    return view('welcome');
	});
	/*Route::get('/', 'PhotoController@index');*/
	/*Route::get('/user', 'PhotoController@index');*/

	Route::get('/user', [						//opening the signup page through this route
	    'uses' => 'PhotoController@index',		//controller to pass and function
	    'as' => '/user'							//name of the route
	]);

	Route::get('/create', 'PhotoController@create');	//create is the route for receiving form submit via AJAX
	Route::get('store', 'PhotoController@store');

	```

4. No we goto PhotoController Controller(i.e. app/http/controller/PhotoController.php)

	```

	<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Data;
use Validator;
use Illuminate\Support\Facades\Input;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)                //Receiving AJAX Request Data here
    {
       echo $fname = $_GET['fname'];						//Way of receiving AJAX Data
		echo "<br>";
		echo $lname = $_GET['lname'];

        //Now instead of echoing the variable you can write Insert Query here

        /*
            $insert = DB::insert('insert into usr_dtls (first_name, last_name, username, email,password ) values (?, ?, ?, ?, ?)', [$data['first_name'], $data['last_name'], $data['user_name'], $data['uemail'], $data['user_pass1']]);

            To redirect through AJAX use window.location in AJAX script in

            

            }
        */
	
	
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$fname = $_POST['formData'];
		echo $fname;*/
		echo "hello";
		    /*return view('user');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


	```

## Looks
