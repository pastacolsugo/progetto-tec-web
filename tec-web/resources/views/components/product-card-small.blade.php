<div class="card ">
    <div class="card-header">
        <!-- forse, fare l'immagine in piccolo -->
        {{ $productName }}
    </div>
    <div class="card-body">
        <p class="card-text"> {{ $productDescription }}</p>
        <p class="card-text">{{ $productPrice }}</p>
    </div>
    <div class="card-footer">
        <button class="btn">Acquista subito</button>
    </div>

    {{ $slot }}
</div>