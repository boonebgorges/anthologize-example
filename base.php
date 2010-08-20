<?php

// Load the tei-dom class
require_once( ANTHOLOGIZE_TEIDOM_PATH );

// Get the TEI Dom
$teidom = new TeiDom( $_SESSION );

// Do some fancy stuff to $teidom. These are the magical moments.

// Filename and extension
$fileName = TeiDom::getFileName( $_SESSION );
$ext = "xml";

// Send the proper headers
header("Content-type: application/xml");
header("Content-Disposition: attachment; filename=$fileName.$ext");

// Echo your content
echo $teidom->getTeiString();





?>