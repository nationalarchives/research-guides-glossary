<?php
require_once('research-guide-glossary-data.php');

echo "<html><head><title>Glossary</title></head><body style=\"font-family: Arial\"><h1>Research guides glossary</h1>";
foreach ($glossaryDefinitions as $term => $definition) {
	echo"<div style=\"margin-top:12px; padding:4px; border-top: 1px solid green;\"><h2>" . str_replace('-', ' ' , $term) . "</h2><textarea style=\"width:100%;\" readonly>[glossary term=\"$term\"]" . str_replace('-', ' ' , $term) . "[/glossary]</textarea><p>$definition</p></div>";
}
echo "</body></html>";
?>
