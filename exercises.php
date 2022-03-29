<?php
include("incl/config.php");
$title = "WESWEB01: Övningar";
$pageId = "exercises";
$pageStyle = '
ul#exer {
 list-style-type:none;
}
ul#exer a {
 margin:-40px;
}
';

include("incl/header.php"); 
?>

<!-- sidans huvudinnehåll  -->
<div id="content">
 <aside><p></p><p></p>
    
        <!-- Menyn med övningar  -->
        <h3>Mina övningar</h3>
        <nav>
        <ul id="exer">
         <li id="grunder"><a href="exercises/grunder.php" target="_blank">Grunder</a></li>
         <li id="exempel2"><a href="exercises/exempel2.php" target="_blank">Exempel2</a></li>
         <li id="exempel1"><a href="exercises/exempel1.php" target="_blank">Exempel1</a></li>
         <li id="funktioner"><a href="exercises/funktioner.php" target="_blank">Funktioner</a></li>
         <li id="include"><a href="exercises/include.php" target="_blank">Include</a></li>
         <li id="forms"><a href="exercises/forms.php" target="_blank">Forms</a></li>
         <li id="textstr"><a href="exercises/textstr.php" target="_blank">TextSträngar</a></li>
         <li id="cookies"><a href="exercises/cookies.php" target="_blank">Cookies</a></li>
         <li id="classes"><a href="exercises/classes/classes1.php" target="_blank">Klasser</a></li>
         <li id="repetition"><a href="exercises/repetition.php" target="_blank">Repetition</a></li>
        </ul>
        </nav>
 </aside>

 <article class="justify border">

  <!-- Sidans/Dokumentets huvudsakliga innehåll -->
        <h1>Övningar i kursen</h1>
        
        <p>Här är en samlingssida för mina övningar i de olika kursmomenten.</p>
        
        <p>Skapa en ny sida varje gång du implementerar en ny övning. Då har du alltid
        ett kodexempel att gå tillbaka till. Du slipper komma ihåg de exakta konstruktionerna. Du har löst
        problemet en gång och du vet var du har lösningen. Perfekt.</p>
        
        <p>Källkoden till mina övningar och övriga delar till sidan, 
        <a href="viewsource.php?dir=exercises">hittar du i denna katalogen</a>.</p>
  
 </article>
</div>

<?php include("incl/footer.php"); ?>