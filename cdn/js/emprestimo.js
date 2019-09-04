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

function devolver(id){
	$("#confirm").attr("href","alterar.php?id="+id);
}

$(function () {
	$("#estudante").autocomplete({
		source: function(request,response){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					response(JSON.parse(this.responseText));
				}
			};
			xmlhttp.open("GET", "getEstudantes.php?nome=" + request.term, true);
			xmlhttp.send();
		},
		
		minLength:1,
		select: function(event, ui){
			
		}
	});
});