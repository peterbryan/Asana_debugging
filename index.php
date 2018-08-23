<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>


<?php

require dirname(__FILE__) . '/php-asana/vendor/autoload.php';




$ASANA_CLIENT_ID = getenv('my_asana_client_id');
$ASANA_CLIENT_SECRET = getenv('my_asana_client_secret');


$client = Asana\Client::oauth(array(
    'client_id'     => 'ASANA_CLIENT_ID',
    'client_secret' => 'ASANA_CLIENT_SECRET',
    'redirect_uri'  => 'urn:ietf:wg:oauth:2.0:oob',
));


if ($ASANA_CLIENT_ID === false || $ASANA_CLIENT_SECRET === false) {
    echo "Please set the ASANA_CLIENT_ID and ASANA_CLIENT_SECRET environment variables.\n";
    exit;
}


$client = Asana\Client::oauth(array(
    'client_id' => getenv('ASANA_CLIENT_ID'),
    'client_secret' => getenv('ASANA_CLIENT_SECRET'),
    // this special redirect URI will prompt the user to copy/paste the code.
    // useful for command line scripts and other non-web apps
    'redirect_uri' => Asana\Dispatcher\OAuthDispatcher::NATIVE_REDIRECT_URI
));
echo "authorized=" . $client->dispatcher->authorized . "\n";




?>
<p> 
	<div id="Button1">
		<button id="myBtn">Open Upload Logo</button>
	</div>

	<!-- Upload Logo -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <span class="close">&times;</span>
		<p>
			<form action="uploadIcon.php" enctype="multipart/form-data" method="post">
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<input type="file" name="logo"  />
			</form>

		</p>
	  </div>

	</div>
</p>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>