<nav>
<ul>
<?php
require "functions.php";

function print_menu_item($name, $url) {
	$class = urlIs($url) ? " class=\"active\"" : "";
	$name = htmlspecialchars($name);
	echo "<li$class><a href=\"$url\">$name</a></li>\n";
}

print_menu_item("Lijst", "/");
print_menu_item("Toevoegen", "/create");
?>
</ul>
</nav>
