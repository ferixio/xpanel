@extends('layouts.app')

@section('content')
  <h5 class="title uk-text-uppercase">Overview</h5>

  <div class="uk-flex uk-child-width-1-1 uk-child-width-1-2@l uk-grid-medium uk-position-relative uk-padding" uk-grid>

    <div class="uk-width-1-1">
      <div class="uk-card uk-card-default  x-radius10">
        <div class="x-color-accent uk-card-header x-white-text uk-text-bold">Rekap Bulanan</div>
        <div class="uk-card-body"></div>
      </div>
    </div>
    

    <div>
      <div class="uk-card uk-card-default x-radius10">
        <div class="x-color-accent uk-card-header x-white-text uk-text-bold">Rekap Article</div>
        <div class="uk-card-body"></div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default x-radius10">
        <div class="x-color-accent uk-card-header x-white-text uk-text-bold">Rekap Product</div>
        <div class="uk-card-body"></div>
      </div>
    </div>
    
   
  </div>

@endsection
