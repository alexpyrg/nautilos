<div>

    <form wire:submit.prevent="save">
        <h2> Περιεχόμενο Σελίδας: {{ $page->id }}</h2>
        @csrf
        <input type="hidden" value="{{ $page->id }}" name="page_id" wire:model="page_id" />
        <div class="input_group block">
            @error('locale')
            <span class="error"> {{ $message }} </span>
            @enderror
            <select class="locale_choice" name="locale_id" wire:model.blur="locale_id">
                <option value="0">Επιλέξτε..</option>
                @foreach($locales as $locale)
                    <option value="{{ $locale->id }}"> {{ $locale->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input_group block">
            <label for="title">URL(slug|<u>ΧΩΡΙΣ ΚΕΝΑ</u>): </label>
            <input type="text" name="slug" placeholder="π.χ. my-page-slug" wire:model="slug" >
        </div>
        <div class="input_group block">
            <label for="title">Τίτλος: </label>
            <input type="text" placeholder="π.χ Welcome | Mywebpage.com" wire:model="title" name="title">
        </div>
        <div class="input_group block">
            <label for="title">Λέξεις Κλειδιά: </label>
            <input type="text" placeholder="π.χ Ξενοδοχείο στην ιεράπετρα,Ξενοδοχείο, Mywebsite, κλπ..." wire:model="keywords" name="keywords">
        </div>
        <div class="input_group block">
            <label for="title">Περιγραφή: </label>
            <textarea type="text" placeholder="Καλώς ήρθατε στην επιχείρηση μας -όνομα_επιχείρησης- κλπ... " wire:model="description" name="description">
{{--                {{ $page_content->description }}--}}
            </textarea>
        </div>

{{--        <textarea class="editor" id="editor" name="content" wire:model="content" >--}}
{{--        <div x-data="{content: @entangle('content')}">--}}
            <textarea wire:ignore wire:model="content" x-model="content" id="editor">
                {{ $show_content }}
            </textarea>
{{--        </div>--}}

{{--            @if($page_content != '' || $page_content != null)--}}
            {{--                {!! $page_content->content !!}--}}
            {{--            @endif--}}
        </textarea>


        <button type="submit">Αποθήκευση</button>
    </form>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</div>

{{--@script--}}
{{--<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script>--}}
{{--@endscript--}}

{{--@script--}}
{{--<script>--}}

{{--    // This sample still does not showcase all CKEditor&nbsp;5 features (!)--}}
{{--    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.--}}


{{--    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format--}}
{{--        ckfinder: {--}}

{{--            uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token() }}',--}}

{{--        },--}}
{{--        toolbar: {--}}
{{--            items: [--}}
{{--                'exportPDF','exportWord', '|',--}}
{{--                'findAndReplace', 'selectAll', '|',--}}
{{--                'heading', '|',--}}
{{--                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',--}}
{{--                'bulletedList', 'numberedList', 'todoList', '|',--}}
{{--                'outdent', 'indent', '|',--}}
{{--                'undo', 'redo',--}}
{{--                '-',--}}
{{--                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',--}}
{{--                'alignment', '|',--}}
{{--                'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',--}}
{{--                'specialCharacters', 'horizontalLine', 'pageBreak', '|',--}}
{{--                'textPartLanguage', '|',--}}
{{--                'sourceEditing'--}}
{{--            ],--}}
{{--            shouldNotGroupWhenFull: true--}}
{{--        },--}}
{{--        // Changing the language of the interface requires loading the language file using the <script> tag.--}}
{{--        // language: 'es',--}}
{{--        list: {--}}
{{--            properties: {--}}
{{--                styles: true,--}}
{{--                startIndex: true,--}}
{{--                reversed: true--}}
{{--            }--}}
{{--        },--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration--}}
{{--        heading: {--}}
{{--            options: [--}}
{{--                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },--}}
{{--                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },--}}
{{--                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },--}}
{{--                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },--}}
{{--                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },--}}
{{--                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },--}}
{{--                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }--}}
{{--            ]--}}
{{--        },--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration--}}
{{--        placeholder: 'Περιγραφή',--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature--}}
{{--        fontFamily: {--}}
{{--            options: [--}}
{{--                'default',--}}
{{--                'Arial, Helvetica, sans-serif',--}}
{{--                'Courier New, Courier, monospace',--}}
{{--                'Georgia, serif',--}}
{{--                'Lucida Sans Unicode, Lucida Grande, sans-serif',--}}
{{--                'Tahoma, Geneva, sans-serif',--}}
{{--                'Times New Roman, Times, serif',--}}
{{--                'Trebuchet MS, Helvetica, sans-serif',--}}
{{--                'Verdana, Geneva, sans-serif'--}}
{{--            ],--}}
{{--            supportAllValues: true--}}
{{--        },--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature--}}
{{--        fontSize: {--}}
{{--            options: [ 10, 12, 14, 'default', 18, 20, 22 ],--}}
{{--            supportAllValues: true--}}
{{--        },--}}
{{--        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features--}}
{{--        htmlSupport: {--}}
{{--            allow: [--}}
{{--                {--}}
{{--                    name: /.*/,--}}
{{--                    attributes: true,--}}
{{--                    classes: true,--}}
{{--                    styles: true--}}
{{--                }--}}
{{--            ]--}}
{{--        },--}}
{{--        // Be careful with enabling previews--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews--}}
{{--        htmlEmbed: {--}}
{{--            showPreviews: true--}}
{{--        },--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators--}}
{{--        link: {--}}
{{--            decorators: {--}}
{{--                addTargetToExternalLinks: true,--}}
{{--                defaultProtocol: 'https://',--}}
{{--                toggleDownloadable: {--}}
{{--                    mode: 'manual',--}}
{{--                    label: 'Downloadable',--}}
{{--                    attributes: {--}}
{{--                        download: 'file'--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        },--}}
{{--        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration--}}
{{--        mention: {--}}
{{--            feeds: [--}}
{{--                {--}}
{{--                    marker: '@',--}}
{{--                    feed: [--}}
{{--                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',--}}
{{--                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',--}}
{{--                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',--}}
{{--                        '@sugar', '@sweet', '@topping', '@wafer'--}}
{{--                    ],--}}
{{--                    minimumCharacters: 1--}}
{{--                }--}}
{{--            ]--}}
{{--        },--}}
{{--        // The "superbuild" contains more premium features that require additional configuration, disable them below.--}}
{{--        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.--}}
{{--        removePlugins: [--}}
{{--            // These two are commercial, but you can try them out without registering to a trial.--}}
{{--            // 'ExportPdf',--}}
{{--            // 'ExportWord',--}}
{{--            'AIAssistant',--}}
{{--            'CKBox',--}}
{{--            'CKFinder',--}}
{{--            'EasyImage',--}}
{{--            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.--}}
{{--            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html--}}
{{--            // Storing images as Base64 is usually a very bad idea.--}}
{{--            // Replace it on production website with other solutions:--}}
{{--            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-uploadSimpleUploadAdapterplugins/image-upload.html--}}
{{--            // 'Base64UploadAdapter',--}}
{{--            'MultiLevelList',--}}
{{--            'RealTimeCollaborativeComments',--}}
{{--            'RealTimeCollaborativeTrackChanges',--}}
{{--            'RealTimeCollaborativeRevisionHistory',--}}
{{--            'PresenceList',--}}
{{--            'Comments',--}}
{{--            'TrackChanges',--}}
{{--            'TrackChangesData',--}}
{{--            'RevisionHistory',--}}
{{--            'Pagination',--}}
{{--            'WProofreader',--}}
{{--            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample--}}
{{--            // from a local file system (file://) - load this site via HTTP server if you enable MathType.--}}
{{--            'MathType',--}}
{{--            // The following features are part of the Productivity Pack and require additional license.--}}
{{--            'SlashCommand',--}}
{{--            'Template',--}}
{{--            'DocumentOutline',--}}
{{--            'FormatPainter',--}}
{{--            'TableOfContents',--}}
{{--            'PasteFromOfficeEnhanced',--}}
{{--            'CaseChange'--}}
{{--        ]--}}
{{--    });--}}

{{--    CKEDITOR.editorConfig = function( config ) {--}}
{{--        // ... other configurations--}}

{{--        config.extraPlugins = [ 'SimpleUploadAdapter' ];--}}

{{--        config.simpleUpload = {--}}
{{--            uploadUrl: 'http://localhost:8000/flexibuild/editor/upload', // Your Laravel route--}}
{{--            // Optional headers (e.g., for CSRF token)--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content--}}
{{--            }--}}
{{--        };--}}
{{--    };--}}


{{--</script>--}}
{{--@endscript--}}
