<x-cms-master-layout>
    <x-breadcrumb :title="$pageTitle" :item="3" :method="'Update'" />


    <x-error />

    <x-form-base :route="'cms.partners.update'" :requiredParam="$partner" :title="$pageTitle" :subtitle="$subTitle"
        :method="'PUT'">

        <!-- Partner Name -->
        <x-input-field :label="'Partner Name'" :name="'name'" :col="6" :required="TRUE" :value="$partner->name"  />

        <!-- Partner Url -->
        <x-input-field :label="'Partner Url'" :name="'url'" :col="6" :required="TRUE" :value="$partner->url"  />


        <!-- Partner  Main Logo -->
        <x-file-browser-image :label="'Partners\'s Logo'" :name="'image_url'" :defaultFile="$partner->getFirstMediaUrl('image', 'thumb')" :info="'Use JPG or PNG Images'" :required="false" />
        </div>
        <x-button :title="'Update'" />



    </x-form-base>
    <x-file-manager />
</x-cms-master-layout>