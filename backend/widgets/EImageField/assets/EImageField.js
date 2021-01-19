$(function () {

    var input = $("input[type='file']");

    if (input.data('id')) {

        var imageUrl = input.data('url');

        $("#" + input.data('id')).fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="fas fa-folder-open"></i>',
            removeIcon: '<i class="fas fa-trash"></i>',
            previewFileIcon: '<i class="fas fa-file"></i>',
            removeTitle: 'Сбросить изменения',
            downloadTitle: 'Download file',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="'+ input.data('default') +'" alt="avatar-img">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            initialPreview : [
                "<img src = "+ imageUrl +"  class = 'file-preview-image' alt = 'Desert' title = 'Desert'>"
            ]
        });
    }
});