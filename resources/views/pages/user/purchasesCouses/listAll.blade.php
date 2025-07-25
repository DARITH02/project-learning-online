@extends("app.app")
@section('contents')

<div class="bg-white shadow-md rounded-xl overflow-hidden">
    <div class="px-6 py-4 border-b">
        <h2 class="text-xl font-semibold">Purchases</h2>
        <p class="text-gray-600 text-sm">A list of all course purchases in your system.</p>
    </div>

    <div class="p-4 overflow-x-auto">
        <table class="min-w-full text-left text-sm">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Course</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Purchase Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($filteredPurchases as $purchase)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">{{ $purchase->id }}</td>
                        <td class="px-4 py-2">{{ getUserName($purchase->user_id) }}</td>
                        <td class="px-4 py-2">{{ getCourseName($purchase->course_id) }}</td>
                        <td class="px-4 py-2">${{ number_format($purchase->price, 2) }}</td>
                        <td class="px-4 py-2">
                            @if ($purchase->purchased_at)
                                <span class="inline-flex items-center px-2 py-0.5 rounded bg-blue-100 text-blue-800 text-xs font-medium">Completed</span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded bg-gray-100 text-gray-800 text-xs font-medium">Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if ($purchase->purchased_at)
                                {{ \Carbon\Carbon::parse($purchase->purchased_at)->format('M d, Y H:i') }}
                            @else
                                Not completed
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <button 
                                    class="border border-gray-300 rounded px-2 py-1 text-sm hover:bg-gray-100"
                                    onclick="openEditDialog({{ $purchase->id }})"
                                >
                                    ✏️
                                </button>

                                <!-- Delete Button with Confirmation Modal -->
                                <button 
                                    onclick="confirmDelete({{ $purchase->id }})"
                                    class="border border-gray-300 rounded px-2 py-1 text-sm text-red-600 hover:bg-red-50"
                                >
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="delete-confirm-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
        <h3 class="text-lg font-semibold mb-2">Are you sure?</h3>
        <p class="text-sm text-gray-600 mb-4">This action cannot be undone. This will permanently delete the purchase record.</p>
        <div class="flex justify-end space-x-2">
            <button onclick="closeDeleteModal()" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
            <form id="delete-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        const form = document.getElementById('delete-form');
        form.action = `/purchases/${id}`; // adjust route if needed
        document.getElementById('delete-confirm-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-confirm-modal').classList.add('hidden');
    }

    function openEditDialog(id) {
        // your logic here to open edit form or modal
        console.log("Edit purchase ID:", id);
    }
</script>
@endsection

