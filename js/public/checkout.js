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
                transitionEffect: "slide",
                enablePagination: true,
                enableFinishButton: true,
                preloadContent: true,
                stepsOrientation: $.fn.steps.stepsOrientation.vertical,
                onFinished: function () {
                    self.form.submit();
                },
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Allways allow previous action even if the current form is not valid!
                    if (currentIndex > newIndex) return true;
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        self.form.find(".error").removeClass("error");
                    } self.form.validate().settings.ignore = ":disabled,:hidden";
                    return self.form.valid();
                },
                labels: {
                    cancel: "Отмена",
                    current: "current step:",
                    pagination: "Pagination",
                    finish: "Оформить заказ",
                    next: "Далее",
                    previous: "Назад",
                    loading: "Подождите ..."
                },
                onFinishing: function (event, currentIndex) {
                    self.form.validate().settings.ignore = ":disabled,:hidden";
                    return self.form.valid();
                }
            });
            $.validator.addMethod("ukrPhone", function(value, element) {
                // allow any non-whitespace characters as the host part
                return this.optional( element ) || /^\+380([0-9]{9})$/.test(value);
            }, 'Please enter a valid phone number');
            self.form.validate({
                errorPlacement: function (error, element) {
                    element.addClass("error");
                },
                rules: {
                    firstname: {
                        required: true
                    },
                    surname: {
                        required: true
                    },
                    phone: {
                        required: true,
                        ukrPhone: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    city: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    ext_surname: {
                        required: true,
                    },
                    ext_firstname: {
                        required: true,
                    }
                }
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
            self.form.find('#address').select2({
                placeholder: 'Адрес',
                disabled: true
            });
            self.setUpAddress();
            // Recepient
            self.setUpRecepient(true);
            // Phone mask
            self.form.find("input[name=\"phone\"]").inputmask({
                mask: "+380999999999",
                greedy: false,
                definitions: {
                    '*': {
                        validator: "[0-9]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            });
            // set change events
            self.form.on('change blur keyup', "input, textarea, select", function(){
                var iName   = $(this).attr("name"),
                    iType   = $(this).attr("type"),
                    iVal    = $(this).val(),
                    iID     = $(this).attr("id"),
                    iTarget = self.form.find("[data-source=\"" + iName + "\"]"),
                    iToggle = self.form.find("[data-toggle-id=\"" + iID + "\"]"),
                    stage   = $(this).closest("fieldset");
                // Fill nested text boxes
                if (iTarget.length) iTarget.text(iVal);
                // Toggle nested hint boxes
                if (iToggle.length) {
                    iToggle.siblings("[data-toggle-id]").addClass("hidden");
                    iToggle.removeClass("hidden");
                }
                // get warehouses by city
                if (iName=="city") self.setUpAddress();
            });
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
                                var opt = new Option(item.text, item.text, false, false);
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
                fields.prop("disabled", false).addClass("required");
                div.removeClass("hidden");
            } else {
                fields.prop("disabled", true).removeClass("required");
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