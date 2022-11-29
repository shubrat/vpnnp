<x-cms-master-layout>
    <x-breadcrumb :title="$pageTitle" :item="2"/>

<x-form-base :title="'About Us'" :route="'cms.about.update'">
    
        <!-- Client Organization Title -->
        <x-input-field :label="'Title '" :name="'title'" :col="6" :required="TRUE" :value="$about->title" />
    <x-text-area-field :label="'Description'" :name="'description'" :required="TRUE" :placeholder="'Description'" :value="$about->description" />
    <x-button />
</x-form-base>

</x-cms-master-layout>
