<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="3" :method="'Update'" />

    <x-error />
    <x-form-base :route="'cms.partners.store'" :title="$pageTitle" :subtitle="$subTitle">
        <!-- Partner Name -->
        <x-input-field :label="'Partner Name'" :name="'name'" :col="6" :required="TRUE" />
        
            <!-- Partner Url -->
        <x-input-field :label="'Partner Url'" :name="'url'" :col="6" :required="false"  />

        <!-- Partner  Main Logo -->
        <x-file-browser-image :label="'Partners\'s Logo'" :name="'image_url'" />
        </div>
        <x-button />

    </x-form-base>
    <x-file-manager />
</x-cms-master-layout>