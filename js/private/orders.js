/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var Orders = {
    orderID: null,
    init: function(orderID){
        var self = this;
        self.orderID = orderID;
    },
    sendConfirmation: function(){
        var self = this;
        $.ajax({
            url: window.location.href,
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
                itemID: self.orderID,
                task: "sendConfirm"
            },
            success: function(json) {
                if (json.messages) {
                    alert(implode(", ", json.messages));
                    console.log(json.messages);
                } else if (json.errors) {
                    alert(implode(", ", json.errors));
                    console.log(json.errors);
                }
            },
            beforeSend: function(){
                $("body").addClass("load");
            },
            complete: function(){
                $("body").removeClass("load");
            }
        });
    },
    updateOrder: function(link){
        var self     = this,
            option   = $(link).data('option'),
            optionID = $(link).closest('tr').find('select option:selected').val(),
            value    = $(link).closest('tr').find('textarea').val(),
            loader   = $(link).closest('table').prev('.loader');
        if ((typeof optionID != "undefined" && $(link).attr('data-'+option) != optionID) || 
           (option=='admin_comment' && value.length!=0 && window.confirm('Сохранить комментарий?')) ||
            option=='confirm' 
        ) {
            if ($(loader).length>0) {
                $(loader).css('width', $(loader).next('table').width());
                $(loader).css('height', $(loader).next('table').height());
                $(loader).find('img').css('margin-top', ($(loader).next('table').height()/2 - 10));
                $(loader).removeClass('hidden');
            }
            $.ajax({
                url: '/interactive/ajax.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    zone: 'admin',
                    action: 'editOrder',
                    orderID: self.orderID,
                    option: option,
                    optionID: optionID,
                    optionComment: value
                },
                success: function(json) {
                    if (json) {
                        if (json.option_title) $('#'+option).text(json.option_title);
                        if (json.history) $('#history').html(json.history);
                        $(link).closest('tr').find('select option:selected').removeAttr('selected');
                        $(link).closest('tr').find('select option[value="'+optionID+'"]').prop('selected', 'true');
                        if (option!='admin_comment' && option!='confirm') $(link).closest('tr').find('textarea').val('');
                        $(link).attr('data-'+option, optionID);
                        self.unsetDisabled($(link).closest('tr').find('select'));
                        if ($(loader).length>0) $(loader).addClass('hidden');
                    }
                }
            });
        }
    },
    unsetDisabled: function(item){
        var self   = this,
            option = $(item).closest('tr').find('a').data('option'),
            iVal   = $('option:selected', item).val();
        if (option != iVal) {
             $(item).closest('tr').find('textarea').prop('disabled', false);
             $(item).closest('tr').find('a').removeClass('disabled');
        } else {
             $(item).closest('tr').find('textarea').prop('disabled', true);
             $(item).closest('tr').find('a').addClass('disabled');
        }
    }
};
