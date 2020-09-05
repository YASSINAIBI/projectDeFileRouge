$( document ).ready(function() {
  new WOW().init();
});

const Cards = ((() => {

  window.addEventListener('DOMContentLoaded', () => {setTimeout(init,1)}, true);

  function init(e)
  {
    if(document.querySelector(".cards"))
    {
      let cards = document.querySelector(".cards");
      cards.addEventListener('click', clicked, false);
      document.querySelectorAll(".cards .card")[1].click();
    }
  }

  function clicked(e)
  {
    let card = e.target;
    if(card.getAttribute("data-card")){rearrange(card.getAttribute("data-card"));}
  }

  function rearrange(card)
  {
    let cards = document.querySelectorAll(".cards .card");
    for(let n = 0; n < cards.length; n++)
    {
      cards[n].classList.remove("card--left");
      cards[n].classList.remove("card--center");
      cards[n].classList.remove("card--right");
    }
    cards[card].classList.add("card--center");
    if(card == 0)
    {
      cards[2].classList.add("card--left");
      cards[1].classList.add("card--right");
    }
    if(card == 1)
    {
      cards[0].classList.add("card--left");
      cards[2].classList.add("card--right");
    }
    if(card == 2)
    {
      cards[1].classList.add("card--left");
      cards[0].classList.add("card--right");
    }
  }

  return {
    init
  }
})());



// New Products

$(".quick_look").on("click", function() {
  var product_id = $(this).data("id");
    var options = {
        modal: true,
        height: 'auto',
        width:'70%'
      };
    $('#demo-modal').load('get-product-info.php?id='+product_id).dialog(options).dialog('open');
});

$(document).ready(function() {
    $(".image").hover(function() {
          $(this).children(".quick_look").show();
      },function() {
           $(this).children(".quick_look").hide();
      });
});


// icone animate
$(document).ready(function () {

  $('.all_icons .icone i.animate')
  .mouseover(function () {
    $(this).animate({"top": "-338px", "opacity": 0},"slow","linear");
  })
  .mouseleave(function () {
    $(this).animate({"top" : "0", "opacity": 1},"slow","linear");
 });
 });

 $(document).ready(function(){
  let text = $(".number_in_card").text();
  if(text == 0){
    $(".number_in_card").css({"display":"none"});
  }
  else{
    $(".number_in_card").css({"display":"block"})
  }
 });
