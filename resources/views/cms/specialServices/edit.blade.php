<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'"/>

    <x-error/>

    <x-form-base :route="'cms.specialServices.update'" :requiredParam="$specialService" :title="$pageTitle" :subtitle="$subTitle" :method="'PUT'">

        <!-- specialService Title -->
        <x-input-field :label="'specialService Title'" :name="'title'" :col="12" :required="TRUE" :autofocus="TRUE" :value="$specialService->title"/>

        <!-- specialService Description -->
        <x-text-area-field :label="'Description'" :name="'description'" :col="12" :rows="6" :required="TRUE" :editor="true" :value="$specialService->description" :info="'Use #BR# to break the line'"/>
            
        <!-- specialService Main Image -->
        <x-file-browser-image :label="'Special Service Main Image'" :name="'image_url'" :defaultFile="$specialService->getFirstMediaUrl('image', 'thumb')" :info="'Use PNG Images'" :required="false" />

        <!-- Button -->
        <x-button :title="'Update'"/>

    </x-form-base>
    <x-file-manager />


</x-cms-master-layout>
