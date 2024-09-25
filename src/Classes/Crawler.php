<?php

namespace Jhonattan\WebCrawler\Classes;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class Crawler
{
    private string $url = 'https://www.adorocinema.com/filmes/melhores/decada-2020/ano-2024/';

    public function getMoviesData()
    {

        $html = $this->getHtml();
        $crawler = new DomCrawler($html);

        $movies = $crawler->filter('.mdl')->each(function (DomCrawler $node) {
            return [
                'title' => $node->filter('.meta-title-link')->text(),
                'rating' => $node->filter('.stareval-note')->text(),
                'synopsis' => $node->filter('.content-txt')->text(),
                'image' => $node->filter('.thumbnail-img')->attr('src'),
            ];
        });
        return $movies;
    }
    private function getHtml()
    {
        $client = new Client(['headers' => ['User-Agent' => 'Mozilla/5.0']]);
        $response = $client->request('GET', $this->url);
        return $response->getBody()->getContents();
    }
}
