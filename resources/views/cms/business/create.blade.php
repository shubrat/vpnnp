<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'" />

    <x-error />



    <x-form-base :route="'site.business.store'" :title="$pageTitle" :subtitle="$subTitle">


        <!-- Name -->
        <x-input-field :label="'Name'" :name="'name'" :col="6" :required="TRUE" />
        <!-- Phone -->
        <x-input-field :label="'Phone'" :name="'phone'" :col="6" :required="TRUE" />
        
        <!-- Client Email -->
        <x-input-field :label="'Your  Email'" :name="'email'" :col="6" :required="TRUE" />
         <!-- Client Address -->
         <x-input-field :label="'Your Address'" :name="'address'" col="6"  :required="TRUE" />

        <!-- Distance -->
        <x-input-field :label="'Distance'" :name="'distance'" :col="6" :required="TRUE" />
        <!-- Name -->
        <x-input-field :label="'Delivery City'" :name="'deliveryCity'" :col="6" :required="TRUE" />


        <!-- Client Contact Number -->
        <x-input-field :label="'Weight'" :name="'weight'" :col="6" :required="TRUE" />

        <x-select-field :label="'Service Type'" :name="'service_id'" :placeholder="'Select Service Type'" :col="6"
            :required="TRUE" :values="$serviceTypes" />

        <x-input-field :label="'Subject'" :name="'subject'" :col="6" :required="TRUE" />


       
        <x-text-area-field :label="'Description'" :name="'usermessage'" :col="12" :rows="6"
            :id="'exampleFormControlTextarea1'" :editor="false" />
        <x-button />


        </x-form-base>
    <x-file-manager />
</x-cms-master-layout>