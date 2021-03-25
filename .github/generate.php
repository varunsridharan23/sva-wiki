<?php
$output = <<<HTML
<meta name="monetization" content="$ilp.uphold.com/edRH7RxRBhXz"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
	  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	  <div class="container-fluid py-3">
<div class="row">
<div class="col-12 text-center"><h1 class="m-1">VS Wiki</h1></div>
</div>
HTML;

$json = json_decode( file_get_contents( 'https://cdn.svarun.dev/json/envato-items.json' ), true );

foreach ( $json as $head => $data ) {
	$heading = '';
	$output  .= '<div class="row"> <div class="col-12 mb-2">';
	switch ( $head ) {
		case 'plugins':
			$heading = 'WordPress / WooCommerce Plugins';
			break;
		case 'html':
			$heading = 'HTML Templates';
			break;
	}
	$output .= "<div class=\"row\"> <div class=\"col-12 mb-3\"><h2>${heading}</h2></div> </div> <div class=\"row\">";
	foreach ( $data as $item ) {
		$output .= <<<HTML
<div class="col-12 col-md-3 mb-3">
<div class="card" >
  <img src="{$item['banner']}" class="card-img-top" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title">{$item['name']}</h5>
    <div class="text-center">
    <a href="{$item['docs']}" class="btn btn-primary">Documentation</a>
    <a href="{$item['demo_site']}" class="btn btn-dark">Live Demo</a>
    <a href="{$item['ref_url']}" class="btn btn-success">Buy Now</a>
    </div>
  </div>
</div>
</div> 
HTML;

	}
	$output .= '</div></div></div><hr/>';

}

$output .= <<<HTML
</div>
HTML;

file_put_contents( __DIR__ . '/../index.html', $output );
