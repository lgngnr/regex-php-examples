<?php

    echo "<h1>REGEX</h1>";

    $url = "https://www.html.it/articoli/espressioni-regolari/";

    $html = file_get_contents($url);

    if ($html)
    {
        $regex = '#<title>(.*?)</title>#';
        regExecute($regex, $html);
        
    }
    else
    {
        echo "<h3>Can't retrieve content</h3>";
    }

    function regExecute($regex, $content){
        if(preg_match($regex, $content, $res))
        {
            print_r($res);
        }
        else
        {
            echo "no match for |$regex|";
        }
    }