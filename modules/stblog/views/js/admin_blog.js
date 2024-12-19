jQuery(function($){
    $(document).on('click', '.st_blog_cover_image', function(e)
		{
			e.preventDefault();
            var self = $(this);
			var id = self.attr('data-id');
            var token = self.attr('data-token');
            var type = self.attr('data-type');
			doAdminAjax({
					"action":"deleteCoverImage",
					"id_st_blog" : id,
					"token" : token,
                    "type" : type,
					"tab" : "AdminStBlog",
					"ajax" : 1 }, function(data){
					   json = $.parseJSON(data);
					   if(json.r)
                            self.closest('.form-group').remove();
                        else
                            showErrorMessage(json.m);
					}
			);
		});
    $(document).on('click', '#btn_regenerate_thumbs', function(e)
    {
        e.preventDefault();
        if (typeof(c_msg)!= 'undefined')
            c_msg = 'Are you sure ?';
        if (!confirm(c_msg))
            return false;
            
        var $_this = $(this);
        
        $('#progress-warning').show();
        $_this.attr('disabled', true);
        doAdminAjax({
				"action":"regenerateThumbails",
				"token" : token,
				"tab" : "AdminStBlogConfig",
				"ajax" : 1 }, function(data){
				   json = $.parseJSON(data);
				   if(json.r)
                   {
                        $('#progress-warning').hide();
                        $('#ajax-message-ok').show();
                        if (json.m)
                            $('#ajax-message-ko').find('.message').html(json.m.replace('\n','<br>')).addBack().show();
                   }
                   else
                   {
                        $('#progress-warning').hide();
                        $('#ajax-message-ko').find('.message').html(json.m.replace('\n','<br>')).addBack().show();
                   }
                   $_this.attr('disabled', false);
				}
		);
    });
});