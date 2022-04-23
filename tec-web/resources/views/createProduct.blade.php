<x-app-layout>
<div class="max-w-7xl mx-auto bg-white py-8 my-4 border border-gray-200">
<div class="my-0 overflow-x-auto md:mx-0 xl:mx-8">
    <div class="flex justify-between">
        <h1 class="font-medium text-3xl">Create product</h1>
    </div>

    <form action="{{ route('createProduct') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="product_id" id="product_id" value=""/>
        <div class="mt-8 grid lg:grid-cols-2 gap-8 gap-x-16">
            <div>
                <label for="image" class="text-sm text-gray-700 block mb-1 font-medium">Image</label>
                <img class="h-80" src="" alt=""/>
            </div>

            <div>
                <label for="upload" class="text-sm text-gray-700 block mb-1 font-medium">Upload new image</label>
                <input class="py-8" type="file" accept=".jpeg,.jpg,.png,.webp" name="image_upload" id="upload" required="required">
            </div>

            <div>
                <label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Product Name</label>
                <input type="text" name="name" id="name" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="" value="" />
            </div>

            <div>
                <label for="price" class="text-sm text-gray-700 block mb-1 font-medium">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="" value="" />
            </div>

            <div>
                <label for="stock" class="text-sm text-gray-700 block mb-1 font-medium">Stock</label>
                <input type="number" name="stock" id="stock" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="" value=""/>
            </div>

            <div>
                <label for="category" class="text-sm text-gray-700 block mb-1 font-medium">Category</label>
                <input type="text" name="category_id" id="category" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder="" value="" />
            </div>

            <div class="col-span-full">
                <label for="description" class="text-sm text-gray-700 block mb-1 font-medium">Description</label>
                <textarea cols="50" rows="8" type="text" name="description" id="description" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" placeholder=""></textarea>
            </div>

        </div>

      <div class="flex justify-end space-x-4 mt-8">
        <!-- Secondary -->
        <button type="reset" class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Reset</button>

        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>
      </div>
    </form>
  </div>
  </div>
</x-app-layout>
