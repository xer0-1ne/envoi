<?php #e-core/classes/html_tags.class.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

class HtmlConstructor {

    private $page;
    protected $html;

    public function __construct() {
        $this->page = new DOMDocument();
    }

    public function display() {
        $this->page->preserveWhiteSpace = false;
        $this->page->formatOutput = true;
        //$this->page->saveXML($this->html,LIBXML_HTML_NOIMPLIED);
        echo $this->html;
    }

    public function create_doctype() {
        echo "<!doctype html>\n";
    }

    public function create_tag(string $tag, array $attributes) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= ">\n";
        
        //echo tag line
        $this->html .= $tag_line;
    }
    
    public function create_tag_text(string $tag, string $l_text, array $attributes) {
        //build basic line structure
        $tag_line = "<{$tag} ";
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= ">" . $l_text . "</{$tag}>\n" . BR;
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //add quotes
    private function add_quotes($value) {
        return "'" . $value . "'";
    }
    
    //create break line tag
    public function create_br() {
        echo "<br>\n";
    }

    //create horizontal rule tag
    public function create_hr() {
        echo "<hr>\n";
    }
    
    public function open_tag(string $tag) {
        
        $this->html .= "<" . $tag . ">\n";
    }
    
    public function close_tag(string $tag) {
        
        $this->html .= "</" . $tag . ">\n";
    }

    public function get_posts() {

        post_fetch($this);

    }
}

?>