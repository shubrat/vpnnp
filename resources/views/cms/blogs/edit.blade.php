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


        <x-breadcrumb :title="$pageTitle" :item="3" :method="'Update'" />

        <x-error />

        <x-form-base :route="'cms.blogs.update'" :requiredParam="$blog" :title="$pageTitle" :subtitle="$subTitle"
            :method="'PUT'">


            <x-input-field name="title" label="Blog Title" placeholder="Blog Title Here..." col="6" required="true"
                :value="$blog->title" />
            <x-input-field name="source" label="Source" placeholder="Source Name..." col="6" :value="$blog->source" />

            <x-input-field name="source_url" label="Source Url" placeholder="Add Source Url (if any)" col="6"
                :value="$blog->source_url" />

            <x-input-field :label="'Tags'" :name="'tags'" :id="'tags'" :placeholder="'Tags'" :autofocus="TRUE"
                :dataRole="'tagsinput'" :col="'6'" :value="$blog->tags" />

            <x-text-area-field name="content" label="Blog Content" required="true" :value="$blog->content" />


            <!-- Blogs Image -->
            <x-file-browser-image :label="'Blogs Main Image'" :name="'image_url'"
                :defaultFile="$blog->getFirstMediaUrl('image','thumb')"  />


            <x-button />



        </x-form-base>
        <x-file-manager />
        @push('scripts')

        @endpush

    </x-cms-master-layout>