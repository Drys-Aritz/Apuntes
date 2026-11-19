fetch("https://jsonplaceholder.typicode.com/invalid-endpoint",)
    .then(response => {
        if (!response.ok) throw new Error('HTTP ${reponse.status}');
        return response.json()
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error("Error:", error.menssaje);
    });


