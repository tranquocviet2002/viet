var soccer_academy_Keyboard_loop = function (elem) {
  var soccer_academy_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var soccer_academy_firstTabbable = soccer_academy_tabbable.first();
  var soccer_academy_lastTabbable = soccer_academy_tabbable.last();
  soccer_academy_firstTabbable.focus();

  soccer_academy_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      soccer_academy_firstTabbable.focus();
    }
  });

  soccer_academy_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      soccer_academy_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};