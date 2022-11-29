<x-cms-master-layout>
    <x-breadcrumb :title="$pageTitle" :item="2"/>

<x-form-base :title="'Location '" :route="'cms.location.update'">

    <x-text-area-field :label="'Add Map Link'" :name="'frame'"  :rows='6' :editor="false" :required="TRUE"  :value="$location->frame" />
    <x-button />
</x-form-base>

</x-cms-master-layout>
