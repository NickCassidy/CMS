
$(function() {
    $("#slideshowControls").click(toggleText);
});
    
    var flip = 0;
function toggleText() {
    $('.text').toggle();
}
  
$(function(){
         doTimer()

        })
var t;
var timer_is_on=0;

function timedCount()
{
$('.rg-image-nav-next').click()
t=setTimeout("timedCount()",4000);
}

function doTimer()
{
if (!timer_is_on)
  {
  timer_is_on=1;
  timedCount(300);
  }

}

function stopCount()
{
clearTimeout(t);
timer_is_on=0;
} 
