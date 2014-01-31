<?php
class Crawler {

    public $url = false;
    protected $xpath = false;

    public function __construct($url = false) {
        
        if ($url) {
            $this->url = $url;
            $this->init($url);
        }
    }

    public function init() {

        $xmlDoc = new DOMDocument();
        @$xmlDoc->loadHTML(file_get_contents($this->url));
        $this->xpath = new DOMXPath(@$xmlDoc);
    }

    public function getInnerText($tag, $limit = 10) {
        
        $content = Array();

        $searchNode = $this->xpath->query("(//{$tag})[position() <= {$limit}]");

        foreach ($searchNode as $node) {

            $content[] = $node->nodeValue;
        }

        return $content;
    }
    
    public function getTagAtrributes($tag, $attr, $limit = 10) {

        $attributes = Array();

        $searchNode = $this->xpath->query("(//{$tag})[position() <= {$limit}]");

        foreach ($searchNode as $node) {

            $attributes[] = $node->getAttribute($attr);
        }

        return $attributes;
    }
    
    public function getImages($limit = 10) {

        $images = Array();

        $searchNode = $this->xpath->query("(//img)[position() <= {$limit}]");

        foreach ($searchNode as $node) {

            $images[] = $node->getAttribute('src');
        }

        return $images;
    }
  
    public function getHeadings($h, $limit = 10) {

        $headings = Array();

        $searchNode = $this->xpath->query("(//h{$h})[position() <= {$limit}]");

        foreach ($searchNode as $node) {

            $headings[] = $node->nodeValue;
        }

        return $headings;
    }
    
    public function getParagraphs($limit = 10) {
        
        $paras = Array();

        $searchNode = $this->xpath->query("(//p)[position() <= {$limit}]");

        foreach ($searchNode as $node) {

            $paras[] = $node->nodeValue;
        }

        return $paras;
    }
}
?> 
