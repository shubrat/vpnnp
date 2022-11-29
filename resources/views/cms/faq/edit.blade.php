<x-cms-master-layout>
    <x-breadcrumb :title="$pageTitle" :item="1" :method="'Update'" />
    <x-form-base :title="'Update FAQ'" :requiredParam="$faq" :route="'cms.faq.update'" :method="'PUT'" >

        <x-input-field :label="'faq'" :name="'question'" :value="$faq->question" :required="TRUE" :placeholder="'Please Input Faq'" />
        <x-text-area-field :label="'Description'" :name="'answer'" :value="$faq->answer" :required="TRUE" :placeholder="'Description'" />

    <x-button :title="'Update'"/>
    </x-form-base>

    </x-cms-master-layout>
