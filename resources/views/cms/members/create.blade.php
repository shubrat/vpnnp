
<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="3" :method="'Create'"/>

    <x-error />
<x-form-base :route="'cms.members.store'" :title="$pageTitle" :subtitle="$subTitle">

    <!-- Memebr Name -->
    <x-input-field :label="'Member Name'" :name="'name'" :col="6" :required="TRUE" />

    <!-- Designation Name -->
    <x-input-field :label="'Designation Name'" :name="'designation'" :col="6" :required="TRUE" />

    <!-- About Member  -->
    <x-text-area-field :label="'About Member '" :editor="FALSE" :name="'about'" :col="12" :rows="5" :required="TRUE"   :info="'short description about member'" />


    <!-- twitter Name -->
    <x-input-field :label="'Facebook URL'" :name="'facebook'" :col="6"  />
    <x-input-field :label="'Twitter URL'" :name="'twitter'" :col="6"  />

    <!-- linkdin Name -->
    <x-input-field :label="'Instagram URL'" :name="'instagram'" :col="12" :required="FALSE"  />

    <!-- Member Photo's  -->
    <x-file-browser-image :label="'Member\'s photo'" :name="'image_url'" />
    <x-button  />
</x-form-base>
<x-file-manager />

</x-cms-master-layout>