<script type="text/javascript">

// Loopa igenom alla knappar från htmlen som har klasser och hämta datat som knapparna har om man klickar för att kunna skicka med AJAX till PHP , se Index $_GET["Ajax"];

  const r_likebuttons = document.querySelectorAll(".r_like");
  r_likebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyLike(e.target.value);
    })
  });

  const r_dislikebuttons = document.querySelectorAll(".r_dislike");
  r_dislikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyLike(e.target.value,true); //om det är en dislike skicka med en extra parameter som talar om till php att det är en dislike
    })
  });

  const likebuttons = document.querySelectorAll(".like");
  likebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      postLike(e.target.value);
    })
  });

  const dislikebuttons = document.querySelectorAll(".dislike");
  dislikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      postLike(e.target.value,true); //om det är en dislike skicka med en extra parameter som talar om till php att det är en dislike
    })
  });

  const unlikebuttons = document.querySelectorAll(".unlike");
  unlikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      postDeleteLike(e.target.value);
    })
  });

  const r_unlikebuttons = document.querySelectorAll(".r_unlike");
  r_unlikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyDeleteLike(e.target.value);
    })
  });

//Skicka till PHP att du vill ta bort en like på ett meddelande
function postDeleteLike(m_id){

    const payload = {
        unlikeId: m_id,
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

    fetch('index.php?ajax=unlike_post', requestObj)
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

//Skicka till PHP att du vill ta bort en like på ett reply
function replyDeleteLike(r_id){

    const payload = {
        r_unlikeId: r_id,
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

    fetch('index.php?ajax=unlike_reply', requestObj)
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

//Skicka till PHP att du vill likea ett meddelande
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

//Skicka till PHP att du vill likea ett svar/reply
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