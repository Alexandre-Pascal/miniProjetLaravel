@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            <br>

                <div class="card-body">
                    @if (isset($sauce))
                        <form method="POST" enctype="multipart/form-data" action="{{ route('sauces.update', $sauce->id) }}">
                            @method('PUT')
                    @else
                        <form method="POST" enctype="multipart/form-data" action="{{ route('ajoutSauce') }}">
                    @endif
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            @if (isset($sauce))
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $sauce->name }}" required autocomplete="name" autofocus>
                            @else
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @endif



                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="row mb-3">
                            <label for="manufacturer" class="col-md-4 col-form-label text-md-end">{{ __('Manufacturer') }}</label>

                            @if (isset($sauce))
                                <input id="manufacturer" type="text" class="form-control @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ $sauce->manufacturer }}" required autocomplete="manufacturer" autofocus>
                            @else
                                <input id="manufacturer" type="text" class="form-control @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ old('manufacturer') }}" required autocomplete="manufacturer" autofocus>
                            @endif

                                @error('manufacturer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            
                            @if (isset($sauce))
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">{{ $sauce->description }}</textarea>
                            @else
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-description">{{ old('description') }}</textarea>
                            @endif

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- bouton file qui seulement des imaged donc png  -->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <div class="file-upload">
                                <label for="file-input">
                                    <i class="fas fa-cloud-upload-alt"></i> ADD IMAGE
                                </label>
                                <input id="file-input" onchange="previewImage(event)" type="file" name="imageUrl" accept="image/*">
                                @if (isset($sauce))
                                    <!-- On affiche l'image actuelle -->
                                    <img id="preview" src="{{ asset('storage/images/' . $sauce->imageUrl) }}" alt="Image actuelle">
                                @endif

                            </div>
                            
                                
                            </div>
                            
                        </div>

                        <img id="preview">

                        <div class="row mb-3">
                            <label for="mainPepper" class="col-md-4 col-form-label text-md-end">{{ __('Main Pepper Ingredient') }}</label>

                                <!-- transforme en input type text -->
                                @if (isset($sauce))
                                    <input id="mainPepper" type="text" class="form-control @error('mainPepper') is-invalid @enderror" name="mainPepper" value="{{ $sauce->mainPepper }}" required autocomplete="mainPepper">
                                @else
                                    <input id="mainPepper" type="text" class="form-control @error('mainPepper') is-invalid @enderror" name="mainPepper" value="{{ old('mainPepper') }}" required autocomplete="mainPepper">
                                @endif

                                @error('mainPepper')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="heat" class="col-md-4 col-form-label text-md-end">{{ __('Heat') }}</label>

                            <div id="lHeat">
                                <!-- utiliser un slider pour choisir la chaleur -->
                                <!-- <input id="rangeHeat" type="range" min="0" max="10" step="1" value="3"  class="custom-slider" name="heat" value="{{ old('heat') }}" required autocomplete="heat">  -->
                                @if (isset($sauce))
                                    <input id="rangeHeat" type="range" min="0" max="10" step="1" value="{{ $sauce->heat }}"  class="custom-slider" name="heat" required autocomplete="heat">
                                @else
                                    <input id="rangeHeat" type="range" min="0" max="10" step="1" value="3"  class="custom-slider" name="heat" value="{{ old('heat') }}" required autocomplete="heat">
                                @endif
                                
                                <!-- choisir la valeur du slider -->
                                @if (isset($sauce))
                                    <input id="numberHeat" type="number"  min="0" max="10" step="1" value="{{ $sauce->heat }}" class="form-control @error('heat') is-invalid @enderror" name="heat" required autocomplete="heat">
                                @else
                                    <input id="numberHeat" type="number"  min="0" max="10" step="1" value="3" class="form-control @error('heat') is-invalid @enderror" name="heat" value="{{ old('heat') }}" required autocomplete="heat">
                                @endif

                                @error('heat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <!-- si on est dans la page de modification de sauce -->
                                @if (isset($sauce))
                                    <button type="submit" class="btn btn-primary" id="submit">
                                        {{ __('MODIFY') }}
                                    </button>
                                @else
                                <button type="submit" class="btn btn-primary" id="submit">
                                    {{ __('SUBMIT') }}
                                </button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


    // si une image est ajouté afficher l'image dans la div imageAdded
function previewImage(event) {

    const input = event.target;

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = document.getElementById('preview');
            imgPreview.src = e.target.result;
        }
    reader.readAsDataURL(input.files[0]);
    }
}

    // slider pour choisir la force de la sauce fait la même chose que le input number
    var rangeHeat = document.getElementById('rangeHeat');
    var numberHeat = document.getElementById('numberHeat');

    rangeHeat.addEventListener('input', function() {
    numberHeat.value = rangeHeat.value;
    });

    numberHeat.addEventListener('input', function() {
    rangeHeat.value = numberHeat.value;
    });

   
</script>

@endsection
