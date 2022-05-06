<div class="container bg">
  <div class="row align-items-start border">
    <!-- inkludera sidopanel -->
    <?php include "visual/partials/leftpanel.php"; ?>

    <!-- Mittenpanel med huvudinnehåll -->
    <div class="col-8 border col-md-8">
   		<div class="m-1 p-4">
   			<?php
   				foreach ($messages as $message) {
            include "visual/partials/message.php";
          }
   			 ?>
   		</div>
    </div>

    <!-- inkludera högerpanel -->
    <?php include "visual/partials/rightpanel.php"; ?>
  </div>
</div>
<script type="text/javascript">

  const likebuttons = document.querySelectorAll(".like");
  likebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      postLike(e.target.value);
    })
  });

  const dislikebuttons = document.querySelectorAll(".dislike");
  dislikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      postLike(e.target.value,true);
    })
  });

function postLike(m_id, isDislike = false){

    const payload = {
        messageId: m_id,
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

    fetch('index.php?ajax=like_post', requestObj)
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