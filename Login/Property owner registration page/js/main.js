(function($) {

  $('#property_type').parent().append('<ul class="list-item" id="newproperty_type" name="property_type"></ul>');
  $('#property_type option').each(function(){
      $('#newproperty_type').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
  });
  $('#property_type').remove();
  $('#newproperty_type').attr('id', 'property_type');
  $('#property_typee li').first().addClass('init');
  $("#property_type").on("click", ".init", function() {
      $(this).closest("#property_type").children('li:not(.init)').toggle();
  });
  
  var allOptions = $("#property_type").children('li:not(.init)');
  $("#property_type").on("click", "li:not(.init)", function() {
      allOptions.removeClass('selected');
      $(this).addClass('selected');
      $("#property_type").children('.init').html($(this).html());
      allOptions.toggle();
  });

  var marginSlider = document.getElementById('slider-margin');
  if (marginSlider != undefined) {
      noUiSlider.create(marginSlider, {
            start: [500],
            step: 10,
            connect: [true, false],
            tooltips: [true],
            range: {
                'min': 0,
                'max': 1000
            },
            format: wNumb({
                decimals: 0,
                thousand: ',',
                prefix: '$ ',
            })
    });
  }
  $('#reset').on('click', function(){
      $('#register-form').reset();
  });

  $('#register-form').validate({
    rules : {
        first_name : {
            required: true,
        },
        last_name : {
            required: true,
        },
        company : {
            required: true
        },
        email : {
            required: true,
            email : true
        },
        phone_number : {
            required: true,
        }
    },
    onfocusout: function(element) {
        $(element).valid();
    },
});

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });
})(jQuery);