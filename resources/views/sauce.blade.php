@extends('layouts.app')

@section('content')
<section id="entete">
    <!-- affiche le nom de la sauce et la desc -->
    <h2 id="titre">{{ $sauce->name }}</h2>
    <h4>{{ $sauce->description }}<h4>
</section>

<section id="desc">
    <section id="gauche">
        <!-- affiche le nom du fabricant de la sauce -->
        <p>Manufactured by : {{ $sauce->manufacturer }}</p>
        <!-- affiche la heat de la sauce -->
        <p>Heat: {{ $sauce->heat }}/10</p>
        <!-- affiche le mainPepper de la sauce -->
        <p>Main pepper : {{ $sauce->mainPepper }}</p>
        <!-- affiche le nombre de likes de la sauce -->
        <p>Already {{ $sauce->likes }} people like it !</p>
        <!-- affiche le nombre de dislikes de la sauce -->
        <p> {{ $sauce->dislikes }} dislike it</p>
    </section>
    <section id="droite">
        <!-- affiche l'image de la sauce -->
        <img src="{{ asset('storage/images/' . $sauce->imageUrl) }}" alt="{{ $sauce->nom }}" width="200px" height="400px">
        <!-- affiche la description de la sauce -->
        
    </section>
</section>



</div>
@endsection