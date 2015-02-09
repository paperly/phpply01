<?php
// DB connect
$verbindung = mysql_connect("mail.paperly.de", "d01d30b0", "fL5LpWkXSH7PGEME") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db("d01d30b0")
or die ("Die Datenbank existiert nicht.");



?>