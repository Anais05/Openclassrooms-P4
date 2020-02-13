
//requette ajouter commentaire 

var submit = document.getElementById("submit");

	submit.addEventListener("click", function(e)
	{
		e.preventDefault();
		var url_string = window.location.href;
		var url = new URL(url_string);
		var chptr = url.searchParams.get("chap");
		console.log(chptr);

	    var membre = document.getElementById("membre-id").value;
	    var comm = document.getElementById("comment").value;
	    console.log(membre);
	    console.log(comm);
	 
	    $.ajax({
	        type: "POST",
	        url: "comment.php",
	        data: {chap:chptr, membre:membre, comm:comm}
		});
	})


// requette modifier chapitre 

var save = document.getElementById("btn-save");


	save.addEventListener("click", function(e)
	{
		e.preventDefault();
		var url_string = window.location.href;
		var url = new URL(url_string);
		var chapitre = url.searchParams.get("chap");
		console.log(chapitre);

	    var contenu = document.getElementById("chap-update").innerHTML;
	    var titre = document.getElementById("titre-update").innerHTML;
	    console.log(contenu);
	    console.log(titre);



	 
	    $.ajax({
	        type: "POST",
	        url: "update.php",
	        data: {chap:chapitre, contenu:contenu, titre:titre},
	        success : function(code_html, statut){console.log(statut) },
	        error : function(resultat, statut, erreur){console.log('error is'+ erreur)},
		});
	})

	//requette new chapitre 

	    		var submit = document.getElementById("create");

	    		submit.addEventListener("click", function(e)
	    		{
	    			e.preventDefault();

				    var title = document.getElementById("title").value;
				    var content = document.getElementById("content").value;
				    console.log(title);
				    console.log(content);
				 
				    $.ajax({
				        type: "POST",
				        url: "create.php",
				        data: 
				        {
				        	titre:title, 
				        	texte:content
				        },

				        success : function(code_html, statut)
				        {
				        	$("#lala").html("<p>le chapitre a été publié voir <a href='admin-view.php'>ici !</a></p>");
				        	var form = document.getElementById("new_chap");
				        	form.style.display = "none";
				        },
				        error : function(resultat, statut, erreur)
				        {
				        	$("#lala").html("<p>Erreur le chapitre n'a pas été posté !</p>");
				        }
		    		});
		    	})

	    	</script>