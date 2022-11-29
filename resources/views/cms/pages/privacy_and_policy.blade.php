<x-cms-master-layout>
<x-breadcrumb :title="$pageTitle" :item="2" />

<x-form-base :title="'Privacy And Policy'" :route="'cms.privacy.update'">
    <x-text-area-field :label="'Description'" :name="'description'" :required="TRUE" :placeholder="'Description'" :value="$policy->description" />
        <x-button/>
</x-form-base>
</x-cms-master-layout>
