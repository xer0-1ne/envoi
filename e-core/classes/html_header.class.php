<?php # e-core/classes/html_builder.class.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

class HtmlHeader {
    
    private function add_quotes($value) {
            return "'" . $value . "' ";
    }
    
    
    private function add_meta_line($name, $content) {
        
        return "<meta name=" . $this->add_quotes($name) . "content=" . $this->add_quotes($content) . ">\n";

    }
    
    public function add_stylesheet($location) {
        
        echo "<link rel='stylesheet' href={$this->add_quotes($location)}>\n";
        
    } 
    
    public function new_header(&$value) {
    
        echo "<!DOCTYPE html>\n" . 
             "<html lang={$value['html_lang']}>\n" .
             "<head>\n" .
             "<title>{$value['html_site_title']}</title>\n" .
             "<meta charset={$value['html_meta_charset']}>\n" . 
             $this->add_meta_line('viewport', $value['html_viewport'] ) .
             $this->add_meta_line('description', $value['html_meta_description'] ) .
             $this->add_meta_line('author', $value['html_meta_author'] ) .
             $this->add_meta_line('url', $value['html_meta_url'] ) .
             $this->add_meta_line('robots', $value['html_meta_robots'] );
            
            
        /*
                    <link rel="stylesheet" href="<?php echo $site_url; ?>resources/css/bootstrap.min.css">
                    <link rel="stylesheet" href="<?php echo $site_url; ?>resources/css/style.css">
                </head>
                <body>*/

        
        
        
    }
}

?>