<?php
/*
=====================================================
имя мода
=====================================================
Данный код защищен авторскими правами
=====================================================
Файл:  mod.php
----------------------------------------------------------
Назначение:  мой мод
=====================================================
*/
if(!defined('MOZG'))
{
  die("Hacking attempt!");
}

                    if (!$module) {

                 $module .= <<<HTML
<br><script type="text/javascript" src="http://p0rtal.org/informer/23"></script><div id="carousel" style="position: absolute; top: 420px;"><script type="text/javascript" src="http://p0rtal.org/informer/24"></script></div><script type="text/javascript" src="http://p0rtal.org/informer/44"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/40"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/44"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/49"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/44"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/41"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/44"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/42"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/25"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/45"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/26"></script>
<script type="text/javascript" src="http://p0rtal.org/i/s1.js"></script>
<script type="text/javascript" src="http://p0rtal.org/informer/45"></script>
<script type="text/javascript" src="http://p0rtal.org/i/s2.js"></script>  
<div class="more_div"></div>
HTML;
}
$title = 'мой кинозал';
$tpl->load_template('kinozal.tpl');
$tpl->set('{description}',$title);
$tpl->set('{static}',$module);
$tpl->compile('content');
$tpl->clear();

?>
