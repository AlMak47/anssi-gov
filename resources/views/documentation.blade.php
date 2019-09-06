@extends('layouts.template')

@section('title')
ANSSI-GUINEE-
@endsection

@section('content')
<div class="uk-section uk-section-default">
	<div class="uk-container uk-container-large">
		<ul class="uk-breadcrumb">
		    <li><a href="{{url('/')}}"><span uk-icon="icon:home;ratio:.6"></span> Acceuil</a></li>
		    <li><a href="#">Documentation</a></li>
		    <li><span class="uk-text-capitalize">{{$slug}}</span></li>
		</ul>

		<div class="" uk-grid>
			<div class="uk-width-1-5@m uk-visible@l">
				<div class='uk-border-rounded panel-right uk-box-shadow-small'>
					<div class='uk-card-title uk-heading-divider uk-text-center panel-right-header uk-border-rounded uk-padding-small'>DOCUMENTATION</div>
          <ul uk-accordion="multiple : true">
            <li>
                <a class="uk-accordion-title" href="#">Lois</a>
                @php
                $lois = App\Document::getLois();
                @endphp
                <div class="uk-accordion-content">
                    <ul class="uk-list">
                      @foreach($lois as $key=>$value)
                      <li><a href="#" class="uk-button uk-button-text" href="" ><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
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
                      <li><a href="#" class="uk-button uk-button-text" href="" ><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
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
                      <li><a href="#" class="uk-button uk-button-text" href="" ><span uk-icon='icon:check;ratio:.8'></span> {{str_limit($value->titre,27,'...')}}</a></li>
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
				    <h3 class="uk-heading-divider uk-text-capitalize"> @if($slug == "arrete") {{"Arrêtés"}} @else {{$slug}}(s) @endif</h3>
				    <p class="uk-text-justify">
				    	<ul class="uk-list">
								@foreach($details as $key=>$value)
				    		<li>
				    			<a href="{{url('documents/'.$value->file)}}" class="uk-button-text" style="text-decoration: none;" target="_blank"><span uk-icon="icon:file-pdf"></span>{{$value->titre}}</a>
				    		</li>
								@endforeach
				    	</ul>
				    </p>
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
						<li><a class='uk-button uk-button-text uk-text-left' href="https://cve.mitre.org/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> Common Vulnerability and Exposures</a></li>

						<li><a class='uk-button uk-button-text uk-text-left' href="https://www.exploit-db.com/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> Exploit Database</a></li>

						<li><a class='uk-button uk-button-text uk-text-left' href="https://nvd.nist.gov/vuln/detail/CVE" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> NIST</a></li>

						<li><a class='uk-button uk-button-text uk-text-left' href="https://www.cvedetails.com/" target="_blank"><span uk-icon='icon:check;ratio:.8'></span> CVE Details</a></li>

					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
