fetch("https://jsonplaceholder.typicode.com/posts", {
    method: "POST",

    headers: {
        "Content-Type": "application/json"
    },

    body: JSON.stringify({
        title: "Aritz",
        body: "Ejercicio 4, enviar datos con post",
        userId: 1
    })
})
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error("Error:", error);
    });
