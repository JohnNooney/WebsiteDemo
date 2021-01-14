<?php 

header("content-type: text/xml");

//***************************** */
//create XSD schema
//**************************** */

// $xmlSchema = new SimpleXMLElement('<xmlns:xsd:schema></xmlns:xsd:schema>', LIBXML_NOERROR, false, 'xsd', true);
// $xmlSchema->addAttribute('xmlns:xmlns:xsd', 'http://www.w3.org/2001/XMLSchema');
// //add annotations

// //define the complex types
// $rssComplexType = $xmlSchema->addChild('xs:complexType');
// $rssComplexType->addAttribute('name', 'rss');
// $rssSequence = $rssComplexType->addChild('xs:sequence');
// $rssElement = $rssSequence->addChild('xs:element');
// $rssElement->addAttribute('ref', 'channel');

// $channelComplexType = $xmlSchema->addChild('xs:complexType');
// $channelComplexType->addAttribute('name', 'channel');
// $channelSequence = $channelComplexType->addChild('xs:sequence');
// $channelElement = $channelSequence->addChild('xs:element');
// $channelElement->addAttribute('ref', 'title');
// $channelElement2 = $channelSequence->addChild('xs:element');
// $channelElement2->addAttribute('ref', 'atom:link');


// $itemComplexType = $xmlSchema->addChild('xs:complexType');
// $itemComplexType->addAttribute('name', 'item');
// $itemSequence = $itemComplexType->addChild('xs:sequence');
// $itemElementTitle = $itemSequence->addChild('xs:element');
// $itemElementTitle->addAttribute('ref', 'title');
// $itemElementDesc = $itemSequence->addChild('xs:element');
// $itemElementDesc->addAttribute('ref', 'description');
// $itemElementimgName = $itemSequence->addChild('xs:element');
// $itemElementimgName->addAttribute('ref', 'image');
// $itemAttribute = $itemComplexType->addChild('xs:element');
// $itemAttribute->addAttribute('name', 'id');
// $itemAttribute->addAttribute('type', 'xs:string');
// $itemAttribute->addAttribute('use', 'required');

// //define the simple types
// //$sequence = $newelement->addChild('xs:sequence');

// //define the elements
// $newelement = $xmlSchema->addChild('xsd:xsd:element');
// $newelement->addAttribute('name', 'genres');



///************************************************** */
/// Create an XML file to reference the XSD created above
///************************************************** */

//access the block 1 api to dynamically load the data into rss feed.
include("../../block1/model/api.php") ;
$cardsinfo = getCards() ;
// echo $employeetxt ;
$cards = json_decode($cardsinfo) ;

 //load file to be updated with info
//$xml = simplexml_load_file('../controller/items_rss.xml')  ;
//var_dump($xml);
//echo "<br/><br/>";

//$xml = new SimpleXMLElement('xml version="1.0" encoding="UTF-8"');
$rss = new SimpleXMLElement('<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:georss="http://www.georss.org/georss" version="2.0"></rss>');


$channel = $rss->addChild('channel'); //add channel node
// $channel->addAttribute('xlmns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
// $channel->addAttribute('xsi:schemaLocation', 'https://archive.codeplex.com/?p=rss2schema');

//setup atom node
$atom = $channel->addChild('atom:atom:link'); //add atom node
$atom->addAttribute('href','https://mayar.abertay.ac.uk/~1803534/cmp306/block4/view/rss.php');
$atom->addAttribute('rel','self');
$atom->addAttribute('type','application/rss+xml');

//****************** */
//Channel properties
//****************** */
$title = $channel->addChild('title','Top 6 Genres'); //title of the feed
$description = $channel->addChild('description','This is the top 6 genres grabbed from the SQL database'); //feed description
$link = $channel->addChild('link','https://mayar.abertay.ac.uk/~1803534/cmp306/block4/view/rss.php'); //feed site
$language = $channel->addChild('language','en-gb'); //language

//create xml nodes for each genre
for ($i=1; $i < 7; $i++) { 
    $item = $channel->addChild('item');
    $item->addChild('guid', 'https://mayar.abertay.ac.uk/~1803534/cmp306/block4/view/rss.php?id='.$cards[$i]-> gId);
    $item->addChild('title', $cards[$i]-> genreTitle);
    $item->addChild('description', $cards[$i]-> artDescPreview);
    //$item->addChild('image', $cards[$i]-> imgName);
}


//$newxml = $genres->asXML();
echo $rss->asXML();


?>