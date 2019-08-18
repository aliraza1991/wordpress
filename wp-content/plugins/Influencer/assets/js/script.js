jQuery(function(){
    jQuery("#photos").click(function(){
        var images = wp.media({
            title:"upload images",
            multiple:false
        
        }).open().on("select",function(e){
            var uploadedImages = images.state().get("selection").first();
            var selectImages = uploadedImages.toJSON();
           console.log(selectImages.url);
           var selUrl = selectImages.url;
           jQuery('#image_url').val(selUrl);

           jQuery("#show-image").html("<img src='"+selUrl+"' height='50' width='50'>");
        })
    })

      $('#companyTable').DataTable();

        $('#InfluencerTable').DataTable();

    jQuery("#photo").click(function(){
        var images = wp.media({
            title:"upload images",
            multiple:false
        
        }).open().on("select",function(e){
            var uploadedImages = images.state().get("selection").first();
            var selectImages = uploadedImages.toJSON();
           console.log(selectImages.url);
           var selUrl = selectImages.url;
           jQuery('#image_url').val(selUrl);
           jQuery("#show-image").html("<img src='"+selUrl+"' height='50' width='50'>");
        })
    })


 

    jQuery('#companyForm').validate({
        submitHandler:function(){
        var post_data1 = $("#companyForm").serialize()+"&action=company_form&param=add_com";
        jQuery.post(ajax_url_obj,post_data1,
            function(resp){
                var data = JSON.parse(resp);
                 console.log(data);
                 location.reload();
                 if (data.status==1) {
                    jQuery.notifyBar({
                        cssClass: "success",
                        html: data.message
                    })
                 }
                 else{
                    jQuery.notifyBar({
                        cssClass: "success",
                        html: data.message
                    }) 
                 }
            }
        )
     }  
    });

    jQuery(document).on("click",".delcompany",function(){
        var com_id = jQuery(this).attr('del');
        // console.log(com_id);
        var post_data = "action=company_form&param=del_com&com_id="+com_id;
       var conf = confirm("Are you sure want to delete?");
       if(conf){
        jQuery.post(ajax_url_obj,post_data,
            function(res){
                var data = JSON.parse(res);
                console.log(data);
                 location.reload();
            }
        )
       } 
       
    })

    jQuery('#editCompanyForm').validate({
        submitHandler:function(){
        var post_data1 = $("#editCompanyForm").serialize()+"&action=company_form&param=edit_com";
        jQuery.post(ajax_url_obj,post_data1,
            function(resp){
                var data = JSON.parse(resp);
                 console.log(data);
                 if (data.status==1) {
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    })
                    location.reload();
                 }
                 else{
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    })
                    location.reload();
                 }
            }
        )
     }  
    });
//\
jQuery('#influencerForm').validate({
    submitHandler:function(){
    var post_data = $("#influencerForm").serialize()+"&action=influencer_form&param=add_influence";
    jQuery.post(ajax_url_obj,post_data,
        function(res){
            var data = JSON.parse(res);
             console.log(data);
             if (data.status==1) {
                jQuery.notifyBar({
                    cssClass:"success",
                    html:data.message
                })
                location.reload();
             }
             else{
                jQuery.notifyBar({
                    cssClass:"success",
                    html:data.message
                })
                location.reload();
             }
        }
    )
 }  
});

jQuery('#influencerLoginForm').validate({
    submitHandler:function(){
            // console.log(data);
    var post_data = $("#influencerLoginForm").serialize()+"&action=influencer_form&param=influence_login";
    // console.log(post_data);
    jQuery.post(ajax_url_obj,post_data,
        function(res){
            // alert(res);
            var data = JSON.parse(res);
             console.log(data);
           if(data.status==1){
            window.location.href = data.url;
           }
           else{
            jQuery.notifyBar({
                cssClass:"success",
                html:data.message
            })
            location.reload();
         }
        }
    )
 }  
});

jQuery('#editInfluencerForm').validate({
    submitHandler:function(){
    var post_data1 = $("#editInfluencerForm").serialize()+"&action=influencer_form&param=edit_influence";
    jQuery.post(ajax_url_obj,post_data1,
        function(resp){
            var data = JSON.parse(resp);
             console.log(data);
             if (data.status==1) {
                jQuery.notifyBar({
                    cssClass:"success",
                    html:data.message
                })
                location.reload();
             }
             else{
                jQuery.notifyBar({
                    cssClass:"success",
                    html:data.message
                })
                location.reload();
             }
        }
    )
 }  
});

jQuery(document).on("click",".delinfluencer",function(){
    var com_id = jQuery(this).attr('delinfluencer');
    // console.log(com_id);
    var post_data = "action=influencer_form&param=delete_influence&influence_id="+com_id;
    var conf = confirm("Are you sure want to delete?");
    if(conf){
        jQuery.post(ajax_url_obj,post_data,
            function(res){
                console.log(res);
                var data = JSON.parse(res);
                console.log(data);
                 location.reload();
            }
        )
    }
   
})


jQuery('.influencer_contact').click(function(){
    // submitHandler:function(){
       var company_id = jQuery(this).attr('company_id');
        var influencer_id = jQuery(this).attr('influencer_id');
    var post_data1 = "influencer_id="+influencer_id+"&company_id="+company_id+"&action=company_form&param=contact_to_influencer";
    // alert(post_data1);
    jQuery.post(ajax_url_obj,post_data1,
        function(resp){
            // alert(resp);
            var data = JSON.parse(resp);
             console.log(data);
           
             if (data.status==1) {
                jQuery.notifyBar({
                    cssClass:"success",
                    html:data.message
                })
                location.reload();
             }
             else{
                 alert(data.message);
             }
        }
    )
//  }  
});
 
});



   