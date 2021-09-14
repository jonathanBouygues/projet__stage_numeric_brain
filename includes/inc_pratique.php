<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Weather API  █▄██▄█ 

echo '<section id="s1">';

echo '<div class="containerAutres"><div class="weather">';
include('includes/inc_weather.php');
echo '</div><div class="fete">';
include('includes/inc_fete.php');
echo '</div><div class="sncf">';
include('inc_sncf.php');
echo '</div><div class="citation">
<blockquote id="QuoteOFDay"></blockquote>
<script> var type="day";</script>
<script src="https://citations.ouest-france.fr/js/web/export.js?v3"></script>
</div></div>';

echo '<div class="containerTwitter"><a class="twitter-timeline" data-height="400" href="https://twitter.com/EcoleBrassart?ref_src=twsrc%5Etfw" data-tweet-limit="1" data-chrome="nofooter noborders noheader"></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>';

echo '<div class="containerTisseo">';
include('inc_tisseo.php');

echo '</div></section>';