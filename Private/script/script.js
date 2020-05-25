// ----Bouton dans le login----
$(document).ready(function(){
  $("#login-button").click(function(){
    $("#login-button").fadeOut("slow",function(){
      $("#container").fadeIn();
      TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
    });
  });

  $(".close-btn").click(function(){
    TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container").fadeOut(800, function(){
      $("#login-button").fadeIn(800);
    });
  });
});

//----Vue Password dans login----
function MDP() {
  var  passw = document.getElementById("password");
  var eye = document.getElementById("eye");
  if (passw.type === "password") {
    passw.type = "text";
    eye.className = "far fa-eye-slash";
  } else {
    passw.type = "password";
    eye.className = "far fa-eye";
  }
}
