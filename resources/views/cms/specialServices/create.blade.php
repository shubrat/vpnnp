<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2"/>

    <x-error/>

    <x-form-base :route="'cms.specialServices.store'" :title="$pageTitle" :subtitle="$subTitle">
        
        <!-- Service Title -->
        <x-input-field :label="'Special Service Title'" :name="'title'" :col="12" :required="TRUE" :autofocus="TRUE"/>


        <!-- Service Description -->
        <x-text-area-field :label="'Description'" :name="'description'" :editor="'False'" :col="12" :rows="6" :required="TRUE" />

        <!-- Service Main Image -->
        <x-file-browser-image :label="'Specia small Image'" :name="'image_url'"/>

        <!-- Button -->
        <x-button :title="'Save'"/>

    </x-form-base>

    <x-file-manager />
    

   


</x-cms-master-layout>
