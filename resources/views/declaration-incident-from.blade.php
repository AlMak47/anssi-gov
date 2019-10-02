@extends('layouts.template')

@section('title')
Declaration d'incident
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Declaration d'incident</span></li>
		</ul>
		<div uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">

			</div>
			<div class="uk-width-3-5@m">
				<div class="uk-heading-divider uk-h3">DECLARATION D'INCIDENT</div>
				{!!Form::open(['url'=>''])!!}
				<div class="uk-heading-divider uk-h3">Informations Generales</div>
				<div class="" uk-grid>
					<div class="uk-width-1-3@m">
						<label class="">Date de la declaration</label>
						{!!Form::text('date','',['class'=>'uk-input'])!!}
					</div>
					<div class="uk-width-2-3@m">
						<label>Nom de l'entite</label>
						{!!Form::text('nom_entite','',['class'=>'uk-input'])!!}
					</div>
					<div class="uk-width-1-2@m">
						<label>Type</label>
						<select name="type" class="uk-select">
							<option>Public</option>
							<option>Privé</option>
						</select>
					</div>
					<div class="uk-width-1-2@m">
						<label>Personne à contacter</label>
						{!!Form::text('personne_to_contact','',['class'=>'uk-input'])!!}
					</div>
				</div>
				<div class="uk-heading-divider uk-h3">Informations sur le déclarant</div>
				<div class="uk-alert">Le déclarant est la personne chargée au nom de l'entité d'éffectuer la présente déclaration.</div>
				<div class="uk-child-width-1-2@m" uk-grid>
					<div>
						<label>Nom</label>
						{!!Form::text('nom','',['class'=>'uk-input'])!!}
					</div>
					<div>
						<label>Prenom</label>
						{!!Form::text('prenom','',['class'=>'uk-input'])!!}
					</div>
					<div>
						<label>Service</label>
						{!!Form::text('service','',['class'=>'uk-input'])!!}
					</div>
					<div>
						<label>Fonction</label>
						{!!Form::text('fonction','',['class'=>'uk-input'])!!}
					</div>
					<div>
						<label>Adresse Postale</label>
						{!!Form::text('poste','',['class'=>'uk-input'])!!}
					</div>
					<div>
						<label>Telephone</label>
						{!!Form::text('phone','',['class'=>'uk-input'])!!}
					</div>
					<div>
						<label>Adresse Electronique</label>
						{!!Form::text('email','',['class'=>'uk-input'])!!}
					</div>
				</div>

				<div class="uk-heading-divider uk-h3">Description de l'incident</div>
				<div>
					<label>Denomination du reseau et systeme d'information affecte par l'incident</label>
					{!!Form::text('denomination','',['class'=>'uk-input uk-margin-small'])!!}
				</div>
				<div>
					<label>Description de ce reseau et systeme d'information</label>
					{!!Form::textarea('description_system','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>
				<div>
					<label>Si ce reseau est exploite par un tiers , nom de ce tiers</label>
					{!!Form::text('proprietaire_reseau','',['class'=>'uk-input uk-margin-small'])!!}
				</div>
				<div>
					<label>Localisation physique de ce reseau et systeme d'information ainsi que des equipements de ce reseau et systeme concernes par l'incident</label>
					{!!Form::textarea('localisation_physique','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="uk-child-width-1-2@m" uk-grid>
					<div>
						<label>Date et heur (GMT) a laquelle l'incident a ete constate</label>
						{!!Form::text('date_incident_constat','',['class'=>'uk-input uk-margin-small','id'=>'date_constat'])!!}
					</div>
					<div>
						<label>Date et heure (GMT) a estimees du debut de l'incident</label>
						{!!Form::text('date_incident_debut','',['class'=>'uk-input uk-margin-small','id'=>'date_debut'])!!}
					</div>
				</div>
				<div>
					<label>Description generale de l'incident</label>
					{!!Form::textarea('description_incident','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>
				<div>
					<label>Description du ou des services numeriques dependant de ce reseau et systeme d'information , qui sont affectees par l'incident</label>
					{!!Form::textarea('description_services','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="uk-heading-divider uk-h3">Impacts de l'incident</div>
				<div class="uk-child-width-1-3@m" uk-grid>
					<div>
						<label>Utilisateurs touches par l'incident</label>
						{!!Form::text('utilisateur_touche','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
					<div>
						<label>Duree de l'incident</label>
						{!!Form::text('duree_incident','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
					<div>
						<label>Portee geographique de l'incident</label>
						{!!Form::text('portee_incident','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
				</div>
				<div>
					<label>Description des impacts de l'incident sur les objectifs de securite (disponibilite,authenticite,integrite ou la confidentialite) des donnees des utilisateurs et des services numeriques affectees:</label>
					{!!Form::textarea('description_impacts','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>
				<div class="uk-heading-divider uk-h3">Traitement de l'incident</div>
				<div class="">
					{!!Form::label("En cas d'incident d'origine non malveillante , description des causes de l'incident")!!}
					{!!Form::textarea('incident_origine_non_malveillant','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="">
					{!!Form::label("En cas d'incident d'origine malveillante  ( ou attaque ) , description du mode operatoire et des caracteristiques de l'attaque : ")!!}
					{!!Form::textarea('incident_origine_malveillant','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="">
					{!!Form::label("En cas d'attaque donner les informations techniques de l'attaque (adresses IP , noms de domaine , adresses URL , e-mail , noms de fichiers ou de codes malveillants , etc: ")!!}
					{!!Form::textarea('en_cas_attaque_malveillant','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="">
					{!!Form::label("Quelles sont les mesures techniques et organisationnelles prises et envisagees par l'entite pour traiter l'incident")!!}
					{!!Form::textarea('mesures_technique_organisationnelle','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="">
					{!!Form::label("Si l'entite recourt a des prestataires exterieurs pour traiter l'incident  , liste de ces partenaires ")!!}
					{!!Form::textarea('list_partenaire','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>
				<div class="uk-heading-divider uk-h3">Divers</div>
				<div class="">
					{!!Form::label("Si des declarations relatives a cet incident  ont ete effectuees par l'entite aupres d'autres  organismes (police , gendarmerie,cert)")!!}
					{!!Form::textarea('declaration_relatives_incident','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				<div class="">
					{!!Form::label("En particulier , si un depot de plainte a ete effectue par l'entite, service aupres duquel la plainte est deposee")!!}
					{!!Form::textarea('depot_plainte_entite','',['class'=>'uk-textarea uk-margin-small'])!!}
				</div>

				{!!Form::submit('Envoyer',['class'=>'uk-button uk-margin-small form-button uk-light','disabled'=>''])!!}
				{!!Form::close()!!}
			</div>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class="" id="right-menu">
					<div class='uk-border-rounded panel-right uk-box-shadow-small'>
						<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-remove'><a class="uk-button uk-text-bold" style="text-decoration :none;color:#fff" href="{{url('/voir-aussi',[App\Pages::where('slug','en-cas-dincidence')->first()->slug])}}">En cas d'incident</a></div>
						<ul class="uk-list uk-list-divider">
							<li class="uk-text-center uk-text-bold">
								<span uk-icon="icon:receiver;ratio:2" class="phone-icone"></span> <span class="phone-number" style="text-decoration: none;">627 537 012</span>
							</li>
							<li class="uk-text-center">
								<a href="https://support.anssi.gov.gn" class="uk-button-link">Cellule d'alerte</a>
							</li>
							<li class="uk-text-center">
								<a href="{{url('/voir-aussi/recrutement')}}" class="uk-button-link">Recrutement</a>
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
