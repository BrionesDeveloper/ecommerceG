
<div  wire:init="loadPosts">
    @if (count($brands))
    
        <div class="flexslider">
            <ul class="slides">
                    @foreach ($brands as $brand)
                                
                    <li > 
                        <a href="{{$brand->name}}">
                            <img  src="{{asset('storage/' .$brand->image) }}">                    
                        </a>               
                    </li>
            
                    @endforeach
            </ul>
            
      </div>

    @else

        <div class="mb-4 altura w-full flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 bg-fuchsia-500"></div>
        </div>
        
    @endif
</div>

{{-- @push('script')
<script>

    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5
        });
    });

</script>
@endpush --}}
