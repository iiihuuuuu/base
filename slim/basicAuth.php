<?php 

namespace slim;
use Tuupola\Middleware\HttpBasicAuthentication;

function basicAuth(): HttpBasicAuthentication {

	return new HttpBasicAuthentication(
		[
			"users" => 
			[
				"root" => "teste123"
			]
		]
	);
}

 ?>