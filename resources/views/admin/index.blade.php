@extends('admin.layout')


@section('title', 'Liste des biens immobilier')

@section('content')

    @include('shared.title', [
        'title' => 'Liste des biens',
        'withButton' => true,
        'buttonText' => 'Ajouter un bien',
        'route' => route('admin.property.create'),
    ])


    {{-- table --}}
    <div class="container p-2 mx-auto rounded-lg sm:p-4 dark:text-gray-100 dark:bg-gray-900">
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs">
                <thead class="rounded-t-lg dark:bg-gray-700">
                    <tr class="text-right border-x-4 dark:border-gray-700">
                        <th title="" class="p-3 text-center">#</th>
                        <th title="Title" class="p-3 text-center">Title</th>
                        <th title="Win percentage" class="p-3 text-center">Ville</th>
                        <th title="Losses" class="p-3 text-center">surface</th>
                        <th title="Losses" class="p-3 text-center">Chambres</th>
                        <th title="Losses" class="p-3 text-center">Salles de bin</th>
                        <th title="Losses" class="p-3 text-center">Prix</th>
                        <th title="Games behind" class="p-3 text-center">solde</th>
                        <th title="Current streak" class="p-3 text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr
                            class="text-right border-x-4 border-opacity-20 dark:border-gray-700 hover:border-emerald-500 dark:bg-gray-800">
                            <td class="px-3 py-2 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $property->title }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $property->city }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $property->size }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $property->bedrooms }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ $property->bathrooms }}
                            </td>

                            <td class="px-3 py-2 text-center">
                                {{ number_format($property->price, '2', ',', ' ') }} dh
                            </td>

                            <td class="px-3 py-2 text-center">
                                @if ($property->sold == false)
                                    <span class="px-1 py-1 text-white bg-green-500 rounded-lg">Disponible</span>
                                @else
                                    <span class="px-1 py-1 text-white bg-red-500 rounded-lg">Vendu</span>
                                @endif
                            </td>

                            {{-- actions --}}
                            <td class="px-3 py-2 text-center">
                                <span
                                    class="inline-flex overflow-hidden bg-white border rounded-md shadow-sm dark:border-gray-800 dark:bg-gray-800">
                                    <a href="{{ route('admin.property.edit', $property) }}"
                                        class="inline-block p-3 text-gray-700 border-e hover:text-green-500 hover:bg-gray-50 focus:relative dark:border-e-gray-800 dark:text-gray-200 dark:hover:bg-gray-800"
                                        title="Edit Bien">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>

                                    <form action="" method="POST">
                                        @csrf
                                        <button
                                            class="inline-block p-3 text-gray-700 hover:bg-gray-50 hover:text-red-500 focus:relative dark:text-gray-200 dark:hover:bg-gray-800"
                                            title="Delete Bien">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
