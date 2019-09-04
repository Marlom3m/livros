function deletar(id){
    window.alert(id);
	$("#confirm").attr("href","delete.php?id="+id);
}


function getLivros(area){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livro").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getLivros.php?area=" + area, true);
    xmlhttp.send();

}
	



	
