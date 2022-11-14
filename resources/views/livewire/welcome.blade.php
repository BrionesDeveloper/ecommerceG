<div>
    @if ($sitio)
    <div class="altura">
        @livewire('carrusel') 

    </div>

    <div class="container py-8">

        @livewire('brand') 
        
        @foreach ($categories as $category)
        
            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg uppercase font-semibold text-gray-700">
                        {{$category->name}}
                    </h1>

                    <a href="{{route('categories.show', $category)}}" class="text-fuchsia-500 hover:text-fuchsia-400 hover:underline ml-2 font-semibold">Ver más</a>

                </div>

                @livewire('category-products', ['category' => $category])
            </section>

        @endforeach
        
    </div>
    @else
     <div class="text-center text-pink-700">
        <h1>
            PAGINA EN MANTENIMIENTO 
             
        </h1>
        <H3>Estamos trabajando para brindarle el mejor servicio </H3>
     </div>
    
    @endif

    
    
    <div class="text-center">
        <x-jet-button wire:click="ocultar"> Apagar pagina </x-jet-button> 
              <x-jet-button wire:click="mostrar"> Encender pagina </x-jet-button>
              
    </div>

    
    @push('script')
        
        <script>
            Livewire.on('slider', function(){
                $(document).ready(function() {
                     $('.flexslider').flexslider({
                         animation: "slide",
                         animationLoop: true,                         
                         itemMargin: 1,
                         minItems: 1,
                         maxItems: 1,
                         smoothHeight: true,
                             });
                         });
                });
           

            Livewire.on('glider', function(id){
                if (id>=99) {
                    new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 'auto',                    
                    draggable: true,                    
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    }
                });
                    
                }else{
                    new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },

                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },

                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });

                }

                

            });
                
        </script>

    @endpush
</div>
