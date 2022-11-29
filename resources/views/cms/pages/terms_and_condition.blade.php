<x-cms-master-layout>
<x-breadcrumb :title="$pageTitle" :item="2"/>

<x-form-base :title="'Term&Condition'" :route="'cms.term.update'">
    <x-text-area-field :label="'Description'" :name="'description'" :required="TRUE" :placeholder="'Description'" :value="$term->description" />
    <x-button />
</x-form-base>

</x-cms-master-layout>
