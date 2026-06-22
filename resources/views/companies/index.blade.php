<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Companies Management') }}
            </h2>
            <a href="{{ route('companies.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                + Add New Company
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Success!',
                            text: "{{ session('success') }}",
                            icon: 'success',
                            timer: 2500, // Automatically closes after 2.5 seconds
                            showConfirmButton: false, // Hides the "OK" button for a cleaner look
                            toast: true, // Makes it appear as a sleek notification toast
                            position: 'top-end', // Corners it nicely at the top right
                            background: '#fff',
                            iconColor: '#10b981' // Matches your Emerald green theme
                            
                        });
                    });
                </script>
            @endif
            <!-- @if (session('success'))
                <div id="flash-message" class="mb-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="bg-emerald-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between transition-opacity duration-500">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Logo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Website</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @forelse ($companies as $company)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}"
                                            class="w-12 h-12 object-cover rounded">
                                    @else
                                        <div
                                            class="w-12 h-12 bg-gray-200 flex items-center justify-center text-xs text-gray-500 rounded">
                                            No Logo</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $company->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $company->email ?? '-' }}
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if($company->website)
                                                    <a href="{{ $company->website }}" target="_blank"
                                                        class="text-blue-600 hover:underline">{{ $company->website }}</a>
                                                @else - @endif
                                            </td> -->
                                <!-- <td>
                                                <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:underline">
                                                    {{ $company->website }}
                                                </a>
                                            </td> -->

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="max-w-xs truncate" title="{{ $company->website }}">
                                        <a href="{{ $company->website }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            {{ $company->website }}
                                        </a>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this company?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No companies found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                // Wait 3000ms (3 seconds), then start fading out
                setTimeout(() => {
                    flashMessage.style.opacity = '0';
                    // Remove it from the layout entirely after the fade animation finishes
                    setTimeout(() => flashMessage.remove(), 500);
                }, 3000);
            }
        });
    </script>
</x-app-layout>