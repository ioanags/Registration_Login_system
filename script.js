$(document).ready(function() {
    $("#error").hide();
});
//Έλεγχος εάν τα passwords ταιριάζουν
function check() {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();

    if (password1 != password2) {
      $("#error").show();
        $("#error").html ("Λάθος συνδυασμός password!");
        $("#password2").focus();
        return false;
    }else {
      $("#error").hide();
      return true;
    }
}
//έλεγχος ajax εάν χρησιμοποιήτε το email
$(document).ready(function() {

    $('#email').keyup(function(){
      var email = $(this).val();
        jQuery.ajax({
          url: "checkemail.php",
          data:{email:email},
          method: "POST",
          success:function(data)
          {
            if(data != '0')
         {
           $("#error").show();
           $('#error').text('Το email χρησιμοποιήτε ήδη!');
           $('#submitButton').attr("disabled", true);

         }
         else
         {
          $("#error").hide();
          $('#submitButton').attr("disabled", false);
         }

          },
          error:function (){

          }})

        })
      });
