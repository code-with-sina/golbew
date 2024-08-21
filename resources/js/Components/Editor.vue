<script setup>
    import { ref } from 'vue';
    import 'ckeditor5/ckeditor5.css';
    import { ClassicEditor, Bold, Essentials, Italic, Mention, Paragraph, Undo, Link, Indent, IndentBlock, BlockQuote, Heading, List, Font  } from 'ckeditor5';
    import { Ckeditor } from '@ckeditor/ckeditor5-vue'

    
    const editor = ClassicEditor;
    const editorConfig = ref({
        plugins: [Bold, Essentials, Italic, Mention, Paragraph, Undo, Link, Indent, IndentBlock, BlockQuote, List, Font, Heading   ],
        toolbar: ['undo', 'redo', '|', 'bold', 'italic', 'link', 'outdent', 'indent', 'blockquote', 'heading', 'list', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'],
    });


    const model = defineModel({
        type: String,
        required: true
    });
</script>
<template>


    <ckeditor
        v-model="model"
        :editor="editor"
        :config="editorConfig"
        rows="6"
        class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded h-54"

    /> 

</template>