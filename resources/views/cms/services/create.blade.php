<x-cms-master-layout>
    @push('styles')
    <style type="text/css">
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
    @endpush
    <x-breadcrumb :title="$pageTitle" :item="2" />

    <x-error />

    <x-form-base :route="'cms.products.store'" :title="$pageTitle" :subtitle="$subTitle">

        <!-- Service Title -->
        <x-input-field :label="'Product Name'" :name="'title'" :col="6" :required="TRUE" :autofocus="TRUE" />

        <!-- SKU -->
        <x-input-field :label="'SKU'" :name="'sku'" :col="6" :placeholder="'Please enter sku here.'" :required="true"
            :autofocus="true" :required="true" :autofocus="true" />

        <x-select-field-name :label="'Categories'" :name="'category_id'" :placeholder="'Select Category.'">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach
        </x-select-field-name>


        <!-- Unit -->
        <x-input-field :label="'Unit'" :name="'units'" :col="6" :placeholder="'Unit (e.g. KG, Pcs ets)'"
            :required="true" :autofocus="true" :step="1" />

        <!-- Tags -->
        <x-input-field :label="'Tags'" :name="'tags'" :col="6" :id="'tags'" :placeholder="'Tags'" :autofocus="TRUE"
            :dataRole="'tagsinput'" />
        <!-- Cost Price -->
        <x-input-field :type="'number'" :label="'Cost Price'" :name="'cost_price'" :col="6"
            :placeholder="'Please enter Cost Price here.'" :required="true" :autofocus="true" :step="0.01" :col="'6'" />

        <!-- Selling Price -->
        <x-input-field :type="'number'" :label="'Selling Price'" :name="'selling_price'" :col="6"
            :placeholder="'Please enter Selling Price here.'" :required="true" :autofocus="true" :step="0.01"
            :col="'6'" />


        <!-- Product Description -->
        <x-text-area-field :label="'Product Description'" :name="'description'" :col="12" :rows="6" :required="TRUE" />

        <!-- Product Main Image -->
        <x-file-browser-image :label="'Product Main Image'" :name="'image_url'" />

        <!-- Button -->
        <x-button :title="'Save'" />

    </x-form-base>

    <x-file-manager />





</x-cms-master-layout>