<?php
/** Here we build the URL we'll use to make an Instagram API request
  * The coordinate values are returned by the Google Maps API, we will use Disneyland, California to pull images posted at the corresponding location.
  */
if(!empty($_GET['location'])) {

    $maps_url = 'https://'.
          'maps.googleapis.com'.
          '/maps/api/geocode/json' .
          '?address= . urlencode($_GET['location']'); 

   $maps_json = file_get_contents($maps_url);
   $maps_array = json_decode($maps_json, true);

   $lat = $maps_array['results'][0]['geometry']['location']['lat'];
   $lng = $maps_array['results'][0]['geometry']['location']['lng'];


/**A URL request string including the Client ID, A unique instagram ID (in form of a hash value that denotes the instagram account for which the API has been granted access),an Access Token,(used for authenticating each API request) and Client Secret parameters are included in this step for a successful request as we have implemented the oauth2 encryption using the Insomnia REST client. These are all obtained from the Google Cloud Platform developers dashboard.*/

   $url = 'https://'.
   'api.instagram.com/v1/media/search'.
   '?lat=' . $lat . 
   '&lng' . $lng .
  . '&client_id= 347083985456-o65000kq1c24slnjn0bol73ag2l7jagp.apps.googleusercontent.com . 
       '&{"web":{"client_id":"347083985456-o65000kq1c24slnjn0bol73ag2l7jagp.apps.googleusercontent.com","project_id":"macro-incline-267711","auth_uri": . '
       "https://accounts.google.com/o/oauth2/auth","token_uri":"https://oauth2.googleapis.com/token","auth_provider_x509_cert_url":"https://www.googleapis.com/oauth2/v1/certs",' .
       '"client_secret":"U4tk9xBKBF6Az2oNIk02MfXz","redirect_uris":["https://www.instagram.com/media/"],"javascript_origins":["https://www.instagram.com"]}} . '
. '&access_token=EAADUMMoeOMsBAIRq2COgqZAeY3bIUxVyDQTB5mgcZBLmoEbtgg4ZBAkZAPfBsRIhCRBZCZBPLZBXDlganfYiR5bVfA03KZCr9ZC1WG6v5ZAyAnWmHiorkcfSNOj7ZCbpYZBGQJyGy1rgmEo9k14CxvHQqbgP3SzNbHHZAywjlBuJmiZBZADDb2DjRgVcmZBz7D9npAZAAidl9ZBmaOn0FX7OGgXoPBzMSB'
$json = file_get_contents($url);
$array = json_decode($json, true);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
 <title>Instagram geocoordinate API</title>
    <script src="https://ajax.googleapis.com/ajax/libs
     /jquery/2.1.3/jquery.min.js"></script>script>
    </script>
</head>
<body>

  <!--HTML document that we will use to generate a simple submit form wherein a location can be entered to pull images from the coordinates the Google Maps API will return after the  API (GET) request has been made.-->
  
<form action="" method="get">
    <input type="text" name="location"/>
    <button type="submit">SUBMIT</button>
</form>
</br>
<div id="results" data-url=<?php
if(!empty($url))
echo $url ?>
  <?php
  if (!empty($array)) {
    foreach ($array))['data'] as $key =>$item) {
     echo '<img id="' . $item['id'] . '" src="'
          . $item['images']['low_resolution'['
          url'] . '" alt=""/></br>;
        }
}

  ?>   
</div>
</body>
</html>
