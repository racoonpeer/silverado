<div class="banner-container">
    <div class="container clearfix">
        <{include file="core/banners.tpl" position=1 maxitems=1}>
        <{include file="core/banners.tpl" position=2 maxitems=2}>
    </div>
</div>
<div class="main-container">
    <div class="container clearfix">
<{assign var=int value=0}>
<{foreach from=Selections::getColumns() key=colname item=coltitle}>
<{if isset($selections[$colname]) AND !empty($selections[$colname])}>
        <{include file="core/product-selections.tpl" arItems=$selections[$colname] title=$coltitle}>
<{*if !$int}>
        <div class="categories">
            <div class="category">
                <img src="/images/public/cat-1.png" alt=""/>
                <div class="blob">
                    ������
                    <div class="hr"></div>
                    <div class="price">�� 340 ���</div>
                </div>
                <a href="#" class="btn btn-warning btn-l"></a>
            </div>
            <div class="category">
                <img src="/images/public/cat-2.png" alt=""/>
                <div class="blob">
                    ���������
                    <div class="hr"></div>
                    <div class="price">�� 420 ���</div>
                </div>
                <a href="#" class="btn btn-warning btn-l"></a>
            </div>
            <div class="category">
                <img src="/images/public/cat-3.png" alt=""/>
                <div class="blob">
                    ������
                    <div class="hr"></div>
                    <div class="price">�� 290 ���</div>
                </div>
                <a href="#" class="btn btn-warning btn-l"></a>
            </div>
            <div class="category">
                <img src="/images/public/cat-4.png" alt=""/>
                <div class="blob">
                    ��������
                    <div class="hr"></div>
                    <div class="price">�� 399 ���</div>
                </div>
                <a href="#" class="btn btn-warning btn-l"></a>
            </div>
            <div class="category">
                <img src="/images/public/cat-5.png" alt=""/>
                <div class="blob">
                    ����������
                    <div class="hr"></div>
                    <div class="price">�� 50 ���</div>
                </div>
                <a href="#" class="btn btn-warning btn-l"></a>
            </div>
        </div>
<{/if*}>
    <{$int=($int+1)}>
<{/if}>
<{/foreach}>
    </div>
</div>