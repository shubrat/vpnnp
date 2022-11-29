<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'"/>

    <x-error/>

    <x-form-base :route="'cms.sliders.update'" :requiredParam="$slider" :title="$pageTitle" :subtitle="$subTitle" :method="'PUT'">

        <!-- slider Title -->
        <x-input-field :label="'Slider Title'" :name="'title'" :col="12" :required="TRUE" :autofocus="TRUE" :value="$slider->title"/>

        <!-- slider Description -->
        <x-text-area-field :label="'Description'" :name="'description'" :col="12" :rows="6" :required="TRUE" :editor="false" :value="$slider->description" :info="'Use #BR# to break the line'"/>
            
        <!-- slider Main Image -->
        <x-file-browser-image :label="'Slider Main Image'" :name="'image_url'" :defaultFile="$slider->getFirstMediaUrl('image', 'thumb')" :info="'Use PNG Images, size 1920 X 1000'" :required="false" />

        <!-- Button -->
        <x-button :title="'Update'"/>

    </x-form-base>
    <x-file-manager />


</x-cms-master-layout>
