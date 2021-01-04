<?php

require_once 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// Get container
$container = $app->getContainer();

/*$app->add(new \Tuupola\Middleware\JwtAuthentication([
    "path" => "/api",
    "ignore" => ["/jwt/v1/login"],
    "attribute" => "decoded_token_data",
    "secret" => JWT_KEY,
    "error" => function ($response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));*/
