// Copyright @ Livertigo.com
// All right reserved  
(function() {
    tinymce.PluginManager.add( 'wpcs_icon', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('wpcs_icon', {
            title: 'Wp Custom Styling',
            cmd: 'wpcs_start',
            image: url + '/symbol_logo.png',
        });
 
        editor.addCommand('wpcs_start', function() {
              jQuery('.wpcs_modal').show();
           }); 
		   
		   
		   $('.wpcs_modal_content').on('change', 'select', function (e) { 
		   var selected_text = editor.selection.getContent({
                'format': 'html' 
            }); 
    var name = $(e.target).attr('name');
	if(name =='select_parameter'){
		var select_parameter=$(e.target).val(); 
		var design=$('#design').find('option:selected').val();
		var icon=$('#icon').find('option:selected').val();
		var parameter=$('#parameter').find('option:selected').val(); 
	} 
	if(name =='parameter'){
		var parameter=$(e.target).val(); 
		var design=$('#design').find('option:selected').val();
		var icon=$('#icon').find('option:selected').val();
		var select_parameter=$('#select_parameter').find('option:selected').val(); 
	}
	if(name =='design'){
		var parameter=$('#parameter').find('option:selected').val(); 
		var design=$(e.target).val();
		var icon=$('#icon').find('option:selected').val();
		var select_parameter=$('#select_parameter').find('option:selected').val(); 
	} 
	if(name =='icon'){
		var parameter=$('#parameter').find('option:selected').val(); 
		var icon=$(e.target).val();
		var design=$('#design').find('option:selected').val();
		var select_parameter=$('#select_parameter').find('option:selected').val(); 
	} 
	if(select_parameter =='heading'){
	var open_column = '<'+parameter+' class="wpcs '+design+'">';
            var close_column = '</'+parameter+'>';
			var open_column = '<'+parameter+' class="wpcs '+design+'">';
            var close_column = '</'+parameter+'>';
			var open_icon = '<i class="'+icon+'">';
			var close_icon = '</i>';
			var return_text = '';
            return_text = open_column +open_icon +close_icon + selected_text+ close_column;
	}else if(select_parameter =='blockquote_w_c'){
		var blockquote_credit=$('#blockquote_credit').val();
		var blockquote_cite=$('#blockquote_cite').val(); 
		var open_figure = '<figure class="wpcs '+design+'">';
		var open_blockquote = '<blockquote class="wpcs '+design+'__body">';
		var close_blockquote = '</blockquote>';
		var figcaption = '<figcaption class="wpcs credit '+design+'__credits">'+blockquote_credit+' , <cite>'+blockquote_cite+'</cite></figcaption>';
		var close_figure='</figure>'; 
		var return_text = '';
            return_text = open_figure + open_blockquote+selected_text+close_blockquote + figcaption + close_figure;
	}else if(select_parameter =='blockquote'){ 
			var open_bc = '<blockquote class="wpcs '+design+'">';
            var close_bc = '</blockquote>';
			var return_text = '';
            return_text = open_bc + selected_text + close_bc;
	}else if(select_parameter =='message_box'){ 
			var open_msg = '<div class="wpcs '+design+'">';
			var msg_in='<div class="msginner">'; 
            var close_msg = '</div>';
			var return_text = '';
            return_text = open_msg + msg_in + selected_text + close_msg + close_msg;
	}
            
    $('.wpcs_modal_preview').html(return_text);
});
		   
		   $("#wpcs_submit").click(function(){ 
            var selected_text = editor.selection.getContent({
                'format': 'html' 
            });  			
			 
            var return_preview = $('div.wpcs_modal_preview').html(); 
			
            editor.execCommand('mceReplaceContent', false, return_preview);
			jQuery('.wpcs_modal').hide();
            return;
        });
 
    });
})();