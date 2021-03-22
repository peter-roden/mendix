$(document).ready(function () {
  var logoTicker = $(".logoTicker");
  
  logoTicker.each(function () {

	var placeholderCount = $(this).find(".block").length;
    var cells = $(this).find(".logoTicker__cell");
    var l = cells.length;
    var i = -1;

    var replaceInterval;
    var animateIntterval;

    setInterval(function () {
      clearInterval(replaceInterval);
      clearInterval(animateIntterval);

      ++i;
      var prev = cells.get(i % l);
      var next = cells.get((i + placeholderCount) % l);
      prev.classList.add("out");

      //on out complete, replace the <li> with the next <li> to show
      replaceInterval = setTimeout(function () {
		prev.replaceWith(next);
		prev.classList.remove('block', 'out', 'in');
        next.classList.add("block");
		logoTicker.append(prev);
      }, 450);

      animateIntterval = setTimeout(function () {
		next.classList.add('in');
      }, 500);
	}, 1000);
  });
});