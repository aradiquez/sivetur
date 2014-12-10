/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	 config.language = 'es';
	 config.uiColor = '#F2F2F2';
	 
	 //config.filebrowserBrowseUrl = '/browser/browse.php';
     //config.filebrowserImageBrowseUrl = '/browser/browse.php?type=Images';
     //config.filebrowserUploadUrl = '/uploader/upload.php';
    // config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Images';

	
	 config.toolbar = 'MyToolbar';

    config.toolbar_MyToolbar =
    [
        ['Source','Cut','Copy','PasteText','-','Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['Image','Table','HorizontalRule','SpecialChar','PageBreak'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
        ['Link','Unlink','Anchor'],
        '/',
        ['Styles','Format','Bold','Italic','Strike']
    ];
	
	 config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html',
 	 config.filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?Type=Images',
 	 config.filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?Type=Flash',
 	 config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
 	 config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
 	 config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

};
