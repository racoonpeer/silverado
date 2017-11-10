var objCheckout = new CCheckout(),
    Checkout = objCheckout.init();

$(function(){
    Checkout.initialize();
});

function CCheckout(){
    var Checkout = {
        form: null,
        wizard: null,
        container: null,
        construct: function(){
            var self = this;
            self.form = $("#orderForm");
            self.container = $("#wizard");
        },
        initialize: function(){
            var self = this;
            self.construct();
            self.setUpWizard();
            self.setUpFields();
        },
        setUpWizard: function(){
            var self = this;
            self.wizard = self.container.steps({
                headerTag: "h3",
                bodyTag: "fieldset",
                transitionEffect: "slide"
            });
        },
        setUpFields: function(){
            var self = this;
            // City & address
            self.form.find('#city').select2({
                placeholder: 'Город',
                ajax: {
                    url: window.location.href,
                    dataType: 'json',
                    data: function (params) {
                        return {
                            term: params.term,
                            task: 'getCities'
                        };
                    },
                    processResults: function(json){
                        return {
                            results: json.items
                        };
                    }
                }
            });
            self.form.on('change', "#city", function(){
                self.setUpAddress();
            });
            self.form.find('#address').select2({
                placeholder: 'Адрес',
                disabled: true
            });
            self.setUpAddress();
            // Recepient
            self.setUpRecepient(true);
        },
        setUpAddress: function(){
            var self = this,
                inputCity = self.form.find("#city"),
                inputAddress = self.form.find("#address"),
                cityName = inputCity.val();
            if (typeof cityName != "undefined") {
                $.ajax({
                    url: window.location.href,
                    dataType: "json",
                    data: {
                        term: cityName,
                        task: 'getAddress'
                    },
                    success: function(json){
                        if (json.items && json.items.length) {
                            $.map(json.items, function(item){
                                var opt = new Option(item.text, item.id, false, false);
                                inputAddress.append(opt);
                            }); inputAddress.prop("disabled", false).trigger('change');
                        }
                    },
                    beforeSend: function(){
                        inputAddress.prop("disabled", true).html("");
                    }
                });
            }
        },
        setUpRecepient: function(initial){
            var self = this,
                cb   = self.form.find("#recepient"),
                div  = cb.closest(".f-row").next(".f-row"),
                fields = div.find("input");
            if (cb.is(":checked")) {
                fields.prop("disabled", false);
                div.removeClass("hidden");
            } else {
                fields.prop("disabled", true);
                div.addClass("hidden");
            }
            initial = initial||false;
            if (initial) {
                self.form.find("#recepient").on("change", function(){
                    self.setUpRecepient();
                });
            }
        }
    };
    this.init = function(){
        return Checkout;
    };
};