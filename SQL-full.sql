<!DOCTYPE html>
<html lang="cs" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>Export: cestovka - cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com:3306 - Adminer</title>
<link rel="stylesheet" type="text/css" href="?file=default.css&amp;version=4.8.1">
<script src='?file=functions.js&amp;version=4.8.1' nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE="></script>
<link rel="shortcut icon" type="image/x-icon" href="?file=favicon.ico&amp;version=4.8.1">
<link rel="apple-touch-icon" href="?file=favicon.ico&amp;version=4.8.1">

<body class="ltr nojs">
<script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'Jste offline.';
var thousandsSeparator = ' ';
</script>

<div id="help" class="jush-sql jsonly hidden"></div>
<script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});</script>

<div id="content">
<p id="breadcrumb"><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306">MySQL</a> &raquo; <a href='?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin' accesskey='1' title='Alt+Shift+1'>cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com:3306</a> &raquo; <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka">cestovka</a> &raquo; Export
<h2>Export: cestovka</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<div class='error'>Příliš velká POST data. Zmenšete data nebo zvyšte hodnotu konfigurační direktivy 'post_max_size'.</div>

<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Výstup<td><label><input type='radio' name='output' value='text' checked>otevřít</label><label><input type='radio' name='output' value='file'>uložit</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Formát<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Databáze<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1' checked>Procedury a funkce</label><label><input type='checkbox' name='events' value='1' checked>Události</label><tr><th>Tabulky<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggery</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="745479:956765">

<table cellspacing="0">
<script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">qsl('table').onclick = dumpClick;</script>
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' checked>Tabulky</label><script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">qs('#check-tables').onclick = partial(formCheck, /^tables\[/);</script><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' checked></label><script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">qs('#check-data').onclick = partial(formCheck, /^data\[/);</script></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='Adresa' checked>Adresa</label><td align='right'><label class='block'><span id='Rows-Adresa'></span><input type='checkbox' name='data[]' value='Adresa' checked></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='Objednavka' checked>Objednavka</label><td align='right'><label class='block'><span id='Rows-Objednavka'></span><input type='checkbox' name='data[]' value='Objednavka' checked></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='Strava' checked>Strava</label><td align='right'><label class='block'><span id='Rows-Strava'></span><input type='checkbox' name='data[]' value='Strava' checked></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='User' checked>User</label><td align='right'><label class='block'><span id='Rows-User'></span><input type='checkbox' name='data[]' value='User' checked></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='Zajezd' checked>Zajezd</label><td align='right'><label class='block'><span id='Rows-Zajezd'></span><input type='checkbox' name='data[]' value='Zajezd' checked></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='Zakaznik' checked>Zakaznik</label><td align='right'><label class='block'><span id='Rows-Zakaznik'></span><input type='checkbox' name='data[]' value='Zakaznik' checked></label>
<script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">ajaxSetHtml('?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&username=admin&db=cestovka&script=db');</script>
</table>
</form>
</div>

<form action='' method='post'>
<div id='lang'>Jazyk: <select name='lang'><option value="en">English<option value="ar">العربية<option value="bg">Български<option value="bn">বাংলা<option value="bs">Bosanski<option value="ca">Català<option value="cs" selected>Čeština<option value="da">Dansk<option value="de">Deutsch<option value="el">Ελληνικά<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fi">Suomi<option value="fr">Français<option value="gl">Galego<option value="he">עברית<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ka">ქართული<option value="ko">한국어<option value="lt">Lietuvių<option value="ms">Bahasa Melayu<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="sv">Svenska<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select><script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">qsl('select').onchange = function () { this.form.submit(); };</script> <input type='submit' value='Vybrat' class='hidden'>
<input type='hidden' name='token' value='554474:887984'>
</div>
</form>
<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Odhlásit" id="logout">
<input type="hidden" name="token" value="745479:956765">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target="_blank" rel="noreferrer noopener" id='h1'>Adminer</a> <span class="version">4.8.1</span>
<a href="https://www.adminer.org/#download" target="_blank" rel="noreferrer noopener" id="version"></a>
</h1>
<script src='?file=jush.js&amp;version=4.8.1' nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE="></script>
<script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">
var jushLinks = { sql: [ '?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&username=admin&db=cestovka&table=$&', /\b(Adresa|Objednavka|Strava|User|Zajezd|Zakaznik)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('8.0');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="server" value="cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com:3306"><input type="hidden" name="username" value="admin"><span title='databáze'>DB</span>: <select name='db'><option value=""><option selected>cestovka<option>helpmedie<option>helpmedie2<option>information_schema<option>mysql<option>performance_schema<option>sys</select><script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});</script>
<input type='submit' value='Vybrat' class='hidden'>
<input type='hidden' name='dump' value=''></p></form>
<p class='links'><a href='?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;sql='>SQL příkaz</a>
<a href='?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;import='>Import</a>
<a href='?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;dump=' id='dump' class='active '>Export</a>
<a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;create=">Vytvořit tabulku</a>
<ul id='tables'><script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});</script>
<li><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;select=Adresa" class='select' title='Vypsat data'>vypsat</a> <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;table=Adresa" class='structure' title='Zobrazit strukturu'>Adresa</a>
<li><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;select=Objednavka" class='select' title='Vypsat data'>vypsat</a> <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;table=Objednavka" class='structure' title='Zobrazit strukturu'>Objednavka</a>
<li><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;select=Strava" class='select' title='Vypsat data'>vypsat</a> <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;table=Strava" class='structure' title='Zobrazit strukturu'>Strava</a>
<li><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;select=User" class='select' title='Vypsat data'>vypsat</a> <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;table=User" class='structure' title='Zobrazit strukturu'>User</a>
<li><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;select=Zajezd" class='select' title='Vypsat data'>vypsat</a> <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;table=Zajezd" class='structure' title='Zobrazit strukturu'>Zajezd</a>
<li><a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;select=Zakaznik" class='select' title='Vypsat data'>vypsat</a> <a href="?server=cestovka.chgu4kiwyyfo.eu-north-1.rds.amazonaws.com%3A3306&amp;username=admin&amp;db=cestovka&amp;table=Zakaznik" class='structure' title='Zobrazit strukturu'>Zakaznik</a>
</ul>
</div>
<script nonce="ODllODU1YjIyODVmN2Q5MjY1MDdmNzM1NjM0ODY3ZmE=">setupSubmitHighlight(document);</script>
