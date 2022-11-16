<x-app-layout>
    @livewire('welcome', ['categories' => $categories])

    {{-- @foreach ($testarray as $item)
    <div>

        {{$item['name']}}
    </div> --}}
        
    @endforeach
</x-app-layout>