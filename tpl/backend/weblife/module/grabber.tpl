<div class="title">Grabber</div>
<div id="messages" class="info hidden_block"></div>
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="list">
    <tr>
        <td id="headb">Source</td>
        <td id="headb">Url</td>
        <td id="headb"></td>
    </tr>
<{foreach from=$sourceParamStack key=sourceID item=sourceParams}>
    <tr>
        <td width="120">&nbsp;&nbsp;<{$sourceParams.title}></td>
        <td>
            <form class="ajaxify" action="" method="POST">
                <input type="hidden" name="sourceID" value="<{$sourceID}>"/>
                <input type="text" name="sourceUrl" class="field" size="120" placeholder="Paste source url"/>
            </form>
        </td>
        <td align="center">
            <button class="buttons" onclick="$(this).closest('tr').find('form').submit();">Grab contents!</button>
        </td>
    </tr>
<{/foreach}>
</table>
<script type="text/javascript">
    $(function(){
        $(".ajaxify").ajaxForm({
            dataType: "json",
            success: function (json) {
                $("body").children(".preloader").remove();
                if (json.message) {
                    $("#messages").removeClass("hidden_block").text(json.message);
                }
            },
            beforeSubmit: function () {
                $("body").append("<div class=\"preloader\"></div>");
            }
        });
    });
</script>