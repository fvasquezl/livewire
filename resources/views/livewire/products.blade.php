<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Products') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your products') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <flux:modal.trigger name="create-product">
        <flux:button class="mt-4">Create Product</flux:button>
    </flux:modal.trigger>

    @session('success')
        <div
            x-data="{show:true}"
            x-show="show"
            x-init="setTimeout(() => {show = false},3000)"
            class="fixed top-5 right-5 bg-green-600 text-white text-sm p-4 rounded-lg shadow-lg z-50"
            role="alert">
            <p>{{$value}}</p>
        </div>
    @endsession('success')

    <livewire:create-product/>
    <livewire:edit-product/>

    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Product Name</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-b-gray-700 border-b-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$product->title}}
                </th>
                <td class="px-6 py-4">{{$product->price}}</td>
                <td class="px-6 py-4">{{$product->description}}</td>
                <td class="px-6 py-4">
                    <flux:button wire:click="edit({{$product->id}})">Edit</flux:button>
                    <flux:button variant="danger" wire:click="delete({{$product->id}})">Delete</flux:button>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">
                        No record
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>


    <flux:modal.trigger name="delete-profile">
        <flux:button variant="danger">Delete</flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-product" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete product?</flux:heading>

                <flux:text class="mt-2">
                    <p>You're about to delete this product.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="deleteProduct()">Delete product</flux:button>
            </div>
        </div>
    </flux:modal>

</div>
