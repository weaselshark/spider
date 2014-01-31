Spider
=======
WS Spider is a php based simple web crawling library which can be used in any php based web application/framework. 

Usage

1. Initialize 

  $spider = new Spider();<br/>
  $spider->url = "spiderTestVictim.html";<br/>
  $spider->init();

    Or

  $spider = new Spider("spiderTestVictim.html");

2. Query

  Ex:

    $images = $spider->getTagAtrributes("img", "src");//Get the images<br/>
    $headings = $spider->getInnerText('h1');//Get the headings <br/>
    $links = $spider->getTagAtrributes("a", "href");//Get the links
