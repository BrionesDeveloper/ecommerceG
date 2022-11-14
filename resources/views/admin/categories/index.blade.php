<x-admin-layout>
    
    <div class="container py-12">
        @livewire('admin.create-category')
    </div>

    @push('script')
        <script>
            Livewire.on('deleteCategory', categorySlug => {
            
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

                        Livewire.emitTo('admin.create-category', 'delete', categorySlug)

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

</x-admin-layout>