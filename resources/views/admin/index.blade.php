<x-app-layout>
    <div class="p-6">
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                <tr class="text-left text-black uppercase text-sm">
                    <th class="py-3 px-4 border-b">ID</th>
                    <th class="py-3 px-4 border-b">Artist</th>
                    <th class="py-3 px-4 border-b">Song</th>
                    <th class="py-3 px-4 border-b">Year</th>
                    <th class="py-3 px-4 border-b">User</th>
                    <th class="py-3 px-4 border-b">Created</th>
                    <th class="py-3 px-4 border-b">Updated</th>
                    <th class="py-3 px-4 border-b text-center">Status</th>
                    <th class="py-3 px-4 border-b text-center">Edit</th>
                    <th class="py-3 px-4 border-b text-center">Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($artists as $artist)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $artist->id }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900">{{ $artist->name }}</td>
                        <td class="py-3 px-4">{{ Str::limit($artist->song, 40) }}</td>
                        <td class="py-3 px-4">{{ $artist->year }}</td>
                        <td class="py-3 px-4">{{ $artist->user->name ?? 'Unknown' }}</td>
                        <td class="py-3 px-4">{{ $artist->created_at->format('d-m-Y') }}</td>
                        <td class="py-3 px-4">{{ $artist->updated_at->format('d-m-Y') }}</td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('artists.toggleStatus', $artist->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="px-2 py-1 text-xs font-semibold rounded-full
                    {{ $artist->status == 1 ? 'bg-blue-100 text-black' : 'bg-blue-800 text-white' }}">
                                    {{ $artist->status == 1 ? 'Published' : 'Unpublished' }}
                                </button>
                            </form>
                        </td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('artists.edit', $artist->id) }}"
                               class="text-blue-600 hover:underline">Edit</a>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <form method="POST" action="{{ route('artists.destroy', $artist->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this artist?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
