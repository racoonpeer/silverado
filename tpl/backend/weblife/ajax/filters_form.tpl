<{*�������������*}>
<{if $type==1}>
<table border="1" cellspacing="0" cellpadding="1" class="list">       
    <tr>
        <td id="headb" align="left" width="175">
            <{$smarty.const.HEAD_TITLE}> <font style="color:red">*</font>
        </td>
        <td  >
            <input class="field" name="title" id="title" type="text" value="" />
        </td>
    </tr>
</table>
<{*����*}>
<{elseif $type==2}>

<{*���������*}>
<{elseif $type==3}>

<{*��������*}>
<{elseif $type==4}>
<table border="1" cellspacing="0" cellpadding="1" class="list">       
    <tr>
        <td id="headb" align="left" width="175">
            ��������:
        </td>
        <td >
            <input class="field" name="range[order]" type="text" value="" style="width: 32px;"/>
        </td>
        <td >
            <input class="field" name="range[title]" type="text" value="" style="width: 120px;"/>
        </td>
        <td >
            <input class="field" name="range[vmin]" type="text" value="" style="width: 32px;"/>&nbsp;
            <input class="field" name="range[vmax]" type="text" value="" style="width: 32px;"/>
        </td>
        <td >
            ��.���:&nbsp;&nbsp;&nbsp;
            <input class="field" name="range[unit]" type="text" value="" style="width: 32px;"/>
        </td>
    </tr>
</table>  
<{/if}>