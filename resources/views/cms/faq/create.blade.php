<x-cms-master-layout>
<x-breadcrumb :title="$pageTitle" :item="1" />

<x-form-base :title="'create FAQ'" :route="'cms.store.faqs'" >

        <x-input-field :label="'faq'" :name="'question'" :required="TRUE" :placeholder="'Please Input Faq'" />
    <x-text-area-field :label="'Description'" :editor="FALSE" :name="'answer'" :required="TRUE" :placeholder="'Description'" />

<x-button/>
</x-form-base>

</x-cms-master-layout>
