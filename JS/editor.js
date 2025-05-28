var toolBarOptions =[
    ['bold', 'italic', 'image', 'link', ],
    [{'list' : 'ordered'}, {'list':'bullet'}, {'list': 'checked'}],
    [{'align': []}]
]


const quill = new Quill('#editor', {
    modules:{
        toolbar:toolBarOptions,
    },
    theme: 'snow'
});