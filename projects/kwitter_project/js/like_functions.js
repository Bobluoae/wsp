<script type="text/javascript">

  const r_likebuttons = document.querySelectorAll(".r_like");
  r_likebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyLike(e.target.value);
    })
  });

  const r_dislikebuttons = document.querySelectorAll(".r_dislike");
  r_dislikebuttons.forEach((b)=>{
    b.addEventListener("click", (e)=>{
      replyLike(e.target.value,true);
    })
  });

// Loopa igenom alla knappar från htmlen som skrivs ut med loopen åvan och få deras värde
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

// Loopa igenom alla knappar från htmlen som skrivs ut med loopen åvan och få deras värde
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
//Skicka AJAX request med den tryckta knappens värde till PHP, se Index $_GET["Ajax"]
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