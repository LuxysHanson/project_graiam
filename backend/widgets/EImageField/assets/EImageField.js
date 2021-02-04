$(function () {

    var input = $("input[type='file']");

    if (input.data('id')) {

        var imageUrl = input.data('url'),
            params = {
                overwriteInitial: true,
                showClose: false,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                browseIcon: '<i class="fas fa-folder-open"></i>',
                removeIcon: '<i class="fas fa-trash"></i>',
                previewFileIcon: '<i class="fas fa-file"></i>',
                removeTitle: 'Сбросить изменения',
                // downloadTitle: 'Download file',
                elErrorContainer: '#kv-avatar-errors-1',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '<img src="'+ input.data('default') +'" alt="default-avatar-img">',
                layoutTemplates: {main2: '{preview} {remove} {browse}'}
            };

        if (typeof imageUrl === "undefined") {
            imageUrl = "";
        }

        if (imageUrl !== "") {
            params.initialPreview = [
                "<img src = "+ imageUrl +"  class = 'file-preview-image' alt='avatar-img'>"
            ]
        }

        $("#" + input.data('id')).fileinput(params);
    }
});