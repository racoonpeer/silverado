jQuery(function($){
	$.datepicker.regional['ru'] = {
		closeText: '�������',
		prevText: '',
		nextText: '',
		currentText: '�������',
		monthNames: ['������','�������','����','������','���','����','����','������','��������','�������','������','�������'],
		monthNamesShort: ['���','���','���','���','���','���','���','���','���','���','���','���'],
		dayNames: ['�����������','�����������','�������','�����','�������','�������','�������'],
		dayNamesShort: ['���','���','���','���','���','���','���'],
		dayNamesMin: ['��','��','��','��','��','��','��'],
		dateFormat: 'dd.mm.yy', 
		firstDay: 1,
		isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['ru']);
        
        
    /*    $.timepicker.regional['ru'] = {
                timeOnlyTitle: '�������� �����',
                timeText: '�����',
                hourText: '����',
                minuteText: '������',
                secondText: '�������',
                millisecText: '������������',
                timezoneText: '������� ����',
                currentText: '������',
                closeText: '�������',
                timeFormat: 'HH:mm',
                amNames: ['AM', 'A'],
                pmNames: ['PM', 'P'],
                isRTL: false
        };
        $.timepicker.setDefaults($.timepicker.regional['ru']);*/
});