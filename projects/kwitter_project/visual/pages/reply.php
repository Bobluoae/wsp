<?php //Användaren kan bara se replies om de är inloggade
if (isset($_SESSION["isLoggedIn"])): ?>
<div class="container bg">
  <div class="row align-items-start border">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border col-md-8">
   		<div class="m-1 p-4">
   			<?php
            	include "visual/partials/message.php";
   			 ?>
   			 <!-- Rutan på ett inlägg -->
			<div class="border m-1 p-2">

			<!-- formulär för reply -->
			<form method="post" action="" class="">
				<input type="hidden" name="reply_skickat"> <!-- Skickar en parameter till php -->
				<textarea class="form-control" rows="5" name="textarea"></textarea>

				<!-- Submit knapp separat från textboxen -->
				<div class="border m-1">
					<input type="submit" name="submit" value="Reply to this Kwitt!">
				</div>
			</form>	
			</div>

			<?php //Loopa igenom alla svar på ett specifikt inlägg
				foreach ($replies as $reply) {
					include "visual/partials/replies.php";
				}
				 
			?>

		</div>
	</div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<script type="text/javascript">

// Loopa igenom alla knappar från htmlen som skrivs ut med loopen åvan och få deras värde
  const likebuttons = document.querySelectorAll(".like");
  likebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyLike(e.target.value);
    })
  });

  const dislikebuttons = document.querySelectorAll(".dislike");
  dislikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyLike(e.target.value,true);
    })
  });

//Skicka AJAX request med den tryckta knappens värde till PHP, se Index $_GET["Ajax"]
function replyLike(r_id, isDislike = false){

    const payload = {
        replyId: r_id,
        isDislike: isDislike
    };

    requestObj = {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/json'
        },
        redirect: 'follow', 
        referrerPolicy: 'no-referrer',
        body: JSON.stringify(payload)
    }

    fetch('index.php?ajax=like_reply', requestObj)
        .then(response => {
            if(response.ok) return response.json();
            throw new Error('something went wrong');
        }).then(data => {
            console.log(data);
        }).catch((error) => {
            console.error('Error:', error);
            alert("Error, cannot add like/dislike to db.");
        });
}

</script>
<?php endif ?>