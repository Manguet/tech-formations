<h1 style="text-transform: uppercase">Formation Tests unitaires :</h1>

<div class="accordion" id="accordion">
<div class="card">
<div class="card-header" id="headingOne">
  <h2 class="mb-0">
      <button class="btn btn-link btn-block text-left"
              type="button"
              data-toggle="collapse"
              data-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
      >
          Introduction :
      </button>
  </h2>
</div>

<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
<div class="card-body">
    <ul class="text-justify">
        <li>
            Les tests sont une partie importante de toute application. Il faudrait un taux de couverture de 100% afin de s'assurer d'une limitation des <span class="red">effets de bords</span> et limiter les <span class="red">KO fonctionnels</span>.
        </li>
        <li>
            Il existe se que l'on appel le <span class="red">TDD</span> : Le Test Driven Development (Il s'agit d'écrire les tests <span class="red">avant</span> même de coder)
        </li>
        <li>
            Il existe différents types de tests. Le premier que nous allons voir est se que l'on appel les <span class="red">tests unitaires</span>.
        </li>
        <li>
            Un test unitaire est un test qui permet de s'assurer du bon fonctionnement d'une <span class="red">fraction de code</span>. Exemple : <span class="red">une méthode d'un service</span>.
        </li>
        <li>
            Le test va permettre de <span class="red">vérifier</span> que se qui arrive dans le service correspond bien à se qu'il en sort. Donc on va utiliser les <span class="red">paramètres</span> de la méthode et vérifier son <span class="red">return</span>.
        </li>
    </ul>
</div>
</div>

<div class="card">
<div class="card-header" id="headingTwo">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
        >
            Lancer le projet :
        </button>
    </h2>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
    <div class="card-body">
        <ol class="text-justify">
            <li>Faire un <span class="red">Fork</span> du projet</li>
            <li> Puis, un <span class="red">git clone</span></li>
            <li> Lancer <span class="red">composer install</span>.</li>
            <li> Faire un <span class="red">yarn install</span></li>
            <li> Puis <span class="red">yarn encore dev</span></li>
            <li> Faire un <span class="red">symfony server:start</span> ou un <span class="red">php -S 127.0.0.1:8000 -t public</span></li>
        </ol>
    </div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingThree">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
        >
            Utilisation des tests :
        </button>
    </h2>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
    <div class="card-body">
        <ul class="text-justify">
            <li>
                Pour lancer les tests, on peut procéder de différentes façon :
                <ol class="text-justify">
                    <li><span class="red">php bin/phpunit</span> : Pour lancer tous les tests du projet</li>
                    <li><span class="red">php bin/phpunit core/tests</span> : Pour lancer tous les tests dans le dossier core/tests</li>
                    <li><span class="red">php bin/phpunit core/tests/punchout/PunchoutTests.php</span> : pour lancer tous les tests de PunchoutTests</li>
                </ol>
            </li>
            <li>
                Par convention, le <span class="red">dossier</span> contenant les tests doit s'appeler <span class="red">tests</span>
            </li>           
            <li>
                Il faut également que l'on reprenne l'architecture de base d'un projet. Pour tester <span class="red">src/Form</span>, il faut que le test soit dans <span class="red">tests/Form</span>.
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>