<x-cms-master-layout>

    @push('styles')
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #0d6efd;
            padding: 0.2rem;
        }
    </style>
    @endpush

    <x-breadcrumb :title="$pageTitle" :item="2" />



    <x-error />

    <x-form-base :route="'cms.blogs.store'" :title="$pageTitle" :subtitle="$subTitle">




        <x-input-field name="title" label="Blog Title" placeholder="Blog Title Here..." col="6" required="true" />

        <x-input-field name="source" label="Source" placeholder="Source Name..." col="6" />

        <x-input-field name="source_url" label="Source Url" placeholder="Add Source Url (if any)" col="6" />

        <x-input-field :label="'Tags'" :name="'tags'" :id="'tags'" :placeholder="'Tags'" :autofocus="TRUE"
            :dataRole="'tagsinput'" :col="'6'" />
        <x-text-area-field :name="'content'" :label="'Blog Content'" :required="true" />


        <!-- Blogs Image -->
        <x-file-browser-image :label="'Blogs Main Image'" :name="'image_url'" />

        <x-button />



    </x-form-base>
    <x-file-manager />

 

</x-cms-master-layout>