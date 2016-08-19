<?php

add_action('admin_menu', 'tna_research_guide_glossary_settings');
function tna_research_guide_glossary_settings()
{
    add_options_page('Research guide glossary', 'Research guide glossary', 'edit_pages', 'rg-glossary',
        'tna_research_guide_glossary_settings_page');
}

function tna_research_guide_glossary_settings_page()
{
    // admin
	require_once('research-guide-glossary-data.php');
    ?>
    <div class="wrap">
        <h2>Research guide glossary</h2>

		<?php
		foreach ($glossaryDefinitions as $term => $definition) {
			echo"<div style=\"margin-top:12px; padding:4px; border-top: 1px solid green;\"><h2>" . str_replace('-', ' ' , $term) . "</h2><textarea style=\"width:100%;\" readonly>[glossary term=\"$term\"]" . str_replace('-', ' ' , $term) . "[/glossary]</textarea><p>$definition</p></div>";
		}
		?>
    </div>
<?php

}


if (!function_exists('get_glossary')) :
    function get_glossary($atts, $content)
    {
        if (isset($atts['term']) and isset($content)) {
            // The inclusion of research-guide-glossary-data.php provides access to the array $glossaryDefinitions
            $termsLoaded = include('inc/research-guides/research-guide-glossary-data.php');
            if ($termsLoaded != false) {
                $term = $atts['term'];
                if (array_key_exists($term, $glossaryDefinitions)) {
                    $definition = $glossaryDefinitions[$term];
                    $spanFormat = '<span class="research-guide-glossary-term" title="%s">%s</span>';
                    $outputHtml = sprintf($spanFormat, $definition, $content);
                    return $outputHtml;
                } else {
                    return $content;
                }
            }
        }
        return false;
    }
endif;
add_shortcode('glossary', 'get_glossary');


?>
