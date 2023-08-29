<?php

    // configure this one
    $denied = [
        // BASEURL."/your_url",
    ];


    // another denied (.htaccess)
    // - /
    // - /public/css
    // - /public/font
    // - /public/img
    // - /public/js
    // - /public/json

    // dont touch this one
    $url = Url::getCurrent();
    if (in_array($url, $denied)) die('denied');
?>