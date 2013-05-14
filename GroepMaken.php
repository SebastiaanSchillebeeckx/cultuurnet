<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Groep Maken</title>

    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
    <link rel="stylesheet" href="css/kuk.css" media="all">
    
</head>

<body>

	<?php include_once("include_header.php") ?>
    
    <button class="btn-big">Afmelden</button>

      <div id="formulier">
       <form method="post" action="addGroup/data.php" class="forms">
            <ul>
                <li>
                    <label class="bold">1. Geef een naam</label>
                    <input name="groepnaam" type="text" required/>
                </li>
                <li>
                    <label class="bold">2. Geef een korte beschrijving</label>
                    <textarea name="info" rows="4" class="width-100" style="height: 100px;">
                    </textarea>
                </li>
                <li>
                <label class="bold">3. Nodig mensen uit</label>
                <span class="btn-group">
                	<input type="text" name="foo" class="input-search" />
                	<button class="btn btn-round">Zoek mensen</button>
            	</span>
                <br>
                <br>
                <br>
                <br>
                </li>
                <li>
                	<label class="bold">4. Je bent klaar!</label>
                    <input type="submit" class="btn" value="Aanmaken" />
                </li>
            </ul>
        </form>
		</div>
    <?php include_once ("include_footer.php") ?>
    
</body>
</html>