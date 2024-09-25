<?php

require_once __DIR__ . "/vendor/autoload.php";

use Jhonattan\WebCrawler\Classes\Crawler;

$crawler = new Crawler();

foreach ($crawler->getMoviesData() as $movie) {
    echo "Título: {$movie['title']} <br>";
    echo "Avaliações: {$movie['rating']}<br>";
    echo "<br> <br> ----------------------------------- <br> <br>";
}
