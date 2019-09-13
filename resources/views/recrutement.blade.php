@extends('layouts.template')

@section('title')
RECRUTEMENT
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Recrutement</span></li>
		</ul>
		<div uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">
				<ul class="uk-list uk-list-divider">
									<li><a class="uk-button-link" style="text-decoration : none !important ;" href="#"> Formulaire de Candidature</a></li>
				</ul>
			</div>
			<div class="uk-width-3-5@m">
				<div class="uk-heading-divider uk-h3">RECRUTEMENT</div>
				<p>
					Rejoindre l’Agence nationale de la sécurité des systèmes d’information (ANSSI), c’est mettre ses compétences au service de l’intérêt général en participant à une mission capitale, d’actualité et porteuse de grandes responsabilités dans un monde où la cybersécurité est devenue l’affaire de tous !
Depuis la création de l’agence, nos bureaux et laboratoires se développent grâce à des experts animés par le goût du challenge et le sens du service de l’intérêt général. Chaque année, de nouvelles personnes rejoignent et enrichissent l’agence de leurs compétences.
Nous accueillerons cette année encore de nouveaux collaborateurs pour protéger et défendre l’Etat, les opérateurs d’importance vitale, les entreprises et les citoyens des menaces auxquelles sont exposés leurs systèmes d’information.
En ferez-vous partie ?
				</p>
			</div>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class="" id="left-menu">
					<div class='uk-border-rounded panel-right uk-box-shadow-small'>
						<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-remove'><a class="uk-button uk-text-bold" style="text-decoration :none;color:#fff" href="{{url('/voir-aussi',[App\Pages::where('slug','en-cas-dincidence')->first()->slug])}}">En cas d'incident</a></div>
						<ul class="uk-list uk-list-divider">
							<li class="uk-text-center uk-text-bold">
								<span uk-icon="icon:receiver;ratio:2" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">627 537 012</span>
							</li>
							<li class="uk-text-center">
								<a href="#" class="uk-button-link">Cellule d'alerte</a>
							</li>
							<li class="uk-text-center">
								<a href="#" class="uk-button-link">Recrutement</a>
							</li>
						</ul>
					</div>
					<div class='uk-border-rounded uk-margin-top panel-right uk-box-shadow-small'>
						<div class='uk-text-bold uk-text-center panel-right-header uk-border-rounded uk-padding-remove'>Nous Contacter</div>
						<div class="uk-grid-small uk-padding  uk-child-width-1-3@m" uk-grid>
							<div class="">
								<a href="" class="uk-padding-small uk-border-rounded uk-button-primary"><span uk-icon="icon:facebook ;"></span></a>
							</div>
							<div class="">
								<a href="" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:skyblue"><span uk-icon="icon:twitter ;"></span></a>
							</div>
							<div class="">
								<a href="" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:red"><span uk-icon="icon:youtube ;"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
