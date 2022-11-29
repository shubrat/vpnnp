
<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="3" :method="'Update'"/>

    <x-error />

    <x-form-base :route="'cms.members.update'" :requiredParam="$member" :title="$pageTitle" :subtitle="$subTitle"
        :method="'PUT'">

    <!-- Memebr Name -->
    <x-input-field :label="'Member Name'" :name="'name'" :col="6" :required="TRUE" :value="$member->name" />

    <!-- Designation Name -->
    <x-input-field :label="'Designation Name'" :name="'designation'" :col="6" :required="TRUE" :value="$member->designation"/>

    <!-- About Member  -->
    <x-text-area-field :label="'About Member '" :editor="FALSE" :name="'about'" :col="12" :rows="5" :required="TRUE"  :value="$member->about" :info="'short description about member'" />


    <!-- twitter Name -->
    <x-input-field :label="'Twitter URLS'" :name="'twitter'" :col="6" :required="TRUE"  :value="$member->twitter"/>

    <!-- linkdin Name -->
    <x-input-field :label="'Linkdin URL'" :name="'linkdin'" :col="6"  :value="$member->linkdin" />
     <!-- Member Photo's  -->
     <x-file-browser-image :label="'Member\'s Logo'" :name="'image_url'"
     :defaultFile="$member->getFirstMediaUrl('image', 'thumb')" /> 
     <x-button :title="'Update'" />

</x-form-base>
<x-file-manager />

</x-cms-master-layout>