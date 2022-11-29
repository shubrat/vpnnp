<x-cms-master-layout>
    @push('styles')
    <style type="text/css">
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
    @endpush
    <x-breadcrumb :title="$pageTitle" :item="2" />

    <x-error />

    <x-form-base :route="'cms.products.store'" :title="$pageTitle" :subtitle="$subTitle" class="bg-soft-light">

        <!-- Service Title -->
        <x-input-field :label="'Product Name'" :name="'title'" :col="6" :required="TRUE" :autofocus="TRUE" />

        <!-- SKU -->
        <x-input-field :label="'SKU'" :name="'sku'" :col="6" :placeholder="'Please enter sku here.'" :required="true"
            :autofocus="true" :required="true" :autofocus="true" />
                <!-- categories -->
        <x-select-field-name :label="'Categories'" :name="'category_id'" :col="6" :placeholder="'Select Category.'">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </x-select-field-name>


        <!-- Tags -->
        <x-input-field :label="'Tags'" :name="'tags'" :col="6" :id="'tags'" :placeholder="'Tags'" :autofocus="TRUE"
            :dataRole="'tagsinput'" />
    

        <!-- Unit -->
        <x-input-field :label="'Unit'" :name="'units'" :col="6" :placeholder="'Unit (e.g. KG, Pcs ets)'"
            :required="true" :autofocus="true" :step="1" />
        <!-- Quantity -->
        <x-input-field :type="'number'" :label="'Quantity'" :name="'quantity'" :col="6"
            :placeholder="'Please enter Quantity here.'" :required="true" :autofocus="true" :step="1" :col="'6'" />

        <!-- Cost Price -->
        <x-input-field :type="'number'" :label="'Cost Price'" :name="'cost_price'" :col="6"
            :placeholder="'Please enter Cost Price here.'" :required="true" :autofocus="true" :step="0.01" :col="'6'" />

        <!-- Selling Price -->
        <x-input-field :type="'number'" :label="'Selling Price'" :name="'selling_price'" :col="6"
            :placeholder="'Please enter Selling Price here.'" :required="true" :autofocus="true" :step="0.01"
            :col="'6'" />
        <!-- Product Description -->
        <x-text-area-field :label="'Product Description'" :name="'description'" :col="12" :rows="6" :required="TRUE" />


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Images</h4>
                    </div>
                    <div class="card-body">
                        <!-- Product Main Image -->
                        <x-file-browser-image :label="'Product Main Image'" :name="'image'" />
                        <!-- Gallery Image -->
                        <x-file-gallery-image :label="'Gallery Image'" :name="'gallery_image_url'" :required="FALSE" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Button -->
        <x-button :title="'Save'" />

    </x-form-base>
    @push('scripts')

    <script>
        $(document).ready(function () {

            //Toogling Tax Form
            
            //FIle Manager
            $.fn.filemanager = function(type, options) {
                type = type || 'file';

                this.on('click', function(e) {
                    let route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                    let target_path = $('#' + $(this).data('path'));
                    let target_preview = $('#' + $(this).data('preview'));
                    let target_preview_multiple = $('#' + $(this).data('preview-multiple'));
                    let preview_wrapper = $('#' + $(this).data('preview-wrapper'));
                    let preview_wrapper_multiple = $('#' + $(this).data('preview-wrapper-multiple'));
                    // console.log($(this).data('path'));
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');

                    let multipleLfm = this.id === "lfm2";

                    window.SetUrl = function(items) {
                        let file_path = items.map(function(item) {
                            return item.url;
                        }).join(',');

                        let multiplePaths = items.map(item => item.url);


                        if (multipleLfm) {
                            $('#gallery_image_url').val(multiplePaths);
                        } else {
                            // set the value of the desired input to image url
                            target_path.text('').text(file_path);
                            $('#image_url').val(file_path)
                        }


                        // clear previous preview
                        target_preview.html('');
                        target_preview_multiple.html('');

                        // Set Preview Classes to render Image
                        $('#lfm').addClass('has-preview');
                        $('#lfm2').addClass('has-preview');
                        preview_wrapper.addClass('d-block');
                        preview_wrapper_multiple.addClass('d-block');

                        // set or change the preview image src
                        items.forEach(function(item) {
                            target_preview.append(
                                $('<img>').attr('src', item.url)
                            );
                            target_preview_multiple.append(
                                $('<img>').attr('src', item.url)
                            );
                        });

                        // trigger change event
                        target_preview.trigger('change');
                        target_preview_multiple.trigger('change');
                    };
                    return false;
                });
            }
            $('#lfm').filemanager('image');
            $('#lfm2').filemanager('image');
        });
    </script>
    @endpush

    {{--
    <x-file-manager /> --}}





</x-cms-master-layout>