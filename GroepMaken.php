<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Familie Uit ID - Groep Maken</title>

	<link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/master.css" media="all">	
    <link rel="stylesheet" href="css/kube.min.css" media="all">
    <link rel="stylesheet" href="css/kube.css" media="all">
	<link rel="stylesheet" href="css/search.css" type="text/css" />
    <link rel="stylesheet" href="css/scihjkhgrm.css" media="all">
    
    <script type="text/javascript" src="liveSearch/custom.js"></script>

    
</head>

<body>

	<?php include_once("include_header.php") ?>
    
      <div id="formulier">
       <form method="post" action="addGroup/data.php" class="forms">
            <ul>
                <li>
                    <label class="bold">1. Geef een naam</label>
                    <input name="groepnaam" type="text" required/>
                </li>
                <br>
                <li>
                    <label class="bold">2. Geef een korte beschrijving</label>
                    <textarea name="info" rows="4" class="width-100" style="height: 100px;">
                    </textarea>
                </li>
                <br>
                <li>
                <label class="bold">3. Nodig mensen uit</label>
                    <span class="btn-group">
                        <input type="text" name="foo" class="input-search" id="search" autocomplete="off"/>
                        <h4 id="results-text">Geef resultaten voor: <b id="search-string">Array</b></h4>
                        <ul id="results"></ul>
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