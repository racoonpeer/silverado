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
                enablePagination: false,
                enableFinishButton: false,
                preloadContent: true,
                onStepChanged: function (event, currentIndex, priorIndex) {
                    if (currentIndex === 2) {
                        $("#frm_sbm").removeClass("hidden");
                    }
                }
            });
            self.form.validate({
                rules: {
                    firstname: {
                        required: true
                    },
                    surname: {
                        required: true
                    },
                    phone: {
                        required: true
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
            self.form.on("click", ".proceed", function(e){
                e.preventDefault();
                self.container.steps("next");
            });
            self.form.on("click", ".return", function(e){
                e.preventDefault();
                self.container.steps("previous");
            });
        },
        validateForm: function(){
            var self   = this,
                errors = new Array(),
                stages = self.container.children("fieldset"),
                step   = null;
            self.form.validate().settings.ignore = ":disabled";
            if (!self.form.valid()) {
                $.map(stages, function(stage, i){
                    $.map(stages, function(stage, i){
                        var fields = $(stage).find(".required").not(":disabled");
                        $.map(fields, function(field){
                            if (!self.validateField(field, true)) {
                                if (!errors.length) {
                                    self.container.steps("goToStep", step);
                                    $(field).focus();
                                } errors.push($(field).attr("name"));
                            }
                        });
                    });
                });
            } if (errors.length) return false;
            return true;
        },
        validateField: function(field){
            var self  = this,
                iName = $(field).attr("name"),
                iType = $(field).attr("type"),
                iVal  = $(field).val(),
                rxEmail = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/,
                rxPhone = /^\+380([0-9]{9})$/,
                valid   = true;
            if (!iVal.length || (iVal.length && iName=="phone" && iVal.match(rxPhone)==null) || (iVal.length && iName=="phone" && iVal.match(rxPhone)==null)) valid = false;
            if (!valid) {
                $(field).addClass("error");
                return false;
            }
            $(field).removeClass("error");
            return true;
        },
        validateStage: function(stage){
            var self = this,
                btn    = $(stage).find(".proceed");
            self.form.validate().settings.ignore = ":disabled,:hidden";
            if (self.form.valid()) btn.removeClass("hidden");
            else btn.addClass("hidden");
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
                // call stage validation
                if ($(this).hasClass("required")) {
                    self.validateField(this);
                    self.validateStage($(this).closest("fieldset"));
                }
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
                    self.validateStage($(this).closest("fieldset"));
                });
            }
        }
    };
    this.init = function(){
        return Checkout;
    };
};