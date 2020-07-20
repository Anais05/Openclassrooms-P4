<?php 
$title = "Biograhie de l'auteur"; ?>

<?php ob_start(); ?>

	<body>
		
			<section id="biographie">
                <h2>Jean Forteroche</h2>
                <img src="../public/img/auteur.jpg" alt="homme">
                <p>Né en mars 1969 en bourgogne , Jean a une enfance et une adolecence normale et heureuse. 
                    Passionné d'écriture et de voyage en 1997 il decide d'abandonner sont metier d'ingenieur et part à l'aventure.
                    Quelques années plus tard après avoir fait le tour du monde Jean écrit et publie son premier roman <span>"le départ"</span> qui le propulse directement en temps que nouveau talent.
                    Par la site il devient l'auteur de roman à succès comme <span>"La forêt enragée"</span> ou encore <span>"La femme au sac à dos"</span> qui séduisent les lecteur grâce au voyage et au magnifique paysages décrit. 
                    Vous pouvez suivre la progression en direct sur ce blog de son dernier roman <span>"Billet simple pour l'Alaska"</span></br>
                    Bonne lecture ! 
                </p>
			</section>

	</body>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>