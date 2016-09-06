<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
        <li>
            <a href="#collapse-film" data-toggle="collapse" area-control="collapse-film">Films</a>
            <ul class="collapse collapseabel" id="collapse-film">
                <li><a href="{{ route('adminfilms.index') }}">Tous les Films</a></li>
                <li><a href="{{ route('films.create') }}">Nouveau Film</a></li>
                <li><a href="{{ route('director.index') }}">Réalisateurs</a></li>
                <li><a href="{{ route('actor.index') }}">Acteurs</a></li>
                <li><a href="{{ route('admin.genres') }}">Genres</a></li>
                <li><a href="{{ route('classification.index') }}">Classifications</a></li>
            </ul>
        </li>
        <li><a href="{{ route('admin.cinemas') }}">Cinemas</a></li>
        <li><a href="#collapse-animation" data-toggle="collapse" area-control="collapse-animation">Animation</a>
            <ul class="collapse collapseabel" id="collapse-animation">
                <li><a href="#">Nouvelle Animation</a></li>
                <li><a href="#">Modifier Animation</a></li>
            </ul>
        </li>
        <li><a href="#collapse-festival" data-toggle="collapse" area-control="collapse-festival">Festival</a>
            <ul class="collapse collapseabel" id="collapse-festival">
                <li><a href="#">Nouveau Festival</a></li>
                <li><a href="#">Modifier Festival</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="">Tarifs</a></li>
        <li><a href="">Bistrot</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="#">Pédagogique</a></li>
        <li><a href="#">Tournage</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="#collapse-apropos" data-toggle="collapse" area-control="collapse-apropos">A Propos</a>
            <ul class="collapse collapseabel" id="collapse-apropos">
                <li><a href="#">Association</a></li>
                <li><a href="#">Historique</a></li>
                <li><a href="#">Equipe</a></li>
                <li><a href="#">Informations</a></li>
                <li><a href="#">Adherer</a></li>
            </ul>
        </li>
    </ul>
</div>