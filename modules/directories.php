<?php

function listFolderFiles($dir){
    $folders = scandir($dir);

    unset($folders[array_search('.', $folders, true)]);
    unset($folders[array_search('..', $folders, true)]);
    unset($folders[array_search('.DS_Store', $folders, true)]);

    // prevent empty ordered elements
    if (count($folders) < 1)
        return;

    echo '<ul>';
    foreach($folders as $element){
        if (is_dir($dir.'/'.$element)) {
            echo '<li>'.'<span class="material-icons" style="font-size: 16px">folder</span>'.' '.$element;
            if(is_dir($dir.'/'.$element)) listFolderFiles($dir.'/'.$element);
            echo '</li>';
        }
    }
    echo '</ul>';
}

?>