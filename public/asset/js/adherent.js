

function checking(that) {
    if (that.value == "Startup"){
        document.getElementById("check").style.display = "block";
        document.getElementById("effectifstart").style.display = "block";
        document.getElementById("effectifent").style.display = "none";
    } else {
        document.getElementById("check").style.display = "none";
        document.getElementById("effectifstart").style.display = "none";
        document.getElementById("effectifent").style.display = "block";
    }
    }

    $(".msg").hide();

      $(document).ready(function(){
        $('input[type="radio"]').click(function(){
          var val = $(this).attr("value");
          var target = $("." + val);
          $(".msg").not(target).hide();
          $(target).show();
        });
      });


      $('.efct1').hide();
      $('.efct2').hide();
      $('.efct3').hide();
      
      $('.effectifent').change(function() {
        var inputNum = $(this).val();
        if (inputNum >= 1 && inputNum <= 20){
            $('.efct1').show();
            $('.efct2').hide();
            $('.efct3').hide();
        }
        if (inputNum >= 21 && inputNum <= 300){
            $('.efct2').show();
            $('.efct1').hide();
            $('.efct3').hide();
        }
        if (inputNum > 300){
            $('.efct3').show();
            $('.efct1').hide();
            $('.efct2').hide();
        }
      });