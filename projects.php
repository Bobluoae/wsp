<?php
include("incl/config.php");
$title = "WESWEB01: Projekt";
$pageId = "projects";
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
    
        <!-- Menyn med project  -->
        <h3>Mina projekt</h3>
        <nav>
        <ul id="exer">
         <li id="exempel1"><a href="projects/exempel1.php" target="_blank">Exempel1</a></li>
         <li id="exempel2"><a href="projects/exempel2.php" target="_blank">Exempel2</a></li>
         <li id="dice"><a href="exercises/dice_project/visual_dice.php" target="_blank">Tärningar</a></li>
        </ul>
        </nav>
 </aside>

 <article class="justify border">

  <!-- Sidans/Dokumentets huvudsakliga innehåll -->
        <h1>Projekt i kursen</h1>
        
        <p>Här är en samlingssida för mina projekt.</p>
        
        <p>Skapa en ny sida varje gång du gör ett nytt projekt. Då har du alltid
        ett kodexempel att gå tillbaka till. Du slipper komma ihåg de exakta konstruktionerna. Du har löst
        problemet en gång och du vet var du har lösningen. Perfekt.</p>
        
        <p>Källkoden till mina project och övriga delar till sidan, 
        <a href="viewsource.php?dir=projects">hittar du i denna katalogen</a>.</p>
  
 </article>
</div>

<?php include("incl/footer.php"); ?>