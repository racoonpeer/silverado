<div class="page-container container clearfix">
    <div class="error-page">
        <div class="code">4<span>0</span>4</div>
        <h1>�������� �� �������</h1>
        <p>�������� ��� ������� ��� ���� �������� ������ � ������.<br/>
            �������������� ������� ��� ���������<br/>
            �� <a href="/">������� ��������</a></p>
    </div>
<{assign var=viewed value=$HTMLHelper->getLastWatched($UrlWL)}>
<{if !empty($viewed)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$viewed title="������ ������� �� ������� ��������"}>
<{/if}>
</div>