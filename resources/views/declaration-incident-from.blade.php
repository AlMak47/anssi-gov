@extends('layouts.template')

@section('title')
CONTACT-US
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Formation</span></li>
		</ul>
		<div uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>DOCUMENTATION</div>
					<ul uk-accordion="multiple : true">
						<li>
								<a class="uk-accordion-title" href="#">Lois</a>
								@php
								use Illuminate\Support\Facades\Storage;
								$lois = App\Document::getLois();
								@endphp
								<div class="uk-accordion-content">
										<ul class="uk-list">
											@foreach($lois as $key=>$value)
											<li><a href="{{asset(config('document.path').'/'.$value->file)}}" target="_blank" class="uk-button uk-button-text" href="" uk-tooltip="{{$value->titre}}"><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
											@endforeach
										</ul>
								</div>
						</li>
						<li>
								<a class="uk-accordion-title" href="#">Decrets</a>
								@php
								$docs = App\Document::getDecrets();
								@endphp
								<div class="uk-accordion-content">
										<ul class="uk-list">
											@foreach($docs as $key=>$value)
											<li><a href="{{asset(config('document.path').'/'.$value->file)}}" target="_blank" class="uk-button uk-button-text" uk-tooltip="{{$value->titre}}"><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,20,'...')}}</a></li>
											@endforeach
										</ul>
								</div>
						</li>
						<li>
								<a class="uk-accordion-title" href="#">Arrete</a>
								@php
								$docs = App\Document::getArrete();
								@endphp
								<div class="uk-accordion-content">
										<ul class="uk-list">
											@foreach($docs as $key=>$value)
											<li><a href="{{asset(config('document.path').'/'.$value->file)}}" target="_blank" class="uk-button uk-button-text" uk-tooltip="{{$value->titre}}"><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,20,'...')}}</a></li>
											@endforeach
										</ul>
								</div>
						</li>
					</ul>
				</div>
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>AUTRES LIENS</div>
					<ul class='uk-list'>
						<li><a class='uk-button uk-button-text' href="https://www.arpt.gov.gn" target="_blank" uk-tooltip="Autorite de Regulation des Postes et Telecommunication"><span uk-icon='icon:check;ratio:.8'></span> ARPT</a></li>
						<li><a class='uk-button uk-button-text' href="https://www.mpten.gov.gn/" target="_blank" uk-tooltip="Ministere des Postes et Telecommunication et de l'Economie Numerique"><span uk-icon='icon:check;ratio:.8'></span> MPTEN</a></li>
					</ul>
				</div>
			</div>
			<div class="uk-width-3-5@m">
				<div class="uk-heading-divider uk-h3">DECLARATION D'INCIDENT</div>
				{!!Form::open(['url'=>'#'])!!}
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
				{!!Form::submit('Envoyer',['class'=>'uk-button uk-margin-small form-button uk-light'])!!}
				{!!Form::close()!!}
			</div>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>A VOIR AUSSI</div>
					<ul class='uk-list'>
						<?php App\Http\Controllers\AcceuilController::voirAussi(); ?>
					</ul>
				</div>
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>LIENS</div>
					<ul class='uk-list'>
						<li><a class='uk-button uk-button-text' href="https://cve.mitre.org/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> Common Vulnerability and Exposures</a></li>

						<li><a class='uk-button uk-button-text' href="https://www.exploit-db.com/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> Exploit Database</a></li>

						<li><a class='uk-button uk-button-text' href="https://nvd.nist.gov/vuln/detail/CVE" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> NIST</a></li>

						<li><a class='uk-button uk-button-text' href="https://www.cvedetails.com/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> CVE Details</a></li>

					</ul>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
