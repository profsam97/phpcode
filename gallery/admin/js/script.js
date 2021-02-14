
$(document).ready(()=>{
$(".modal_thumbnails").click(()=>{
$("#set_user_image").prop('disabled', false);
var user_href;
let user_href_spilted;
let user_id;
var image_src;
let image_src_spilted;
let image_name;
user_href =  $('#user_id').prop("href");
user_href_spilted = user_href.split("=");
user_id = user_href_spilted[1];
image_src =  $('.modal_thumbnails').prop("src");
image_src_spilted = image_src.split("/");
image_name = image_src_spilted[image_src_spilted.length -1];

// var photo_id = $('.modal_thumbnails').attr('data');
// $.ajax({
//     url: "includes/ajax_code.php",
//     data: {photo_id: photo_id},
//     type: "POST",
//     success:function(data){
//         if(!data.error){
//             $('#modal_sidebar').html(data);

//     }
// }

// })
// $("#set_user_image").click(()=>{
//     $.ajax({
//         url: "includes/ajax_code.php",
//         data: {image_name: image_name, user_id:user_id},
//         type: "POST",
//         success:function(data){
//             if(!response.error){
//             //    location.reload(true);
//             $('.user_image_box a img').prop("src" , data)
//             }
//         },

//     })

// });
});

});

