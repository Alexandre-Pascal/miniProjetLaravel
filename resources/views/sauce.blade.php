@extends('layouts.app')

@section('content')
<section id="entete">
    <section></section>
    <section>
    <!-- affiche le nom de la sauce et la desc -->
    <h2 id="titre">{{ $sauce->name }}</h2>
    <h4>{{ $sauce->description }}</h4>
    </section>
    <section id="btns">
        <!-- Bouton pour supprimer la sauce si l'utilisateur est le créateur de la sauce -->
        @if($sauce->userID == Auth::user()->email)
            <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif

        <!-- Bouton pour midifier la sauce si l'utilisateur est le créateur de la sauce -->
        @if($sauce->userID == Auth::user()->email)
            <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-primary" id="edit">Edit</a>
        @endif
    </section>
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
        <br><br>
        
        <section id="like-dislike">
            <!-- affiche le bouton like qui augmente le nombre de like de la sauce -->
            <form action="{{ route('sauces.like', $sauce->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success taille" id="like">Like</button>
            </form>
            <form action="{{ route('sauces.dislike', $sauce->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger taille">Dislike</button>
            </form>
            <!-- si l'utilisateur aime la sauce, un texte s'affiche -->
        </section>
        <section class="like-dislikePhrase">
            @if(in_array(Auth::user()->email, unserialize($sauce->usersLiked)))
                <p id="liked">You like this sauce !</p>
            @endif
            <!-- si l'utilisateur n'aime pas la sauce, un texte s'affiche -->
            @if(in_array(Auth::user()->email, unserialize($sauce->usersDisliked)))
                <p id="disliked">You don't like this one</p>
            @endif
            <!-- si l'utilisateur n'a pas encore voté, un texte s'affiche -->
            @if(!in_array(Auth::user()->email, unserialize($sauce->usersLiked)) && !in_array(Auth::user()->email, unserialize($sauce->usersDisliked)))
                <p id="noVote">You didn't vote yet !</p>
            @endif
        </section>
        
    </section>
</section>



</div>
@endsection