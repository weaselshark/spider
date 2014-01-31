crawler
=======

Usage

1. Initialize 

  $crawler = new Crawler();<br/>
  $crawler->url = "crawlerTestVictim.html";<br/>
  $crawler->init();

    Or

  $crawler = new Crawler("crawlerTestVictim.html");

2. Query

  Ex:

    $images = $crawler->getTagAtrributes("img", "src");//Get the images<br/>
    $headings = $crawler->getInnerText('h1');//Get the headings <br/>
    $links = $crawler->getTagAtrributes("a", "href");//Get the links
