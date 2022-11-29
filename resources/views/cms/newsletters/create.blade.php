<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'" />

    <x-error />



    <x-form-base :route="'newsletters.subscribe'" :title="$pageTitle" :subtitle="$subTitle">


                <!-- Client Email -->
        <x-input-field :label="'Your  Email'" :name="'email'" :col="6" :required="TRUE" />
            <x-button />


        </x-form-base>
    <x-file-manager />
</x-cms-master-layout>