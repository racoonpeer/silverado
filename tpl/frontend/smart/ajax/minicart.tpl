<div class="minicart" id="minicart">
    <button class="trigger<{if $Basket->getTotalAmount()>0}> active<{/if}>" onclick="Basket.open();" data-count="<{$Basket->getTotalAmount()}>" <{if $Basket->getTotalAmount()==0}>disabled<{/if}>></button>
    <span>
<{if $Basket->getTotalAmount()==0}>
        � �������<br/>
        ���� ��� �������
<{else}>
        � ������� <{$Basket->getTotalAmount()}> <{$HTMLHelper->getNumEnding($Basket->getTotalAmount(), array("�����", "������", "�������"))}> <br/>
        �� ����� <{$Basket->getTotalPrice()|number_format:0:'.':' '}> ���.
<{/if}>
    </span>
</div>