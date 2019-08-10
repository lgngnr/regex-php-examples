<?php

    echo "<h1>REGEX</h1>";

    $url = "https://www.html.it/articoli/espressioni-regolari/";

    $html = file_get_contents($url);

    if ($html)
    {
        echo "<p>Refer page: $url</p>";

        /**
         * Get page title
         */
        $regex = '#<title>(.*?)</title>#';
        echo "<p>Get page title<br>";
        regExecute($regex, $html);
        echo "</p>";

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