<?php 
		
	

    	if(array_key_exists('city', $_GET)){


    		$city= $_GET['city'] = str_replace(' ','',$_GET['city']);
    		$file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");

				if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
				    $error= "That city could not be found. ";
				}
				
				else {
				

    		$city= $_GET['city'] = str_replace(' ','',$_GET['city']);

        $forecast = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");

        $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecast);

        if(sizeof($pageArray) > 1) {

        		  $secondPageArray = explode('</span></span></span><',$pageArray[1]);

        		  if(sizeof($secondPageArray) > 1){

        			$weather = $secondPageArray[0];
        		}else{

        			$error= "That city could not be found. ";
        		}

        }

      }



    }

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <title>Weather Scraper</title>
        <style type="text/css">
        
          body {
              
           background: url(weather2.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
              
          }

            .container{
                width: 450px;
                text-align: center;
                margin-top: 100px;
            }
            input{
                margin-top: 20px;
            }
            #weather{
				
				margin-top: 15px;
            }
        
        </style>

    </head>

    <body>
        <div class="container">
            <h1>What's The Weather?</h1>
            
            <form >
            <lable for="city">Enter the name of a city</lable>
            <input class="form-control input-lg" type="text" name="city" id="city" placeholder="Eg. Vancouver, New York" value="<?php 

            	if(array_key_exists('city', $_GET)){


            		echo $_GET['city']; }


            ?>">
        
            <button style="margin-top:20px" type="submit" class="btn btn-primary">Submit</button>

            <div id="weather"><?php 

            	if($weather){

                  

            		echo '<div class="alert alert-success" role="alert">'. $weather .
  							
							'</div>';
						}else if($error){
            		echo '<div class="alert alert-danger" role="alert">'. $error .
  							
							'</div>';
            		}

             ?>
			</div>



        </form>

        </div>
  	


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>