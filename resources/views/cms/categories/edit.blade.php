<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'"/>

    <x-error/>

    <x-form-base :route="'cms.categories.update'" :requiredParam="$category" :title="$pageTitle" :subtitle="$subTitle" :method="'PUT'">

        <!-- category Title -->
        <x-input-field :label="'Category Name'" :name="'title'" :col="12" :required="TRUE" :autofocus="TRUE" :value="$category->title"/>
        
        
        <!-- Button -->
        <x-button :title="'Update'"/>

    </x-form-base>
    <x-file-manager />


</x-cms-master-layout>
