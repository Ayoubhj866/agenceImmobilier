<!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

<section class="bg-gray-100 dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center gap-y-8">
            <div class="p-8 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-700">
                <form
                    action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}"
                    method="post" class="space-y-4">
                    @csrf
                    @method($property->exists ? 'PUT' : 'POST')

                    <div>
                        <label class="sr-only" for="title">Title</label>
                        <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" name="title"
                            value="{{ old('title', $property->title) }}" placeholder="title" type="text"
                            id="title" />
                        @error('title')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="sr-only" for="description">Description</label>
                        <textarea class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" name="description"
                            placeholder="Description" rows="8" id="description">{{ old('description', $property->description) }}</textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="sr-only" for="address">Adresse</label>
                        <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" name="address"
                            value="{{ old('address', $property->address) }}" placeholder="address" type="text"
                            id="address" />
                        @error('address')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="sr-only" for="city">Ville</label>
                        <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" name="city"
                            value="{{ old('city', $property->city) }}" placeholder="Ville" type="text"
                            id="city" />
                        @error('city')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <div>
                            <label class="sr-only" for="price">Prix</label>
                            <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" min="0"
                                value="{{ old('price', $property->price) }}" name="price" placeholder="prix"
                                type="number" id="price" />
                            @error('price')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <label class="sr-only" for="size">Surface</label>
                            <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" min="10"
                                value="{{ old('size', $property->size) }}" name="size" placeholder="Size"
                                type="number" id="size" />
                            @error('size')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <div>
                            <label class="sr-only" for="bedrooms">Chambres</label>
                            <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" min="0"
                                value="{{ old('bedrooms', $property->bedrooms) }}" name="bedrooms"
                                placeholder="Chambre" type="number" id="bedrooms" />
                            @error('bedrooms')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <div>
                            <label class="sr-only" for="bathrooms">bathrooms</label>
                            <input class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" min="0"
                                value="{{ old('bathrooms', $property->bathrooms) }}" name="bathrooms"
                                placeholder="Salles de bin" type="number" id="bathrooms" />
                            @error('bathrooms')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label class="sr-only" for="option">Options</label>
                        <select name="options[]" multiple
                            class="w-full p-3 text-sm border-gray-800 rounded-lg dark:bg-gray-800" id="option">
                            <option value="" disabled>selectioner options</option>
                            @foreach ($options as $k => $option)
                                @dump($option)
                                <option value="{{ $option->id }}" class="flex items-center h-8 font-black"
                                    @selected($propertyOptionsIds->contains($k))>
                                    {{ $option->name }}</option>
                            @endforeach
                        </select>
                        @error('option')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                        <div>
                            <label for="Option1"
                                class="block w-full cursor-pointer rounded-lg border border-gray-800 p-3 text-gray-100 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
                                tabindex="0">
                                <input class="sr-only" name="sold" id="Option1" @checked($property->sold)
                                    type="checkbox" tabindex="-1" name="option" />
                                <span class="text-sm"> Vendu </span>
                            </label>
                        </div>

                    </div>

                    <div class="mt-4 float-end">
                        <button type="submit"
                            class="inline-block w-full px-3 py-2 font-medium text-teal-500 rounded-lg hover:text-white hover:bg-teal-500 ring-2 ring-teal-500 sm:w-auto">
                            {{ $property->exists ? 'Modifier' : 'Ajouter' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
