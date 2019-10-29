function pesquisaDados(nome){
    console.log(nome);
    fetch('pesquisar.php', {
        method: 'POST',
        body: new URLSearchParams('nome=' + nome)
    })
    .then(res => res.json())
    .then(res => visualizarResultado(res))
    .catch(e => console.log(e))
}

function visualizarResultado(dados){
    const listaNomes = document.getElementById("listaNomes");
    
    listaNomes.innerHTML = "";

    for (let i = 0; i < dados.length; i++){
        const li = document.createElement("li");
        li.innerHTML = dados[i]["nome"];
        listaNomes.appendChild(li);
    }
}