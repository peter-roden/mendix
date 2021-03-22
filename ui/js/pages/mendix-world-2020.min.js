$(document).ready(function () {
  var carotItems = $("#carot_items");
  var carotMark = $("#carot_mark");
  var carotTarget = $("#carot_target");
  var carotItemCounter = 0;

  if (carotTarget.length) {
    var resizeId;
    $(window).resize(function () {
      clearTimeout(resizeId);
      resizeId = setTimeout(positionCarotItems, 10);
    });

    positionCarotItems();
  }

  function positionCarotItems() {
    carotItems.addClass("active");
    carotMark.addClass("active");
    carotMark.offset({
      left: carotTarget.offset().left + 15,
      top: carotTarget.offset().top - 20,
    });

    carotItems.offset({
      left: carotTarget.offset().left - carotItems.width() + 100,
      top: carotTarget.offset().top - 80,
    });
  }

  setInterval(changeText, 2000);

  function changeText() {
    var carotChildren = carotItems.children();
    var carotCurrent = carotChildren.filter(".active");

    if (carotCurrent) {
      carotCurrent.removeClass("active");
    }

    var index = ++carotItemCounter % carotChildren.length;
    carotCurrent = carotChildren.eq(index);

    resizeId = setTimeout(function () {
      var ROTATE_FACTOR = 15;
      var angle = ROTATE_FACTOR * 0.5 - Math.random() * ROTATE_FACTOR;
      carotMark.css("transform", "rotate(" + angle + "deg)");
      carotCurrent.css("transform", "rotate(" + angle + "deg)");
      carotCurrent.addClass("active");
    }, 250);
  }

  function setLineHeight(element, time) {
    var parent = element.parentNode;
    var line = element.querySelector(".sideways__line");
    var offsetHeight = parent.offsetHeight;

    if (time || time === 0) {
      line.style.transitionDuration = time + "ms";
    } else {
      line.style.transitionDuration = offsetHeight * 2 + "ms";
    }
    line.style.height = offsetHeight + "px";
  }

  var growSidewaysLines = new IntersectionObserver(
    function (entries, observer) {
      for (var l = entries.length - 1; l >= 0; l--) {
        var entry = entries[l];
        if (entry.intersectionRatio >= 1) {
          setLineHeight(entry.target);
        } else if (entry.intersectionRatio <= 0) {
        }
      }
    },
    {
      threshold: [0, 1],
    }
  );

  window.mx.startObserver(growSidewaysLines, ".sideways");

  //session read more button, show full text on click
  $(".session__info__toggle").click(function () {
    var parent = $(this).closest(".session");
    parent.find(".session__info--truncated").removeClass("active");
    parent.find(".session__info--full").addClass("active");
  });

  //hide full text again when closing an accordion
  $(".accordion-title").not('.no-scroll').click(function () {
    var sibling = $(this).siblings(".accordion-content");
    sibling.find(".session__info--truncated").addClass("active");
    sibling.find(".session__info--full").removeClass("active");

    var target = $(this);
    setTimeout(function () {
      window.mx.scrollTo(target);
    }, 300);
  });
});
