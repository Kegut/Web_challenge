<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
    
<body>

  

    <?php    

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8080",
        CURLOPT_URL => "http://localhost:8080/wordpress/wp-json/wp/v2/job_postings/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
    
            $result = json_decode($response,true);
            
            echo("Job Posting List <br>");
            echo("<ul> ");
            
            
            foreach ($result as $value){
                
              
                print_r("<li>" . $value["title"]["rendered"] . $value["content"]["rendered"] . "</li>");
                
                
                
                echo "<br>";
            
            }
            echo("</ul>");
  
        }
    
    

    
      
    ?>
    
   
    
    

</body>

</html>