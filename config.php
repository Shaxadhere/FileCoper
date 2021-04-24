<?php

function getHTMLRoot()
{
    return "/lmscss";
}

function getServerRoot()
{
    return $_SERVER['HTTP_HOST'] . "/lmscss";
}

function connect()
{
    $server = "localhost";
    $usr = "root";
    $pass = "";
    $data = "arttcsslms";
    $connection = mysqli_connect($server, $usr, $pass, $data) or die("failed to connect to database");
    return ($connection);
}

include_once('assets/vendor/phprapid/rapid.php');

function vdocipher_api($st_name,$videoID,$reg_no = null){

	global $time;

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://dev.vdocipher.com/api/videos/$videoID/otp",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode([
	    'annotate' => json_encode([[
	      'type'=>'rtext',
	      'text'=>'ARTT Business School',
	      'alpha'=>'0.60',
	      'color'=>'0xFF0000',
	      'size'=>'35',
	      'interval'=>'5000'
	    ],
	    [
	      'type'=>'rtext',
	      'text'=>'[ip]',
	      'alpha'=>'0.70',
	      'color'=>'0xFF0000',
	      'size'=>'10',
	      'interval'=>'3000'
	    ],
	    [
	      'type'=>'rtext',
	      'text'=> $time,
	      'alpha'=>'0.70',
	      'color'=>'0xFF0000',
	      'size'=>'15',
	      'interval'=>'3000'
	    ],
	    [
	      'type'=>'rtext',
	      'text'=> $st_name,
	      'alpha'=>'0.70',
	      'color'=>'0xFF0000',
	      'size'=>'20',
	      'interval'=>'3000'
	    ],
	    [
	      'type'=>'rtext',
	      'text'=> $reg_no,
	      'alpha'=>'0.70',
	      'color'=>'0xFF0000',
	      'size'=>'10',
	      'interval'=>'3000'
	    ]
	]),
	  ]),
	  CURLOPT_HTTPHEADER => array(
	    "Accept: application/json",
	    "Authorization: Apisecret LeiCVJ43sfk1OIFvIWjjLIRnD9TJIE9zrzUJgQEMfsHe0RWxkS59RHifFPMzJxLU",
	    "Content-Type: application/json"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  return json_decode($response);
	}

}

function HTMLToast()
{
    if (isset($_REQUEST['Success'])) {
        echo "<div class='sa4d25'>";
        echo "<div class='container-fluid'>";
        echo "<div class='row'>";
        echo "<div class='col-lg-12'>";
        echo "<div class='alert alert-success' id='alert'>";
        echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
        echo "<strong>Success! </strong> $_REQUEST[Success]";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    if (isset($_REQUEST['error'])) {
        echo "<div class='sa4d25'>";
        echo "<div class='container-fluid'>";
        echo "<div class='row'>";
        echo "<div class='col-lg-12'>";
        echo "<div class='alert alert-danger' id='alertdanger'>";
        echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
        if($_REQUEST['error'] == 401){
            echo "<strong>Error! </strong> Access Unauthorized! You are not allowed to visit the page you are trying to access";
        }
        else{
            echo "<strong>Error! </strong> $_REQUEST[error]";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
