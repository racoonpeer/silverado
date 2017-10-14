<{if !$IS_AJAX}>
<div class="comment-form hidden">
    <div class="h3">Оставьте отзыв или задайте вопрос</div>
<{/if}>
<{if $result AND $result=="success"}>
    <div class="f-result" id="commentResult">
        Спасибо за ваш отзыв!<br/>
        После прохождения модерации он будет опубликован на этой странице
        <script type="text/javascript">
            setTimeout(function(){
                var div  = document.getElementById("commentResult"),
                    form = document.getElementById("commentForm");
                Comments.toggleForm();
                $(form).removeClass("hidden");
                $(div).remove();
            }, 3000);
        </script>
    </div>
<{/if}>
    <form action="" method="POST" id="commentForm" class="<{if $result AND $result=="success"}>hidden<{/if}>">
        <label>Комментарий</label>
        <textarea name="descr" class="<{if isset($errors.descr)}>error<{/if}>"><{if isset($formData.descr)}><{$formData.descr}><{/if}></textarea>
        <label>Ваше имя</label>
        <input type="text" name="title" value="<{if isset($formData.title)}><{$formData.title}><{/if}>" class="<{if isset($errors.title)}>error<{/if}>"/>
        <label>Эл. почта</label>
        <input type="email" name="email" value="<{if isset($formData.email)}><{$formData.email}><{/if}>" class="<{if isset($errors.email)}>error<{/if}>"/>
        <button type="submit" class="btn btn-l btn-danger btn-com">Отправить отзыв</button>
        <div class="f-rating">
            <span></span>
            <input id="r5" type="radio" name="rating" value="5" <{if isset($formData.rating) AND $formData.rating==5}>checked<{/if}>>
            <label title="" for="r5"></label>
            <input id="r4" type="radio" name="rating" value="4" <{if isset($formData.rating) AND $formData.rating==4}>checked<{/if}>>
            <label title="" for="r4"></label>
            <input id="r3" type="radio" name="rating" value="3" <{if isset($formData.rating) AND $formData.rating==3}>checked<{/if}>>
            <label title="" for="r3"></label>
            <input id="r2" type="radio" name="rating" value="2" <{if isset($formData.rating) AND $formData.rating==2}>checked<{/if}>>
            <label title="" for="r2"></label>
            <input id="r1" type="radio" name="rating" value="1" <{if isset($formData.rating) AND $formData.rating==1}>checked<{/if}>>
            <label title="" for="r1"></label>
        </div>
        <input type="hidden" name="cid" value="<{if isset($formData.cid)}><{$formData.cid}><{else}>0<{/if}>"/>
        <input type="hidden" name="pid" value="<{$item.id}>"/>
        <input type="hidden" name="module" value="catalog"/>
        <input type="hidden" name="comment" value="1"/>
    </form>
<{if !$IS_AJAX}>
    <a href="#" class="f-close" onclick="Comments.toggleForm();">&times;</a>
</div>
<{/if}>