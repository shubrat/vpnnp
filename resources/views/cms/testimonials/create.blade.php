<x-cms-master-layout :pageTitle="$pageTitle">
    @push('styles')
    <style>
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>

    @endpush

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Create'" />
    <x-error />
    <x-form-base :route="'cms.testimonials.store'" :title="$pageTitle" :subTitle="$subTitle">

        <!-- Testimonials CLient Name -->
        <x-input-field :label="'Client Name'" :name="'name'" :placeholder="'Testimonial Title Here...'"
            :required="true" :autofocus="true"  :col="6"/>


        <!--  Position title -->
        <x-input-field :label="'Position and Company details'" :name="'position'" :col="6" />

        <!-- Description -->
        <x-text-area-field :label="'Testimonial Description'" :name="'description'" :required="true" :editor="FALSE" :rows="6" :info="'Please add atleast 150 charecter '" />

        <!-- Testimonials image -->
        <x-file-browser-image :label="'Client Image'" :name="'image'" />

        <x-button />

    </x-form-base>
    <x-file-manager />

</x-cms-master-layout>