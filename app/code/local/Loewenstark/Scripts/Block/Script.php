<?php

class Loewenstark_Scripts_Block_Script
extends Mage_Page_Block_Html_Head
{
    
    protected $_ext_url = array();

        /**
     * alias of getCssJsHtml
     * 
     * @return string html
     */
    public function getJsHtml()
    {
        return self::getCssJsHtml();
    }
    
    public function addExternalJs($url)
    {
        $url = trim($url);
        if(empty($url)) {
            return $this;
        }
        // kill proto/set auto mode (https and http)
        $url = str_ireplace(array("https://","http://"), array("//","//"), $url);
        $this->_ext_url[] = $url;
        return $this;
    }
    
    public function getExternalJsHtml()
    {
        $items = array_unique($this->_ext_url);
        if(count($items) < 1) {
            return "";
        }
        $html = "<script type=\"text/javascript\">\n";
        $i = 0;
        foreach($items as $_item)
        {
            $i++;
            $html .= "(function(d, s, id) {".
                        "var js, fjs = d.getElementsByTagName(s)[0];".
                        "if (d.getElementById(id)) return;".
                        "js = d.createElement(s); js.id = id;".
                        "js.src = \"{$_item}\";".
                        "fjs.parentNode.insertBefore(js, fjs);".
                        "}(document, 'script', 'externaljs-{$i}'));\n";
        }
        $html .= "</script>";
        return $html;
    }

    /**
     * Block link Tags
     * 
     * @param string $type
     * @param string $name
     * @param array $params
     * @param bool $if
     * @param string $cond
     * @return $this
     */
    public function addItem($type, $name, $params=null, $if=null, $cond=null)
    {
        if ($type=='js' || $type=="skin_js") {
            return parent::addItem($type, $name, $params, $if, $cond);
        }
        return $this;
    }
    
    /**
     * get All items
     * 
     * @return string html
     */
    public function getCssJsHtml()
    {
        return parent::getCssJsHtml();
    }
}
