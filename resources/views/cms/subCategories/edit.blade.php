<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="'Update'"/>

    <x-error/>

    <x-form-base :route="'cms.subCategories.update'" :requiredParam="$subCategories" :title="$pageTitle" :subtitle="$subTitle" :method="'PUT'">

        <!-- category Title -->
        <x-input-field :label="'Category Title'" :name="'title'" :col="12"  :autofocus="TRUE" :value="$subCategories->title" />
        
        
            <div class="col-lg-12">
                <div class="mb-3">
                    
                    <select class="form-control" name="category_id" id="exampleFormControlSelect2">

                        <option disabled="" selected="">---Select Sub Category --- </option>

                        @foreach ($categories as $category) 
                        <option value="{{ $category->id }}" @if($category->id == $subCategories->category_id) selected @endif>{{ $category->title }}</option>

                        @endforeach
                    </select>
           
            <!-- Button -->
        <x-button :title="'Update'" />

    </x-form-base>
</x-cms-master-layout>
