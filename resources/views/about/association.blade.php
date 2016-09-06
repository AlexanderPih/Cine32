@extends('main')

@section('title', 'Association')

@section('customheader')
    <link rel="stylesheet" href="{{ url('css/apropos.css') }}">
@stop

@section('content')
<div class="wrap">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-lg-9">
            <div class="space-left">
            <h1>Présentation</h1>

            <div class="space-left">
                <p>
                    <small>
                        <span class="glyphicon glyphicon-triangle-right" area-hidden="true"></span>
                    </small>
                    L’association Ciné 32 a progressivement mis en place pour l’ensemble du Gers un dispositif interassociatif permettant à chaque association de gérer librement le cinéma de sa commune.
                </p>
                <p>
                    <small>
                        <span class="glyphicon glyphicon-triangle-right" area-hidden="true"></span>
                    </small>
                Ciné 32 coordonne ainsi la diffusion et l’animation dans les 23 salles du département et assure, au sein de l’entente de programmation SAGEC-Ciné 32 devenu VEO, la programmation de 244 salles dans 24 départements, dont une soixantaine en Midi-Pyrénées.
                </p>
                <p>
                    <small>
                        <span class="glyphicon glyphicon-triangle-right" area-hidden="true"></span>
                    </small>
                    Une politique d’accueil de tournages a également été mise en place avec les Régies de Gascogne.
                </p>
                <p>
                    <small>
                        <span class="glyphicon glyphicon-triangle-right" area-hidden="true"></span>
                    </small>
                    De nombreux débats et rencontres avec des professionnels du cinéma : cinéastes, acteurs, techniciens, critiques,..
                </p>
            </div>

            <h3>La coordination départementale</h3>
            <p>
                 Toutes les salles du Gers (19 écrans au total) sont gérées par des associations locales et regroupées au sein de Ciné 32 qui assure le rôle de programmation, coordination, conseil, régulation, de formation ainsi que la totalité des tâches administratives et d’organisation à travers son Centre de Soutien Logistique.
            </p>

            <h3>Le Plan Cinéma Jeunesse</h3>
            <p>
                 Il s’applique de la maternelle à la terminale : Un film pour tous, Ecole au Cinéma, Collège au Cinéma, Lycéens et Jeunes au Cinéma en Midi-Pyrénées, formation d’enseignants, interventions dans les classes...
            </p>
            
            <h3>Le festival Indépendance(s) et création</h3>
            <p>
                L’ambition de ce festival, qui prolonge le travail conduit depuis vingt-quatre ans par Ciné 32, est simple : défendre et illustrer une certaine idée du cinéma qui, au sein du mouvement Art et Essai, va de pair avec la réalité vivante des salles de proximité. Montrer ces films d’aujourd’hui, qui résistent à l’uniformisation du prêt à consommer, et les aider à rencontrer leur public, c’est le premier moyen pour résister : l’esprit d’indépendance n’a de sens que s’il encourage la création, que s’il stimule le désir de la découverte et le plaisir de la surprise. Un festival pas comme les autres, sans paillettes ni palmarès, où il est affirmé que le cinéma, ici comme ailleurs, est bien vivant si nous le faisons vivre.
            </p>

            <h3>L’accueil de tournage - Les Régies de Gascogne</h3>
            <p>
                Les Régies de Gascogne accueillent des réalisateurs, des régisseurs et des équipes de tournage. Elles mettent à disposition leur connaissance du terrain, des sites et des décors ainsi qu’un fichier de techniciens, acteurs et figurants. Elles peuvent aider dans leurs démarches administratives, le choix de prestataires de service, la recherche de figuration et de casting local ainsi que pour l’intendance journalière.
            </p>
            </div>
        </div>

        <!-- sidebar -->
        <div class="col-xs-12 col-sm-4 col-lg-3">
            <div class="well space-right space-top">
                <h3 class="text-center">Rapports d'activité:</h3>
                    <ul class="text-center list-unstyled">
                        <li>
                            <a href="#"><img src="{{ url('img/pdf.png') }}" alt=""></a><br>2015
                        </li>
                        <li>
                            <a href="#"><img src="{{ url('img/pdf.png') }}" alt=""></a><br>2014
                        </li>
                        <li>
                            <a href="#"><img src="{{ url('img/pdf.png') }}" alt=""></a><br>2013
                        </li>
                        <li>
                            <a href="#"><img src="{{ url('img/pdf.png') }}" alt=""></a><br>2012
                        </li>
                    </ul>

            </div>
        </div>
    </div>
</div>


@stop