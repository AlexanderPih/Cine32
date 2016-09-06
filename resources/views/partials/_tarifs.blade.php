<div class="wrap">
    <div class="row">
        <div class="tarifs">
            <h3 class="text-center">Tarifs</h3>
            <div class="col-sm-12 col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[0]->value, 2, ',', ' ') }} €</span>
                        Tarif Plein
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[1]->value, 2, ',', ' ') }} €</span>
                        Tarif réduit <small>séances 18h / lundi, mardi, mercredi, jeudi sauf jours fériés / séances du matin
                             étudiant, lycéen, collégien, demandeur d'emploi, Pass culturel</small> <small class="red">(sur justificatif)</small>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[2]->value, 2, ',', ' ') }}€</span>
                        Tarif Adhérent <small class="red">(sur justificatif)</small>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[3]->value, 2, ',', ' ') }} €</span>
                        Tarif Enchantés <small>(-12ans, 6ème place offerte)</small>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[4]->value, 2, ',', ' ') }} €</span>
                        Séances 12h15
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[5]->value, 2, ',', ' ') }} €</span>
                        Carte JLC <small>(Jeunes Lycéens au Cinéma)</small>
                        <button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#jlcModal">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="jlcModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal-small">
                                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="center-block img-responsive" src="{{ url('img/jlc.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge badge-red">{{ number_format($tarifs[6]->value, 2, ',', ' ') }} €</span>
                        Tarif Enfant - 14ans <small class="red">(sur justificatif)</small>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[7]->value, 2, ',', ' ') }} €</span>
                        Tarif RSA <small>(6ème place offerte)</small>
                        <p class="space">.</p>
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-red">{{ number_format($tarifs[8]->value, 2, ',', ' ') }} €</span>
                        Supplément 3D
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[9]->value, 2, ',', ' ') }} €</span>
                        Carnet de 10 Tickets <small>(Valable dans toutes les salles du Gers)</small>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[10]->value, 2, ',', ' ') }} €</span>
                        Adhésion à l'Association Ciné32 / Simple
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{ number_format($tarifs[11]->value, 2, ',', ' ') }} €</span>
                        Adhésion à l'Association Ciné32 / Coulpe
                    </li>
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