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
                    <a href="tel:+380960549540">096 0549540</a><br/>
                    <a href="tel:+380930549540">093 0549540</a><br/>
                    <a href="tel:+380990549540">099 0549540</a>
                </div>
                <p>�� ����� ������ <a href="mailto:<{$objSettingsInfo->siteEmail}>" target="_blank">�������� ���</a><br/>
                ��� �������� <a href="#" onclick="return Modal.open('<{include file="core/href.tpl" arCategory=$arrModules.callback}>');">�������� ������</a></p>
            </div>
        </div>
    </div>
</div>
<div class="bottom-container">
    <{include file='core/footer-links.tpl'}>
    <{include file='core/copyrights.tpl'}>
</div>