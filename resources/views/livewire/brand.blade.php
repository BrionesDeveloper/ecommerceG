
<div>
    <h5 class="font-bold text-center">
        NUESTRAS MARCAS 
    </h5>
    <div class="grid grid-cols-7 gap-3">
        @foreach ($brands as $brand)        
                            
            <div class=" w-full" data-thumb=" {{ asset('storage/' .$brand->image) }}">
                <img class="w-full object-cover object-center" src=" {{ asset('storage/' .$brand->image) }}" />
            </div>
            @endforeach
      </div>

</div>


