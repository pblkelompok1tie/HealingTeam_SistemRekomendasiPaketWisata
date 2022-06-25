function addForm(){
    var addrow = 'Hallo'
    $("#dynamic_form").append(addrow);
 }
 
 $("#dynamic_form").on("click", ".btn-tambah", function(){
    addForm()
    $(this).css("display","none")     
    var valtes = $(this).parent().find(".btn-hapus").css("display","");
 })
 
 $("#dynamic_form").on("click", ".btn-hapus", function(){
  $(this).parent().parent('.baru-data').remove();
  var bykrow = $(".baru-data").length;
  if(bykrow==1){
    $(".btn-hapus").css("display","none")
    $(".btn-tambah").css("display","");
  }else{
    $('.baru-data').last().find('.btn-tambah').css("display","");
  }
 });
 
 $('.btn-simpan').on('click', function () {
    $('#dynamic_form').find('input[type="text"], input[type="number"], select, textarea').each(function() {
       if( $(this).val() == "" ) {
          event.preventDefault()
          $(this).css('border-color', 'red');
          
          $(this).on('focus', function() {
             $(this).css('border-color', '#ccc');
          });
       }
    })
 })