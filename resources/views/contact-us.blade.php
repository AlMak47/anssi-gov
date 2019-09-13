@extends('layouts.template')

@section('title')
Contactez Nous
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><span>Contactez Nous</span></li>
		</ul>
		<div uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class="" id="left-menu">
					<div class=''>
						<!-- <div class=' uk-text-center panel-right-header uk-border-rounded uk-padding-remove'>Autres liens</div> -->
						<ul class="uk-list uk-list-divider">
							<li><a href="https://support.anssi.gov.gn" class="uk-button-link" target="_blank">Support Center</a> </li>
							<li class="uk-text-left">Kipe Plaza Diamond Plateau Administratif, Republique de Guinee</li>
							<li class="uk-text-left">info@anssi.gov.gn</li>
							<li class="uk-text-left">BP : 5000</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="uk-width-3-5@m">
				<div class="uk-heading-divider uk-h3">CONTACTEZ NOUS</div>
				{!!Form::open()!!}
				<div class="uk-child-width-1-2@m" uk-grid>
					<div>
						<label>Nom</label>
						{!!Form::text('nom','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
					<div>
						<label>Prenom</label>
						{!!Form::text('prenom','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
					<div>
						<label>Email</label>
						{!!Form::text('email','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
					<div>
						<label>Telephone</label>
						{!!Form::text('phone','',['class'=>'uk-input uk-margin-small'])!!}
					</div>
				</div>
				<div>
					<label>Message</label>
					{!!Form::textarea('message','',['class'=>'uk-textarea uk-margin-small','placeholder'=>'Votre message ici...'])!!}
				</div>
				{!!Form::submit('Envoyer',['class'=>'uk-button form-button uk-light'])!!}
				{!!Form::close()!!}
				<!-- maps -->
				<div class="uk-margin-top">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3800.6891269654734!2d-13.653117602503857!3d9.60672626929317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xf1cd6131ddc6abd%3A0x520c269711cb5523!2sPlaza%20Diamant!5e1!3m2!1sfr!2s!4v1568342936414!5m2!1sfr!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
			<div class="uk-width-1-5@m">
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
								<a href="#" class="uk-button-link">Recrutement</a>
							</li>
						</ul>
					</div>
					<div class='uk-border-rounded uk-margin-top panel-right uk-box-shadow-small'>
						<div class='uk-text-bold uk-text-center panel-right-header uk-border-rounded uk-padding-remove'>Nous Contacter</div>
						<div class="uk-grid-small uk-padding  uk-child-width-1-3@m" uk-grid>
							<div class="">
								<a href="https://www.facebook.com/anssi.guinee.3" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary"><span uk-icon="icon:facebook ;"></span></a>
							</div>
							<div class="">
								<a href="https://www.twitter.com/AnssiGuinee" target="_blank" class="uk-padding-small uk-border-rounded uk-button-primary" style="background:skyblue"><span uk-icon="icon:twitter ;"></span></a>
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
