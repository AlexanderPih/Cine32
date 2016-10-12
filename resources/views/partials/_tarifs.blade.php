<div class="wrap">
    <div class="row">
        <div class="tarifs">
            <h3 class="text-center">Tarifs</h3>
            <div class="col-sm-12 col-lg-6">
                <ul class="list-group">
                    @for ($i=0; $i < ($tarifs->count()/2); $i++)
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[$i]->value, 2, ',', ' ') }} €</span>
                        {!! $tarifs[$i]->name !!}
                        @if ($tarifs[$i]->name == "Carte JLC <small>(Jeunes Lycéens au Cinéma)</small>")
                            @include('partials._modal')
                        @endif
                    </li>
                    @endfor
                </ul>
            </div>
            <div class="col-sm-12 col-lg-6">
                <ul class="list-group">
                    @for ($i=6; $i < $tarifs->count(); $i++)
                        <li class="list-group-item">
                            <span class="badge">{{ number_format($tarifs[$i]->value, 2, ',', ' ') }} €</span>
                            {!! $tarifs[$i]->name !!}
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
        <p class="red text-center space-left-xs space-right-xs">Les séances de 12h15 sont accessibles aux parents accompagnés de leurs nouveaux-nés. Le volume sera réglé en conséquence</p>
        </div>
    </div>
</div>