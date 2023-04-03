@extends('layouts.app')

@section('content')
<div>
    <h5 id="titre">THE SAUCES</h5>

    <div class="row">
    @foreach($sauces as $sauce)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="sauce">
                    <a href="{{ route('sauces.show', $sauce->id) }}"     text-decoration="none" color="inherit" >
                        <img src="{{ asset('storage/images/' . $sauce->imageUrl) }}" alt="{{ $sauce->nom }}" width="100px" height="200px">
                        <h4 id="nomSauce">{{ $sauce->name }}</h4>
                    </a>
                    <p id="forceSauce">Heat: {{ $sauce->heat }}/10</p>  
                </div>
            </div>
        </div>
    @endforeach
</div>

    
</div>
@endsection