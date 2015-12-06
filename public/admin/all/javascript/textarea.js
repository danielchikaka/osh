
$(document).ready(
  function()
  {
    $('#redactor_en, #redactor_sw').redactor({
       focus: true,

       plugins: ['fullscreen', 'imagemanager', 'filemanager', 'video'],

    	 imageUpload: window.location.origin + '/upload',
       imageManagerJson: window.location.origin + '/getimages',

      fileUpload: window.location.origin + '/upload_file',
      fileManagerJson: window.location.origin + '/getfiles',

    });

  }
);
 


