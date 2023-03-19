<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="../assets/css/prism.css">

<!-- Text editor -->
<script>
    tinymce.init({
        selector: '.text-editor',
        setup: function(editor) {
            editor.on('change', function() {
                tinymce.triggerSave();
            });
        },
        plugins: 'codesample code',
        skin: "oxide-dark",
        content_css: "../assets/css/prism.css",
        content_css: "dark",
        codesample_dialog_width: '400',
        codesample_dialog_height: '400',
        codesample_languages: [{
                text: 'HTML/XML',
                value: 'markup'
            },
            {
                text: 'JavaScript',
                value: 'javascript'
            },
            {
                text: 'CSS',
                value: 'css'
            },
            {
                text: 'PHP',
                value: 'php'
            },
            {
                text: 'Ruby',
                value: 'ruby'
            },
            {
                text: 'Python',
                value: 'python'
            },
            {
                text: 'Java',
                value: 'java'
            },
            {
                text: 'C',
                value: 'c'
            },
            {
                text: 'C#',
                value: 'csharp'
            },
            {
                text: 'C++',
                value: 'cpp'
            }
        ],
        toolbar: 'codesample code',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            // '//www.tiny.cloud/css/codepen.min.css'
        ]
    });
</script>
<script src="../assets/js/prism.js"></script>