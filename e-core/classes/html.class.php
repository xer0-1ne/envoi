<?php #e-core/classes/html_nodes.class.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

class HtmlConstructor {

    protected $page;
    protected $html;

    public function __construct() {
        $this->page = new DOMDocument( '1.0', 'UTF-8' );
    }

    public function display() {
        $this->page->preserveWhiteSpace = false;
        libxml_use_internal_errors(true);
        $this->page->loadHTML($this->html, LIBXML_HTML_NODEFDTD);
        libxml_use_internal_errors(false);
        $this->page->formatOutput = true;

        echo $this->page->saveHTML();
    }

    public function create_doctype() {
        echo "<!doctype html>\n";
    }

    //create a basic html tag with additional attributes
    public function create_node(string $tag, array $attributes) {
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

    //create a menu-based tag with no break lines or return elements
    public function create_menu_node(string $tag, array $attributes) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= ">";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //create a required html tag
    public function create_required_node(string $tag, array $attributes) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= " required>";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //create a tag that must be opened and closed on the same line
    public function create_straight_node(string $tag, array $attributes) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= ">" . "</" . $tag . ">\n";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //create a node that opens and closes with text in between the tags
    public function create_straight_text_node(string $tag, array $attributes, string $l_text) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= ">" . $l_text . "</" . $tag . ">\n";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //create a node that is disabled and has text between the tags
    public function create_straight_disabled_text_node(string $tag, array $attributes, string $l_text) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= " disabled>" . $l_text . "</" . $tag . ">\n";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //create a simple node with no arguments/elements
    public function create_simple_node(string $tag) {
        //build basic line structure
        $tag_line = "<" . $tag . SP;
        
        //close tag line
        $tag_line .= ">\n";
        
        //echo tag line
        $this->html .= $tag_line;
    }
    
    //create an html node with text
    public function create_text_node(string $tag, array $attributes, string $l_text) {
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

    public function create_menu_text_node(string $tag, array $attributes, string $l_text) {
        //build basic line structure
        $tag_line = "<{$tag} ";
        
        //get attributes from array, get key as attribute title and value as attribute value
        foreach ($attributes as $key => $value ) {
                $tag_line .= $key . "=" . $this->add_quotes($value) . SP;
        }
        
        //close tag line
        $tag_line .= ">" . $l_text . "</{$tag}>";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    public function create_simple_text_node(string $tag, string $l_text) {
        //build basic line structure
        $tag_line = "<{$tag} ";
               
        //close tag line
        $tag_line .= ">" . $l_text . "</{$tag}>\n";
        
        //echo tag line
        $this->html .= $tag_line;
    }

    //add quotes
    private function add_quotes($value) {
        return "'" . $value . "'";
    }
    
    //create break line tag
    public function create_br() {
        $this->html .= "<br>\n";
    }

    //create horizontal rule tag
    public function create_hr() {
        $this->html .= "<hr>\n";
    }

    //close an html tag
    public function close_node(string $tag) {
        $this->html .= "</" . $tag . ">\n";
    }

    //functiobn to get posts (passes the )
    public function get_posts() {
        post_fetch($this);

    }

    //get the admin bar for the main page
    public function get_adminbar() {
        display_admin_quickbar($this);
    }

}

?>