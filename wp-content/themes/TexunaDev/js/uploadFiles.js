var uploadFiles = {

    run: function() {
        var fileInput = $('#inputFileUpload');
        fileInput.attr('multiple','true');
        var fileList = $('ul#listFiles');
        var dropBox = $('#lineFiles');
        var type   = ['image/jpg','image/jpeg','image/png','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf'];
        var size   = 10000000; // bytes


        fileInput.bind({

            change: function() {
                displayFiles(this.files);
            }
        });

        dropBox.bind({
            dragenter: function() {
                $(this).addClass('highlighted');
                return false;
            },
            dragover: function() {
                return false;
            },
            dragleave: function() {
                $(this).removeClass('highlighted');
                return false;
            },
            drop: function(e) {
                var dt = e.originalEvent.dataTransfer;
                displayFiles(dt.files);
                return false;
            }
        });

        function displayFiles(files) {
            $.each(files, function(i, file) {
                fileList.find('li').remove();
                console.log('type'+ file.type);
                if (type.indexOf(file.type) != -1) {
                    if (file.size <= size){
                        var li = $('<li/>').appendTo(fileList);
                        var newDiv = $('<div/>').appendTo(li);
                        var $button = $('<button class="delBtn"><i class="mdi mdi-close"></i></button>');
                        $button.click(function(event) {
                            event.preventDefault();
                            $(this).closest('div').remove();
                        });

                        newDiv.append($button);
                        $('<span/>').text(file.name).appendTo(newDiv);

                        li.get(0).file = file;
                    }
                }



                // var reader = new FileReader();
                // //   reader.onload = (function(aImg) {
                // //     return function(e) {
                // //       aImg.attr('src', e.target.result);
                // //       aImg.attr('width', 150);
                // //     };
                // //   });
                //
                // reader.readAsDataURL(file);
            });
        };



    }
}
