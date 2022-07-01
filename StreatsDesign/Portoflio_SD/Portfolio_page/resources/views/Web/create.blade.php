
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('Web.store') }}" method="POST" >
                        @csrf
                        <div class=>
                            <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                                <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">ADD WEBSITE POST</h1>
                                <div class="space-y-4">
                                    <div>
                                        <label for="title" class="text-lx font-serif">Title:</label>
                                        <input type="text" placeholder="title" name="title" id="title" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                                    </div>
                                    <div>
                                        <label for="description" class="block mb-2 text-lg font-serif">Omschrijving:</label>
                                        <textarea id="description" cols="30" rows="10" placeholder="whrite here.." name="description" class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md"></textarea>
                                    </div>
                                    <div>
                                        <label for="name" class="text-lx font-serif">Naam:</label>
                                        <input type="text" placeholder="name" id="name" name="name" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                                    </div>
                                    <div>
                                        <label for="email" class="text-lx font-serif">Email:</label>
                                        <input type="text" placeholder="name" id="email" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md" />
                                    </div>
                                    <button class=" px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  " type="submit" >ADD WEBSITE POST</button>

                                        <button class="bg-blue hover:bg-blue-light text-white font-bold py-2 px-4 w-full inline-flex items-center">
                                            <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                            </svg>
                                            <span class="ml-2 text-black">Header Image</span>
                                        </button>
                                        <input class="cursor-pointer absolute block py-2 px-4 w-full opacity-0 pin-r pin-t"  type="file"  name="documents[]" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>