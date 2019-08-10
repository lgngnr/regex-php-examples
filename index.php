<?php

    echo "<h1>OPEN SOURCE CODE</h1>";

    $url = "https://www.html.it/articoli/espressioni-regolari/";

    $html = file_get_contents($url);

    if ($html)
    {
        echo "Refer page: $url\n\n";

        /**
         * Get author link
         */
        $regex = '#<li class="author">.*?<a .+? href="(.+?)">.+?<\/a>#';
        echo "Get author link, REGEX: $regex\n";
        regExecute($regex, $html);

        /**
         * Get post author
         */
        $regex = '#<li class="author">.*?<a.*?>(.+?)<\/a>#';
        echo "Get post description, REGEX: $regex\n";
        regExecute($regex, $html);

        /**
         * Get post description
         */
        $regex = '#<div class="description">[\n\s]*<p>[\n\s]*<p>(.+?)<\/p>[\n\s]*<\/p>[\n\s]*<\/div>#';
        echo "Get post description, REGEX: $regex\n";
        regExecute($regex, $html);

        /**
         * Get page title
         */
        $regex = '#<title>(.*?)</title>#';
        echo "Get page title, REGEX: $regex\n";
        regExecute($regex, $html);

        /**
         * Get href from ancor "Learn"
         */
        $regex = '#<a href="(.+?)" class=".+?">Learn<\/a>#';
        echo "Get href from ancor Learn, REGEX: $regex\n";
        regExecute($regex, $html);

        /**
         * Get href from ancor ".NET"
         */
        $regex = '#<a href="(.+?)" class=".+?">.NET<\/a>#';
        echo "Get href from ancor .NET, REGEX: $regex\n";
        regExecute($regex, $html);
    }
    else
    {
        echo "Can't retrieve content";
    }

    function regExecute($regex, $content){
        if(preg_match($regex, $content, $res))
        {
            print_r($res);
            echo "\n\n";
        }
        else
        {
            echo "no match\n\n";
        }
    }