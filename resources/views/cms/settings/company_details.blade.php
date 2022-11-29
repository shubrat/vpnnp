<x-cms-master-layout>
    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'" />

    <x-form-base :title="'Update Company Detail'" :route="'cms.detail.store'" >

        <x-input-field :label="'Address'" :value="$contact_detail->address" :name="'address'"  :required="TRUE" :col="'6'" :placeholder="' Input Address Link'" />
        <x-input-field :label="'Alternative Address'" :value="$contact_detail->secondAddress"  :name="'secondAddress'" :col="'6'" :required="False" :placeholder="' Input alternative  address'" />
        <x-input-field :label="'Phone'" :value="$contact_detail->phone" :name="'phone'"  :required="TRUE" :col="'6'" :placeholder="' Input Phone Number Link'" />
        <x-input-field :label="'Alternative Phone'" :value="$contact_detail->secondPhone"   :name="'secondPhone'" :col="'6'" :required="False" :placeholder="' Input alternative Phone Number'" />
        <x-input-field :label="'Email'" :value="$contact_detail->email" :name="'email'"   :required="TRUE" :col="'6'" :placeholder="' Input Email address'" />
        <x-input-field :label="'Alternative Email'" :value="$contact_detail->secondEmail" :name="'secondEmail'" :col="'6'" :required="False" :placeholder="' Input alternative email addrss'" />
            <x-button :title="'Update'" />
    </x-form-base>
    </x-cms-master-layout>
