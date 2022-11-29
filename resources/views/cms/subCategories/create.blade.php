this is shown in model
<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2"/>

    <x-error/>

    <x-form-base :route="'cms.subCategories.store'" :title="$pageTitle" :subtitle="$subTitle">
        
        <!-- SubCategory Title -->
        <x-input-field :label="'Title'" :name="'title'" :col="12" :required="TRUE" :autofocus="TRUE"/>


        <x-select-field :label="'Show Type'" :placeholder="'Select the show type'" :name="'category_id'" :col="12" :required="TRUE"
        :autofocus="TRUE" :values="$categories" />

        <!-- Button -->
        <x-button :title="'Save'"/>

    </x-form-base>    
</x-cms-master-layout>
