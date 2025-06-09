<div xmlns:flux="http://www.w3.org/1999/html">
    <flux:modal name="edit-product" class="md:w-800">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update Product</flux:heading>
                <flux:text class="mt-2">Update your product.</flux:text>
            </div>

            <flux:input label="Title" wire:model="title" placeholder="Product Title" />
            <flux:input label="Price" wire:model="price" placeholder="Product Price" />
            <flux:textarea label="Description" wire:model="description" placeholder="Product Description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update">Update changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
