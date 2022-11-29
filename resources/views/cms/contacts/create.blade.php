<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="3" :method="'Update'"/>

    <x-error />

        
        
    <x-form-base :route="'site.contact.store'" :title="$pageTitle" :subtitle="$subTitle">


        <!-- Name -->
        <x-input-field :label="'Name'" :name="'name'" :col="6" :required="TRUE"  />

        <!-- Client Email -->
        <x-input-field :label="'Your  Email'" :name="'email'" :col="6" :required="TRUE"  />

        <!-- Client Contact Number -->
        <x-input-field :label="'Client Contact Number'" :name="'phone'" :col="6" :required="TRUE"
             />

        <!-- Client Address -->
        <x-input-field :label="'Client Address'" :name="'address'" :col="6"  />

            <!-- Name -->
            <x-input-field :label="'Subject'" :name="'subject'" :col="12" :required="TRUE"  />
            <x-text-area-field :label="'Message'" :name="'usermessage'" :editor="False" :required="TRUE"  />
        <x-button />

    </x-form-base>
    <x-file-manager />
</x-cms-master-layout>
