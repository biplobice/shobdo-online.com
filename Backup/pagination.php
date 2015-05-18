<?php
class Pagination {
    
    protected
    
    /*
    * Configuration defaults
    */
    $_arrConfig = array(
        'limit'=>10
        ,'page'=>1
        ,'basePath'=>'#'
        ,'label'=>'Items'
        ,'visiblePages'=>5
        ,'pageFlag'=>'{page}'
    )
    
    /*
    * Data to be passed to template
    */
    ,$_arrTemplateData = array()
    
    /*
    * function to pass resolved offset and limit
    */
    ,$_onPaginate
    
    /*
    * extra arguments to pass to to pagination callback 
    * such as data source or db connection
    */
    ,$_arrArgs;
    
    public function __construct($onPaginate,$arrConfig=array(),$arrArgs=array()) {
    
        $this->_onPaginate = $onPaginate;
        $this->_arrArgs = $arrArgs;
    
        foreach($arrConfig as $strKey=>$mixValue) {
            if(array_key_exists($strKey,$this->_arrConfig)) {
                $this->_arrConfig[$strKey] = $mixValue;
            }
        }
    }
    
    public function paginate() {
    
        /*
        * Calculate page offset 
        */
        $intOffset = ($this->_arrConfig['page']-1)*$this->_arrConfig['limit'];
        
        /*
        * Paginate and get number of found rows 
        */
        $intFoundRows = call_user_func_array($this->_onPaginate,array_merge(array($intOffset,$this->_arrConfig['limit']),$this->_arrArgs));
        
        /*
        * Assign template data 
        */
        $this->_arrTemplateData['limit'] = $this->_arrConfig['limit'];
        $this->_arrTemplateData['page'] = $this->_arrConfig['page'];
        $this->_arrTemplateData['offset'] = $intOffset;
        $this->_arrTemplateData['found_rows'] = $intFoundRows;
        $this->_arrTemplateData['total_pages'] = $intFoundRows < $this->_arrConfig['limit']?1:ceil($intFoundRows/$this->_arrConfig['limit']);
        $this->_arrTemplateData['visible_pages'] = $this->_arrConfig['visiblePages'];
        $this->_arrTemplateData['base_path'] = $this->_arrConfig['basePath'];
        $this->_arrTemplateData['label'] = $this->_arrConfig['label'];
        $this->_arrTemplateData['page_flag'] = $this->_arrConfig['pageFlag'];
        
        /*
        * Return the pagination template 
        */
        return $this->display();
    }
    
    public function display() {
        extract($this->_arrTemplateData);
        
        if($total_pages <= $visible_pages) {
            $page_start = 1;
            $page_end = $total_pages;
        } else if($page <= ceil($visible_pages/2)) {
            $page_start = 1;
            $page_end = $visible_pages;
        } else if($page > ($total_pages - ceil($visible_pages/2))) {
            $page_start = $total_pages - (ceil(($visible_pages/2)*2)-1);
            $page_end = $total_pages;
        } else {
            $page_start = $page-(floor($visible_pages/2));
            $page_end = $page+(floor($visible_pages/2));
        }
        
        $return = sprintf(
               '<div class="summary"><p class="pages">%u %s</p><p class="total">%u %s</p></div>'
            ,$total_pages
            ,$total_pages == 1?'Page':'Pages'
            ,$found_rows
            ,$found_rows == 1?$label:$label
        );
        
        $return.= sprintf('<ul class="pagination">');
        $return.= sprintf(
            '<li class="first">%s%s%s</li>'
            ,$page == 1?'':sprintf('<a href="%s">',str_replace($page_flag,1,$base_path))
            ,'First'
            ,$page == 1?'':'</a>'
        );    
        $return.= sprintf(
            '<li class="previous">%s%s%s</li>'
                ,$page == 1?'':sprintf('<a href="%s">',str_replace($page_flag,($page-1),$base_path))
            ,'Previous'
            ,$page == 1?'':'</a>'
        );
        foreach(range($page_start,$page_end,1) as $i) {
            $return.= sprintf(
                '<li%s>%s%s%s</li>'
                ,$page == $i?' class="current"':''
                ,$page == $i?'':sprintf('<a href="%s" class=current">',str_replace($page_flag,$i,$base_path))
                ,$i
                ,$page == $i?'':'</a>'
            );
        }
        $return.= sprintf(
            '<li class="next">%s%s%s</li>'
            ,$page == $total_pages?'':sprintf('<a href="%s">',str_replace($page_flag,($page+1),$base_path))
            ,'Next'
            ,$page == $total_pages?'':'</a>'
        );
        $return.= sprintf(
            '<li class="last">%s%s%s</li>'
            ,$page == $total_pages?'':sprintf('<a href="%s">',str_replace($page_flag,$total_pages,$base_path))
            ,'Last'
            ,$page == $total_pages?'':'</a>'
        );
        $return.= sprintf('</ul>');
        
        return $return;
        
    }

}

class Action {

    private $_objXML;
    private $_arrMessages = array();

    public function __construct() {
//You would replace simplexml_load_string with simplexml_load_file. I just used a string to keep everything in a single file so that you can copy and paste to see it work.        
        $this->_objXML = simplexml_load_file('res/xmlfiles/bangla-natok.xml');
        
    }

    public function paginate($offset,$limit) {
    
        $arrMessages = $this->_objXML->xpath('singlepost');
        
        if(isset($arrMessages[$offset])) {
            for($i=0;$i<$limit;$i++) {
            
                if(!isset($arrMessages[($i+$offset)])) break;
            
                $this->_arrMessages[] = array(
                    'mediaTitle'=>(string) $arrMessages[($i+$offset)]->mediaTitle,
                    'mediaUrl'=>(string) $arrMessages[($i+$offset)]->mediaUrl,
                    'thumbUrl'=>(string) $arrMessages[($i+$offset)]->thumbUrl,
                );
            }
        }
        
        // return number of total found rows
        return count($arrMessages);
    
    }
    
    public function getMessages() {
        return $this->_arrMessages;
    }

}

$action = new Action();

$func = create_function('$offset,$limit,$action','return $action->paginate($offset,$limit);');
$pg = new Pagination($func,array(
    'basePath'=>$_SERVER['PHP_SELF'].'?p={replace_me_with_page}'
    ,'pageFlag'=>'{replace_me_with_page}'
    ,'label'=>'Items'
    ,'limit'=>5
    ,'page'=>isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] != 0?$_GET['p']:1
    ,'visiblePages'=>5
),array($action));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Untitled</title>
    <style type="text/css">
    .pagination {
        width: 70%; margin: auto; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; 
    }
    .pagination li {float:left; margin-left:5px; display:block; text-decoration:none; padding:7px 10px 7px 10px;  border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px;color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); 
    }
    *+html .pagination li {
        display: inline;
    }
    * html .pagination li {
        display: inline;
    }
    </style>
</head>
<body>
    <?php echo $pg->paginate(); ?>
    
    <?php 
    if($action->getMessages()) {
        echo "<ul class='gallery'>";
        foreach($action->getMessages() as $arrMessage) {
			
			echo "<li><a href='player.php?$arrMessage[mediaUrl]' title='$arrMessage[mediaTitle]'><img src='$arrMessage[thumbUrl]'/></a></li>";
			
/*            printf(
                '<li>
                    <p>%s</p>
                    <p>%s</p>
					<p>%s</p>
                 </li>'
                 ,$arrMessage['mediaTitle']
                 ,$arrMessage['mediaUrl']
				 ,$arrMessage['thumbUrl']
            );*/
        } 
        echo "</ul>";
    } else {
        echo "<p>No messages available</p>";
    }?>
</body>
</html>