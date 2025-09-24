@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Your Companies</h1>
            <div style="display: flex; gap: 10px;">
            <a href="{{ route('companies.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                + Create Company
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
        </div>

        @if ($companies->isEmpty())
            <p class="text-gray-600">You have no companies yet. Click “Create Company” to get started.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-700">Name</th>
                            <th class="px-4 py-2 text-left text-gray-700">Address</th>
                            <th class="px-4 py-2 text-left text-gray-700">Industry</th>
                            <th class="px-4 py-2 text-center text-gray-700">Active</th>
                            <th class="px-4 py-2 text-center text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $company->name }}</td>
                                <td class="px-4 py-2">{{ $company->address }}</td>
                                <td class="px-4 py-2">{{ $company->industry }}</td>
                                <td class="px-4 py-2 text-center">
                                    @if ($activeCompanyId === $company->id)
                                        <span
                                            class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">Active</span>
                                    @else
                                        <form action="{{ route('companies.switch', $company) }}" method="POST"
                                            class="switch-form">
                                            @csrf
                                            <button type="submit"
                                                class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Switch</button>
                                        </form>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border space-x-1" style="display: flex; align-items: center; justify-content: center; ">
                                    <a href="{{ route('companies.edit', $company) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                        class="inline-block delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.switch-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to switch company?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, switch it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
