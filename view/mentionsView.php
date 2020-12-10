<?php 
    $title = "Mentions légales";

    ob_start();

    $settings = '{
        "createur": {
          "nom": "Romain Brocheton, Michael Esmieu, Jules Fauvet, Valentin Point",
          "mail": "contact@loto.brocheton.net"
        },
        "publication": {
          "nom": "Romain Brocheton",
          "mail": "contact@loto.brocheton.net"
        },
        "webmaster": {
          "nom": "Romain Brocheton",
          "mail": "contact@romainbrocheton.com"
        },
        "proprietaire": "LotoHACK",
        "hebergeur": "<b>Hostinger</b> - 61 Lordou Vironos Street 6023  Larnaca, Chypre",
        "url": "www.loto.brocheton.net",
        "mail": "contact@loto.brocheton.net"
      }';
    $settings = json_decode($settings);
    
    ob_start();
?>
<section class="text-justify">
<h2>Mentions légales</h2>
<h3>1. Informations légales :</h3>

<p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <?php echo $settings->url; ?> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi : </p>

<p>
	Propriétaire : <?php echo $settings->proprietaire; ?><br/>
    Créateur du site : <?php echo $settings->createur->nom . ' - ' . $settings->createur->mail; ?><br/>
	Responsable de la publication : <?php echo $settings->publication->nom . ' - ' . $settings->publication->mail; ?><br/>
	Webmaster : <?php echo $settings->webmaster->nom . ' - ' . $settings->webmaster->mail; ?><br/><br/>
	Hébergeur : <?php echo $settings->hebergeur; ?>
</p>

<p>
  Objet : Projet d'école, Polytech Marseille, 2020<br/>
</p>

<hr/>

<h3>2. Présentation et principe :</h3>
<p>Est désigné ci-après : <b>Utilisateur</b>, tout internaute se connectant et utilisant le site susnommé : <a href="http://<?php echo $settings->url; ?>" target="_blank"><?php echo $settings->url; ?></a>.</p>
<p>Le site <b><?php echo $settings->url; ?></b> regroupe un ensemble de services, dans l'état,  mis à la disposition des utilisateurs. Il est ici précisé que ces derniers doivent rester courtois et faire preuve de bonne foi tant envers les autres utilisateurs qu'envers le webmaster du site <?php echo $settings->url; ?>. Le site <?php echo $settings->url; ?> est mis à jour régulièrement par <?php echo $settings->webmaster->nom; ?>.</p>
<p>
<?php echo $settings->publication->nom; ?> s’efforce de fournir sur le site <?php echo $settings->url; ?> des informations les plus précises possibles (sous réserve de modifications apportées depuis leur mise en ligne), mais ne saurait garantir l'exactitude, la complétude et l'actualité des informations diffusées sur son site, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations. En conséquence, l'utilisateur reconnaît utiliser ces informations données (à titre indicatif, non exhaustives et susceptibles d'évoluer) sous sa responsabilité exclusive.</p>

<hr/>

<h3>3. Accessibilité :</h3>
<p>
Le site <?php echo $settings->url; ?> est par principe accessible aux utilisateurs 24/24h, 7/7j, sauf interruption, programmée ou non, pour les besoins de sa maintenance ou en cas de force majeure. En cas d’impossibilité d’accès au service, <?php echo $settings->proprietaire; ?> s’engage à faire son maximum afin de rétablir l’accès au service et s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.  N’étant soumis qu’à une obligation de moyen, <?php echo $settings->proprietaire; ?> ne saurait être tenu pour responsable de tout dommage, quelle qu’en soit la nature, résultant d’une indisponibilité du service.
</p>

<hr/>

<h3>4. Propriété intellectuelle :</h3>

<p>
<?php echo $settings->proprietaire; ?> est propriétaire exclusif de tous les droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, tant sur la structure que sur les textes, images, graphismes, logo, icônes, sons, logiciels…<br/>
Toute reproduction totale ou partielle du site <?php echo $settings->url; ?>, représentation, modification, publication, adaptation totale ou partielle de l'un quelconque de ces éléments, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de <?php echo $settings->publication->nom; ?>, propriétaire du site à l'email : <?php echo $settings->publication->mail; ?>, à défaut elle sera considérée comme constitutive d’une contrefaçon et passible de poursuite conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>

<hr/>

<h3>5. Liens hypertextes et cookies :</h3>
<p>Le site <?php echo $settings->url; ?> contient un certain nombre de liens hypertextes vers d’autres sites (partenaires, informations …) mis en place avec l’autorisation de <?php echo $settings->publication->nom; ?>. Cependant, <?php echo $settings->publication->nom; ?> n’a pas la possibilité de vérifier l'ensemble du contenu des sites ainsi visités et décline donc toute responsabilité de ce fait quand aux risques éventuels de contenus illicites.</p>
<p>L’utilisateur est informé que lors de ses visites sur le site <?php echo $settings->url; ?>, un ou des cookies sont susceptibles de s’installer automatiquement sur son ordinateur par l'intermédiaire de son logiciel de navigation. Un cookie est un bloc de données qui ne permet pas d'identifier l'utilisateur, mais qui enregistre des informations relatives à la navigation de celui-ci sur le site. </p>
<p>Le paramétrage du logiciel de navigation permet d’informer de la présence de cookie et éventuellement, de la refuser de la manière décrite à l’adresse suivante : <a href="http://www.cnil.fr">www.cnil.fr</a>. L’utilisateur peut toutefois configurer le navigateur de son ordinateur pour refuser l’installation des cookies, sachant que le refus d'installation d'un cookie peut entraîner l’impossibilité d’accéder à certains services. Pour tout bloquage des cookies, tapez dans votre moteur de recherche : bloquage des cookies sous IE, Firefox ou Chrome et suivez les instructions en fonction de votre version.</p>

<hr/>

<h3>6. Protection des biens et des personnes - gestion des données personnelles :</h3>

<p>Le site utilise la technologie JavaScript.</p>

<p>Le site internet ne pourra être tenu responsable de dommages matériels liés à l'utilisation du site. De plus, l'utilisateur du site s'engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour. </p>

<p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>

<p>Sur le site <?php echo $settings->url; ?>, <?php echo $settings->proprietaire; ?> ne collecte des informations personnelles ( suivant l'article 4 loi n°78-17 du 06 janvier 1978) relatives à l'utilisateur que pour le besoin de certains services proposés par le site <?php echo $settings->url; ?>. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site <?php echo $settings->url; ?> l’obligation ou non de fournir ces informations.</p>
<p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification, de suppression et d’opposition aux données personnelles le concernant. Pour l’exercer, adressez votre demande à <?php echo $settings->url; ?> par email : <b><?php echo $settings->mail; ?></b> ou par écrit dûment signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>

<p>Aucune information personnelle de l'utilisateur du site <?php echo $settings->url; ?> n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat du site <?php echo $settings->url; ?> et de ses droits autorise <?php echo $settings->proprietaire; ?> à transmettre les dites informations à l'éventuel acquéreur qui serait à son tour tenu à la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site <?php echo $settings->url; ?>.</p></section>

<?php 
    $content = ob_get_clean();

    require('template.php'); 
?>