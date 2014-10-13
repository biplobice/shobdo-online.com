    <?php
          function hello(){
              echo "Hello";
          }
    ?>

<?php
#######################################
// (1) Create XML OR
//Array to XML Conversion OR
//CDATA Element Eg
#######################################

// (i) SimpleXML :

 // Cant create CDATA element for title in SimpleXML.
function fnSimpleXMLCreate()
    {
        $arr = array(array('isbn'=>'1001', 'pubdate'=>'1943-01-01', 'title'=>'The Fountainhead',
                               'author'=>'Ayn Rand', 'price'=>'300'),
                         array('isbn'=>'1002', 'pubdate'=>'1954-01-01',
                               'title'=>'The Lord of the Rings', 'author'=>'J.R.R.Tolkein',
                               'price'=>'500'),
                         array('isbn'=>'1003', 'pubdate'=>'1982-01-01', 'title'=>'The Dark Tower',
                               'author'=>'Stephen King', 'price'=>'200'));
         
        $library = new SimpleXMLElement('<library />');
         
        for($i=0;$i<3;$i++)
        {
            $book = $library->addChild('book');
            $book->addAttribute('isbn', $arr[$i]['isbn']);
            $book->addAttribute('pubdate', $arr[$i]['pubdate']);
            $book->addChild('title', $arr[$i]['title']); //cant create CDATA in SimpleXML.
            $book->addChild('author', $arr[$i]['author']);
            $book->addChild('price', $arr[$i]['price']);
        }
        
        $library->asXML('library.xml');
    }

// (ii) DOM :
function fnDomCreate()
    {
       $arr = array(array('isbn'=>'1001', 'pubdate'=>'1943-01-01', 'title'=>'The Fountainhead',
                               'author'=>'Ayn Rand', 'price'=>'300'),
                         array('isbn'=>'1002', 'pubdate'=>'1954-01-01',
                               'title'=>'The Lord of the Rings', 'author'=>'J.R.R.Tolkein',
                               'price'=>'500'),
                         array('isbn'=>'1003', 'pubdate'=>'1982-01-01', 'title'=>'The Dark Tower',
                               'author'=>'Stephen King', 'price'=>'200'));
         
        $dom = new DOMDocument();
        $library = $dom->createElement('library');
        $dom->appendChild($library);
         
        for($i=0;$i<3;$i++)
        {
            $book = $dom->createElement('book');
            $book->setAttribute('isbn',$arr[$i]['isbn']);
             $book->setAttribute('pubdate',$arr[$i]['pubdate']);
             
            //$prop = $dom->createElement('title', $arr[$i]['title']);
            $prop = $dom->createElement('title');
            $text = $dom->createCDATASection($arr[$i]['title']);
            $prop->appendChild($text);
            $book->appendChild($prop);
             
            $prop = $dom->createElement('author', $arr[$i]['author']);
            $book->appendChild($prop);
            $prop = $dom->createElement('price', $arr[$i]['price']);
            $book->appendChild($prop);
            $library->appendChild($book);
        }
        //header("Content-type: text/xml");
        $dom->save('library.xml');
    }

#######################################
// (2) Edit XML – Edit/Modify Element Data (accessed serially)
#######################################

// (i) SimpleXML :

// Edit Last Book Title
function fnSimpleXMLEditElementSeq()
    {
        $library = new SimpleXMLElement('library.xml',null,true);
        $num = count($library);
        $library->book[$num-1]->title .= ' - The Gunslinger';
        header("Content-type: text/xml");
        echo $library->asXML();
    }

// (ii) DOM :
//Edit Last Book Title
    function fnDOMEditElementSeq()
    {
        $dom = new DOMDocument();
        $dom->load('library.xml');
        $library = $dom->documentElement;
        $cnt = $library->childNodes->length;
         
        $library->childNodes->item($cnt-1)->getElementsByTagName('title')->item(0)->nodeValue .= ' Series'; 
       // 2nd way #$library->getElementsByTagName('book')->item($cnt-1)->getElementsByTagName('title')->item(0)->nodeValue .= ' Series';
        
       //3rd Way
       //$library->childNodes->item($cnt-1)->childNodes->item(0)->nodeValue .= ' Series';
        header("Content-type: text/xml");
        echo $dom->saveXML();
    }

#######################################
// (3) Edit XML – Edit specific Elements (accessed conditionally)
#######################################

// (i) SimpleXML :
//Edit Title of book with author J.R.R.Tolkein
    function fnSimpleXMLEditElementCond()
    {
        $library = new SimpleXMLElement('library.xml',null,true);
        $book = $library->xpath('/library/book[author="J.R.R.Tolkein"]');
        $book[0]->title .= ' Series';
        header("Content-type: text/xml");
        echo $library->asXML();
    }

// (ii) DOM (with XPath):
//Edit Title of book with author J.R.R.Tolkein
   function fnDOMEditElementCond()
   {
       $dom = new DOMDocument();
       $dom->load('library.xml');
       $library = $dom->documentElement;
       $xpath = new DOMXPath($dom);
       $result = $xpath->query('/library/book[author="J.R.R.Tolkein"]/title');
       $result->item(0)->nodeValue .= ' Series';
       // This will remove the CDATA property of the element.
       //To retain it, delete this element (see delete eg) & recreate it with CDATA (see create xml eg).
        
       //2nd Way
       //$result = $xpath->query('/library/book[author="J.R.R.Tolkein"]');
      // $result->item(0)->getElementsByTagName('title')->item(0)->nodeValue .= ' Series';
       header("Content-type: text/xml");
       echo $dom->saveXML();
        
   }

#######################################
// (4) Edit XML – Element Addition (to queue end)
#######################################

// (i) SimpleXML :
//Add another Book to the end
    function fnSimpleXMLAddElement2End()
    {
        $library = new SimpleXMLElement('library.xml',null,true);
        $book = $library->addChild('book');
        $book->addAttribute('isbn', '1004');
        $book->addAttribute('pubdate', '1960-07-11');
        $book->addChild('title', "To Kill a Mockingbird");
        $book->addChild('author', "Harper Lee");
        $book->addChild('price', "100");
        header("Content-type: text/xml");
        echo $library->asXML();
    }

// (ii) DOM :
//Add another Book to the end
function fnDOMAddElement2End()
{
    $dom = new DOMDocument();
    $dom->load('library.xml');
    $library = $dom->documentElement;
     
    $book = $dom->createElement('book');
    $book->setAttribute('isbn','1000');
    $book->setAttribute('pubdate','1960-07-11');
     
    $prop = $dom->createElement('title');
    $text = $dom->createTextNode('To Kill a Mockingbird');
    $prop->appendChild($text);
    $book->appendChild($prop);
     
     $prop = $dom->createElement('author','Harper Lee');
    $book->appendChild($prop);
    $prop = $dom->createElement('price','100');
    $book->appendChild($prop);
     
    $library->appendChild($book);
    header("Content-type: text/xml");
    echo $dom->saveXML();
}

#######################################
//(5) Edit XML – Element Addition (to queue start)
#######################################

// (i) SimpleXML :
// Add a Book to List Start
// Insert Before Functionality not present in SimpleXML 
// We can integrate DOM with SimpleXML to do it.
    function fnSimpleXMLAddElement2Start()
    {
        $libSimple = new SimpleXMLElement('library.xml',null,true);
        $libDom = dom_import_simplexml($libSimple);
         
        $dom = new DOMDocument();
        //returns a copy of the node to import
        $libDom = $dom->importNode($libDom, true);
        //associate it with the current document.
        $dom->appendChild($libDom);
         
        fnDOMAddElement2Start($dom); //see below DOM function
    }

// (ii) DOM :
function fnDOMAddElement2Start($dom='')
    {
        if(!$dom)
        {
            $dom = new DOMDocument();
            $dom->load('library.xml');
        }
        $library = $dom->documentElement;
        #var_dump($library->childNodes->item(0)->parentNode->nodeName);
        $book = $dom->createElement('book');
        $book->setAttribute('isbn','1000');
        $book->setAttribute('pubdate','1960-07-11');
          
        $prop = $dom->createElement('title','To Kill a Mockingbird');
        $book->appendChild($prop);
         $prop = $dom->createElement('author','Harper Lee');
        $book->appendChild($prop);
         $prop = $dom->createElement('price','100');
        $book->appendChild($prop);
         
        $library->childNodes->item(0)->parentNode->insertBefore($book,$library->childNodes->item(0));
        header("Content-type: text/xml");
        echo $dom->saveXML();
    }

#######################################
// (6) Edit XML – Element Addition (before a specific node)
#######################################

// (i) SimpleXML :
// Add a Book Before attribute isbn 1002
    // Insert Before Functionality not present in SimpleXML 
    // We can integrate DOM with SimpleXML to do it.
    function fnSimpleXMLAddElementCond()
    {
        $libSimple = new SimpleXMLElement('library.xml',null,true);
        $libDom = dom_import_simplexml($libSimple);
         
        $dom = new DOMDocument();
        //returns a copy of the node to import
        $libDom = $dom->importNode($libDom, true);
        //associate it with the current document.
        $dom->appendChild($libDom);
         
        fnDOMAddElementCond($dom); //see below DOM eg.
    }

// (ii) DOM :
// Add a Book Before isbn 1002
    function fnDOMAddElementCond($dom='')
    {
        if(!$dom)
        {
            $dom = new DOMDocument();
            $dom->load('library.xml');
        }
        $library = $dom->documentElement;
         
        $book = $dom->createElement('book');
        $book->setAttribute('isbn','1000');
        $book->setAttribute('pubdate', '1960-07-11');
         
        $prop = $dom->createElement('title','To Kill a Mockingbird');
        $book->appendChild($prop);
         $prop = $dom->createElement('author','Harper Lee');
        $book->appendChild($prop);
        $prop = $dom->createElement('price','100');
        $book->appendChild($prop);
         
        $xpath = new DOMXPath($dom);
        $result = $xpath->query('/library/book[@isbn="1002"]');
        $library->childNodes->item(0)->parentNode->insertBefore($book,$result->item(0));
        header("Content-type: text/xml");
        echo $dom->saveXML();
    }

#######################################
// (7) Delete Elements (accessed serially)
#######################################

// (i) SimpleXML :
// Delete 2nd book
    function fnSimpleXMLDeleteSeq()
    {
        $library = new SimpleXMLElement('library.xml',null,true);
        //$library->book[1] = null; // this only empties content
        unset($library->book[1]);
        header("Content-type: text/xml");
        echo $library->asXML();
         
    }

// (ii) DOM :
// Delete 2nd Book
    function fnDOMDeleteSeq()
    {
        $dom = new DOMDocument();
        $dom->load('library.xml');
        $library = $dom->documentElement;
         
        $library->childNodes->item(0)->parentNode->removeChild($library->childNodes->item(1));
         
        header("Content-type: text/xml");
        echo $dom->saveXML();
    }

#######################################
// (8) Delete Elements (accessed conditionally)
#######################################

// (i) SimpleXML :
// Delete a book with  200<price<500
    // Not possible to delete node found via XPath in SimpleXML. See below.
    function fnSimpleXMLDeleteCond()
    {
        $library = new SimpleXMLElement('library.xml',null,true);
        $book = $library->xpath('/library/book[price>"200" and price<"500"]');
         
        //Problem here....not able to delete parent node using unset($book[0]);
        // unset of parent node only works when accessing serially. eg : unset($library->book[0]);
         
        //header("Content-type: text/xml");
        //echo $library->asXML();
         
    }

// (ii) DOM :
// Delete the book with  200<price<500 
    function fnDOMDeleteCond()
    {
        $dom = new DOMDocument();
        $dom->load('library.xml');
        $library = $dom->documentElement;
        $xpath = new DOMXPath($dom);
        $result = $xpath->query('/library/book[price>"200" and price<"500"]');
        $result->item(0)->parentNode->removeChild($result->item(0));
        header("Content-type: text/xml");
        echo $dom->saveXML();
    }

#######################################
// (9) Rearrange / Reorder Elements
#######################################

// (i) SimpleXML :
// Exchange Position of 2nd book with 3rd : fnSimpleXMLRearrange(2,3);
// Due to absence of an inbuilt function (DOM has it), we have to make our own function in SimpleXML.
//Better to use DOM.
function fnSimpleXMLRearrange($num1,$num2)
{
     $libSimple= new SimpleXMLElement('library.xml',null,true);
     //$library->book[3] = $library->book[0]; // this doesnt work
  
    $libDom = dom_import_simplexml($libSimple);
 
    $dom = new DOMDocument();
    //returns a copy of the node to import
    $libDom = $dom->importNode($libDom, true);
    //associate it with the current document.
    $dom->appendChild($libDom);
 
    fnDOMRearrange($num1,$num2,$dom); // see below DOM function
}

// (ii) DOM :
// Exchange Position of 2nd book with 3rd : fnDOMRearrange(2,3);
function fnDOMRearrange($num1,$num2,$dom=0)
{
    if(!$dom)
    {
        $dom = new DOMDocument();
        $dom->load('library.xml');
    }
    $dom = new DOMDocument();
    $dom->load('library.xml');
    $library = $dom->documentElement;
    $cnt = $library->childNodes->length;
    //echo '<br> count : ' . $cnt;
 
    if ($num1 > $num2) { // ensure $num1 always is less than $num2
        $num3 = $num1;
        $num1 = $num2;
        $num2 = $num3;                      
    }
      
    $index1 = fnDOMConvIndex($num1,  $cnt);
    $index2 = fnDOMConvIndex($num2,  $cnt);
    /*for ($iter = 0; $iter <= $cnt; $iter++) {
        echo '<hr>' . $iter . '<br>' .  $library->childNodes->item($iter)->nodeValue;
    }*/
             
    $library->childNodes->item(0)->parentNode->insertBefore($library->childNodes->item($index1), $library->childNodes->item($index2)); // put x before y
    $library->childNodes->item(0)->parentNode->insertBefore($library->childNodes->item($index2), $library->childNodes->item($index1)); // put y before x 
 
    header("Content-type: text/xml");
    echo $dom->saveXML();
}
function fnDOMConvIndex($num,  $cnt)
{
    // echo '<br>' . $num;
    if ($num != 1) {
        $maxIndex = floor($cnt/2);
        //echo '<br>max: ' . $maxIndex;
        if ($maxIndex == $num) {
            $num = $cnt-2;
        } else {
            $num = ($num%2)?($num+2):($num+1); //Always odd index due to nature of DOM Element Index.
        }
    }         
     
    // echo '<br>' . $num;
    return $num;
}

#######################################
// (10) Display Required data in XML Form itself OR
//Remove all children nodes save one OR
//Copy/Clone Node Eg OR
//Compare/Search non numeric data (like date or time) to get result.
#######################################

// (i) SimpleXML :

// Display Books published after 1980 in XML Form itself.
// No function to copy node directly in SimpleXML.
// Its simpler for this functionality to be implemented in DOM.
    function fnSimpleXMLDisplayElementCond()
    {
        $library = new SimpleXMLElement('library.xml',null,true);
        $book = $library->xpath('/library/book[translate(@pubdate,"-","")>translate("1980-01-01","-","")]');
        // Manually create a new structure then add searched data to it (see create xml eg.)
    }

// (ii) DOM :


// Display Books published after 1980 in XML Form itself.
    function fnDOMDisplayElementCond()
    {
        $dom = new DOMDocument();
        $dom->load('library.xml');
        $library = $dom->documentElement;
        $xpath = new DOMXPath($dom);
         
        // Comparing non numeric standard data
        $result = $xpath->query('/library/book[translate(@pubdate,"-","")>translate("1980-01-01","-","")]');
        // For simpler search paramater use this :
        //$result = $xpath->query('/library/book[author="J.R.R.Tolkein"]');
         
        // Copy only node & its attributes not its contents.
        $library = $library->cloneNode(false);
        // Add the 1 element which is search result.
        $library->appendChild($result->item(0));
         
        header("Content-type: text/xml");
        echo $dom->saveXML($library);
    }
	

?>