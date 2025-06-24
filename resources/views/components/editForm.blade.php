
<!-- Update Modal -->
<div id="updateModal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
  <div id="modalContent" class="bg-white rounded-xl p-6 w-full max-w-md transition-all duration-300 scale-90 opacity-0">
    <h2 class="text-xl font-semibold mb-4">Update Category</h2>
    
    <form id="updateForm">
      @csrf
      @method('PUT')

      <input type="hidden" id="category_id">

      <div class="mb-4">
        <label class="block text-gray-700">Name</label>
        <input id="category_name" type="text" class="w-full p-2 border rounded" />
      </div>

      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
      </div>
    </form>
  </div>
</div>
