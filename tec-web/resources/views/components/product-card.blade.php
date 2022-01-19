<!-- <div style="border: solid black 1px" id='questoeuncomponente'>
   
</div> -->

<div class="card card-shadow">
    <div class="card-header card-image">
        {{ $productName }}
        {{ $productGallery }}
    </div>
    <div class="card-body">
        <p class="card-text"> {{ $productDescription }}</p>
        <p class="card-text">{{ $productPrice }}</p>
    </div>
    <div class="card-footer">
        <button class="btn">Aggiungi al carrello</button>
        <button class="btn">Acquista subito</button>
    </div>

    {{ $slot }}
</div>