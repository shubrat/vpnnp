<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'"/>

    <x-error/>

    <x-form-base :route="'cms.services.update'" :requiredParam="$service" :title="$pageTitle" :subtitle="$subTitle" :method="'PUT'">

        <!-- Service Title -->
        <x-input-field :label="'Service Title'" :name="'title'" :col="12" :required="TRUE" :autofocus="TRUE" :value="$service->title"/>


        <!-- Service Description -->
        <x-text-area-field :label="'Short Description'" :row="3" :name="'sdescription'" :editor="FALSE" :col="12" :rows="6" :required="TRUE"  :value="$service->sdescription" :info="'Please add short description'" />


        <!-- Service Description -->
        <x-text-area-field :label="'Description'" :name="'description'" :col="12" :rows="6" :required="TRUE" :editor="true" :value="$service->description" :info="''"/>
            

        <!-- Service Main Image -->
        <x-file-browser-image :label="'Service Main Image'" :name="'image_url'" :defaultFile="$service->getFirstMediaUrl('image', 'thumb')" :info="'Use PNG Images'" :required="false" />

        <!-- Button -->
        <x-button :title="'Update'"/>

    </x-form-base>
    <x-file-manager />


</x-cms-master-layout>
