<div class="container py-12">
    {{-- Formaliio crear --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Agregar nueva imagen para el carrusel
        </x-slot>

        <x-slot name="description">
            En esta sección podrá agregar una nueva imagen que se mostrara al inicio de la pagina del carrusel
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    URL
                </x-jet-label>

                <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">
                <x-jet-input-error for="createForm.image" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button class="bg-pink-700">
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- Lista de marcas --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de Publicaciones
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las publicaciones del carrusel agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">URL</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($carrusels as $carrusel)
                        <tr>
                            <td class="py-2">

                                
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if ($carrusel->image)
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ asset('storage/' .$carrusel->image) }}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium uppercase text-gray-900">
                                            {{ $carrusel->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$carrusel->id}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('deleteCarrusel', '{{$carrusel->id}}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    {{-- Modal editar --}}
    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Imagen Carrusel
        </x-slot>
        

        <x-slot name="content">
            <div>
                @if ($editImage)
                    <img class="w-full h-64 object-cover object-center" src="{{$editImage->temporaryUrl()}}" alt="">
                @else
                    <img class="w-full h-64 object-cover object-center" src="{{asset('storage/' .$editForm['image'])}}" alt="">
                @endif
            </div>
            <x-jet-label>
                URL
            </x-jet-label>
            <x-jet-input wire:model="editForm.name" type="text" class="w-full" />
            <x-jet-input-error for="editForm.name" />

            <div>
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name="" id="{{$rand}}">
                <x-jet-input-error for="editImage" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteCarrusel', carruselId => {
            
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "No se podra revertir este cambio!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminalo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.carrusel-component', 'delete', carruselId)

                        Swal.fire(
                            'Eliminado!',
                            'El elemento seleccionado se elimino correctamente.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush
</div>
