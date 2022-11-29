<x-cms-master-layout>
    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'" />

    <x-form-base :title="'Social Setting'" :route="'cms.social.update'" >

        <x-input-field :label="'Facebook'" :value="$social->facebook" :name="'facebook'" :required="TRUE" :placeholder="' Input Facebook Link'" />
        <x-input-field :label="'Twitter'" :value="$social->twitter" :name="'twitter'" :required="TRUE" :placeholder="' Input Twitter Link'" />
        <x-input-field :label="'Instagram'" :value="$social->instagram" :name="'instagram'" :required="TRUE" :placeholder="' Input Instagram Link'" />
        <x-input-field :label="'Linkedin'" :value="$social->linkedin" :name="'linkedin'" :required="TRUE" :placeholder="' Input Linkedin Link'" />
        <x-input-field :label="'Youtube'" :value="$social->youtube" :name="'youtube'" :required="TRUE" :placeholder="' Input YouTube Link'" />


            <x-button :title="'Update'" />
    </x-form-base>
    </x-cms-master-layout>
