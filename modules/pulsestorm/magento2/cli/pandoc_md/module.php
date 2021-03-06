<?php
namespace Pulsestorm\Magento2\Cli\Pandoc_Md;
use function Pulsestorm\Pestle\Importer\pestle_import;
pestle_import('Pulsestorm\Pestle\Library\output');

/**
* One Line Description
*
* @command pandoc_md
* @argument file Markdown file to convert?
*/
function pestle_cli($argv)
{
    $file = $argv['file'];
    $basename = pathinfo($file)['filename'];
    $exportTo = ['pdf','epub','epub3','html','tex'];
    foreach($exportTo as $ext)
    {
        $cmd = "pandoc $file -s -o output/$basename.$ext";
        $results = `$cmd`;
        output($results);
    }
}
