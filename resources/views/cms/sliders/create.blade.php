<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="3"/>

    <x-error/>

    <x-form-base :route="'cms.sliders.store'" :title="$pageTitle" :subtitle="$subTitle">
        
        <!-- Service Title -->
    
        <x-input-field :label="'Slider Title'" :name="'title'" :col="12" :required="TRUE" :info="'Only 40 charecter are allowed'" :max="'40'"  :autofocus="TRUE" />


        <!-- Service Description -->
        <x-text-area-field :label="'Description'" :name="'description'" :editor="FALSE"  :col="12"  :max="'150'" :info="'Only 150 charecter are allowed'"  :rows="6" :required="TRUE" />

        <!-- Service Main Image -->
        <x-file-browser-image :label="'Slider small Image'" :sid="'image_url'" :name="'image_url'" :info="' Use png image, size 1920 X 1000'"/>

        <!-- Button -->
        <x-button :title="'Save'"/>

    </x-form-base>

    <x-file-manager />
    

   


</x-cms-master-layout>
