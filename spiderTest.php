<?php

require 'spider.php';

class spiderTest extends PHPUnit_Framework_TestCase {
    
    private $spider;

    public function getSpider() {

        if (!$this->spider instanceof Spider) {
            $this->spider = new Spider();
        }

        return $this->spider;
    }

    public function testGetInnerText() {

        $crawler = new Spider("spiderTestVictim.html");
        
        $content = $crawler->getInnerText('p');
        $this->assertEquals('Paragraph one...', $content[0]);
        $this->assertEquals('Paragraph two...', $content[1]);
        
        $content = $crawler->getInnerText('h1', 1);//test the limit
        $this->assertEquals(1, count($content));
        $this->assertEquals('Title One', $content[0]);
    }
    
    public function testGetTagAtrributes() {

        $crawler = new Spider("spiderTestVictim.html");
        
        $images = $crawler->getTagAtrributes("img", "src"); 
        $this->assertEquals(3, count($images));
        $this->assertEquals('image_one.jpg', $images[0]);
        $this->assertEquals('image_two.jpg', $images[1]);
        
        $images = $crawler->getTagAtrributes("img", "src", 1);//test the limit
        $this->assertEquals(1, count($images));
        $this->assertEquals('image_one.jpg', $images[0]);
        
        $links = $crawler->getTagAtrributes("a", "href");
        $this->assertEquals(2, count($links));
        $this->assertEquals('crawlerTestVictimLink1.html', $links[0]);
        $this->assertEquals('crawlerTestVictimLink2.html', $links[1]);
    }
    
    public function testGetImages() {

        $crawler = new Spider("spiderTestVictim.html");
        
        $images = $crawler->getImages();        
        $this->assertEquals('image_one.jpg', $images[0]);
        $this->assertEquals('image_two.jpg', $images[1]);
        
        $images = $crawler->getImages(1);//test the limit
        $this->assertEquals(1, count($images));
        $this->assertEquals('image_one.jpg', $images[0]);
    }
    
    public function testGetHeadings() {

        $crawler = new Spider();
        $crawler->url = "spiderTestVictim.html";
        $crawler->init();//Manual initialization
        
        $headings = $crawler->getHeadings(1);//h1 headings
        $this->assertEquals('Title One', $headings[0]);
        $this->assertEquals('Title Two', $headings[1]);
        
        $headings = $crawler->getHeadings(1,1);//test the limit
        $this->assertEquals(1, count($headings));
        $this->assertEquals('Title One', $headings[0]);
    }
    
    public function testGetParagraphs() {

        $crawler = new Spider("spiderTestVictim.html");
        
        $paragraphs = $crawler->getParagraphs();
        $this->assertEquals('Paragraph one...', $paragraphs[0]);
        $this->assertEquals('Paragraph two...', $paragraphs[1]);
        
        $paragraphs = $crawler->getParagraphs(1);//test the limit
        $this->assertEquals(1, count($paragraphs));
        $this->assertEquals('Paragraph one...', $paragraphs[0]);
    }
}
?>