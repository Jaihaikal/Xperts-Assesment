<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <div class="mb-4">
                        <x-input-label class="block text-gray-700 text-sm font-bold mb-2" for="name">Company Name *</x-input-label>
                        <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </x-text-input>
                    </div>

                    <div class="mb-4">
                        <x-input-label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address</x-input-label>
                        <x-text-input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </x-text-input>
                    </div>

                    <div class="mb-4">
                        <x-input-label class="block text-gray-700 text-sm font-bold mb-2" for="website">Website URL</x-input-label>
                        <x-text-input type="url" name="website" id="website" value="{{ old('website') }}" placeholder="https://example.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label class="block text-gray-700 text-sm font-bold mb-2" for="logo">Company Logo (Min dimensions: 100x100px)</x-input-label>
                        <x-text-input type="file" name="logo" id="logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </x-text-input>
                    </div>

                    <div class="flex items-center justify-between">
                        <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Save Company
                        </x-primary-button>
                        <a href="{{ route('companies.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>