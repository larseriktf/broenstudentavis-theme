let btnLeserinnlegg = document.getElementById("legg-til-leserinnlegg");

if (btnLeserinnlegg) { // hvis knappen finnes

    btnLeserinnlegg.addEventListener("click", () => {

        console.log("so far so good");

        let ourData = {
            "title": document.querySelector('.leserinnlegg-form [name="title"]').value,
            "content": document.querySelector('.leserinnlegg-form [name="content"]').value,
            "status": "publish"
        }

        let createPost = new XMLHttpRequest();
        createPost.open("POST", "https://broenstudentavis.local/wp-json/wp/v2/leserinnlegg");
        createPost.setRequestHeader("X-WP-Nonce", theSecretNumber.nonce);
        createPost.setRequestHeader("Content-type", "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(ourData));

        console.log("data has been sent!");

    });

}