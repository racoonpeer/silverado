<div class="footer-container">
    <div class="container clearfix">
        <{include file="ajax/subscribe.tpl"}>
        <div class="hr"></div>
        <div class="nav-bottom">
            <div class="pull-left nav">
                <{include file='menu/bottom.tpl' arItems=$bottomMenu break=6}>
            </div>
            <div class="pull-right schedule">
                <strong>�������� ��� ��������!</strong><br/>
                <em>� 8:00 �� 20:00</em>
                <div class="phones">
                    <a href="tel:+380973057697">097 30 57 697</a><br>
                    <a href="tel:+380956227572">095 62 27 572</a><br>
                    <a href="tel:+380638216588">063 82 16 588</a>
                </div>
                <p>�� ����� ������ <a href="mailto:<{$objSettingsInfo->siteEmail}>">�������� ���</a><br/>
                ��� �������� <a href="#" onclick="return Modal.open('<{include file="core/href.tpl" arCategory=$arrModules.callback}>');">�������� ������</a></p>
            </div>
        </div>
    </div>
</div>
<div class="bottom-container">
    <{*include file='core/footer-links.tpl'*}>
    <{include file='core/copyrights.tpl'}>
</div>