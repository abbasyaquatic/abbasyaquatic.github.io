<?php

require 'vendor/autoload.php';

$quran = new \Quran\Quran([
    'cache'        => __DIR__ . '/cache',
    'language'     => 'en',
    'recitation'   => 1,
    'translations' => [21, 54, 40],
    'tafsirs'      => [16, 17],
    'text_type'    => 'image',
]);

$verses = $quran->chapter(1)->verse(['page' => 1], [
    'image'        => 'url',
    'audio'        => 'url',
    'translations' => 'text',
]);

foreach ($verses as $verse) {
    echo <<<EOT
<center>
<img src="{$verse['image_url']}">
<h3>{$verse['translations_text']}</h3>
<audio controls><source src="{$verse['audio_url']}" type="audio/mpeg"></audio>
</center><hr>
EOT;
}