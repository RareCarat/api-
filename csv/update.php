<?php

# Documentation available here: https://api.rarecarat.com/#method-patch

require '../vendor/autoload.php';

# The API Key to use in all Rare Carat API requests.
# Use your *sandbox* access token if you're just testing things out.
$api_key = 'REPLACEME';

$data = file_get_contents('./data/update.csv');

$client = new GuzzleHttp\Client();
$status_code =  0;
$body = "";

try
{

  $res = $client->request('PATCH', 'https://api.rarecarat.com/v1/diamonds/1c0c858a-fbd8-4419-ac27-002486cb27c8', [
      'auth' => [$api_key, ''],
      'headers' => [
          'Accept'     	=> 'text/csv',
          'Content-Type'  => 'text/csv'
      ],
      'verify' => false,
      'body' => $data
  ]);

  $status_code = $res->getStatusCode();
  $body = $res->getBody();
}
catch (GuzzleHttp\Exception\ClientException $e)
{
  if ($e->hasResponse()) {
    $res = $e->getResponse();
    $status_code = $res->getStatusCode();
    $body = $res->getBody();
  }
}
catch (GuzzleHttp\Exception\ServerException $e)
{
  if ($e->hasResponse()) {
    $res = $e->getResponse();
    $status_code = $res->getStatusCode();
    $body = $res->getBody();
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Rare Carat API Example - PHP</title>
    <link rel="stylesheet" href="https://api.rarecarat.com/css/site.min.css" asp-append-version="true" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="/style.css" asp-append-version="true" />
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">Rare Carat API</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="https://api.rarecarat.com">API Documentation</a>
        </li>
      </ul>
    </nav>

    <div class="hero">
      <div class="container">
        <div class="">
          <h1>PHP - PATCH with CSV</h1>
          <p>
            This page executes a PATCH to /diamonds/id to update an existing resource. Feel free to email us at <a href="mailto:api@rarecarat.com">api@rarecarat.com</a>.
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="">
          <section>
            <h2 class="page-header">HTTP Response Code</h2>
            <p>
              <code><?php echo $status_code; ?></code>
            </p>
            <h2 class="page-header">HTTP Response Body</h2>
            <pre><?php echo $body; ?></pre>
          </section>
        </div>
      </div>
    </div>

  </body>
</html>