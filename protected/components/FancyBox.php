<?php

class FancyBox
{
    public static function activate()
    {
        echo '<script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
            <script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.js"></script>
            <script>
                $(document).ready(function(){
                    $("a.single_image").fancybox();
                });
            </script>
            <link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />';
    }
}

