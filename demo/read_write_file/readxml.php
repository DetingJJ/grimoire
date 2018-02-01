<?php
// 统计tag的question数目
$doc = new DOMDocument();

$doc->load('./data/x-new-1.xml');

$items = $doc->getElementsByTagName("item");

foreach($items as $item)
{
    $key = $item->getElementsByTagName( "key" );
    $node = $key->item(0); 
    if(!empty($node))
    {
        $keyValue = $node->nodeValue; 
        //echo "$keyValue\n";
    }
    $displays = $item->getElementsByTagName( "display" );
    foreach($displays as $display)
    {
        $comments = $display->getElementsByTagName( "comment" );
        foreach($comments as $comment)
        {
            $tagTitles = $comment->getElementsByTagName( "title" );
            $tagNode = $tagTitles->item(0); 
            $tagTitle = '';
            if(!empty($tagNode))
            {
                $tagTitle = $tagNode->nodeValue; 
                //echo "{$tagTitle}\n";
            }

            $tabs = $comment->getElementsByTagName( "tab" );
            foreach($tabs as $tab)
            { 
                $tagItems = $tab->getElementsByTagName( "item" );
                $tagItemsCT = 0;
                foreach($tagItems as $tagItem)
                {
                    $tagItemsCT++;
                }
                echo "{$tagTitle}----ct:{$tagItemsCT}\n";
            } 
        }
        //echo "$keyValue\n";
    }
}




