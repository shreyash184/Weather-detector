<?php
	$error = "";

	$exact = "";
	
	if(array_key_exists('city' , $_GET)){
        
      $urlContent = file_get_contents("https://samples.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=b6907d289e10d714a6e88b30761fae22");
      
      $weatherArray = json_decode($urlContent, true);
      
      if($weatherArray['cod'] == 200) {

            $exact .= $weatherArray['weather'][0]['description'];
      
      } else {
        	
        	$error .= "not found";
      }
     
    }
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Weather Detector</title>
    
    <style type="text/css">
      
      	html { 
            background: url(background1.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
		}
      	body{
          
          	background:none;
      	}
      	h4{
          
          	margin:20px 0;	
      	}
      .container{
        
        	text-align:center;
        	margin-top:100px;
        	width:370px;
        	
      }
      #city{
        
        	width:300px;
        	margin:0 0 20px 0 ;
        	background:none;
        	border-radius:10px;
        	
      }
      #button{
        
        	background-color:#006666
;
        	color:white;
        
        	border-radius:10px;
      }
      #notice{
        
        	margin:20px 0;
        		
        	border-radius:20px;
      }
      #weather{
        
        	
      }
      
    </style>
      
  </head>
  <body>
    
    <div class="container">
      
      	<h1>What is Weather ?</h1>
      <h4>Enter your city name</h4>
      <form>
        
        	<input type="text" name="city" placeholder = "eg.London , Paris" id="city">
        	
        	<input type="submit" value = "Predict" id="button">
        
      </form>  
      	
      	<div id="weather">
  				<?php   
          			
          			if($exact){
                        echo '<div class="alert alert-primary" id="notice" role="alert">'.$exact.'</div>';
                      
                    }
          			else if($error) {
                      	
                      	 echo '<div class="alert alert-danger" id="notice" role="alert">'.$error.'</div>';
                      
                    }
          		?>
		</div>
      	
    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    
    
  </body>
</html>