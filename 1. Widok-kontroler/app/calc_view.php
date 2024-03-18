<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Kwota kredytu(zł): </label> 
        <input id="id_kwota" type="text" name="Kwota" value="<?php if(isset($kwota)) print($kwota); ?>" /><br />
	<label for="id_oprocentowanie">Oprocentowanie(%): </label>
	<input id="id_oprocentowanie" type="text" name="Oprocentowanie" value="<?php if(isset($oprocentowanie)) print($oprocentowanie); ?>" /><br />
        <label for="id_raty">Ilość rat(msc): </label>
	<input id="id_raty" type="text" name="Raty" value="<?php if(isset($raty)) print($raty); ?>" /><br />
            
	<input type="submit" value="Oblicz" />
        
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result; echo 'zł'?>
</div>
<?php } ?>

</body>
</html>