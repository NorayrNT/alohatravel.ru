<div class="share_icons">
    <h6>{{__('share with friends')}}</h6>
    <a 
       data-type='facebook'
       href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" 
       target='_blank'>
       <i class="fab fa-facebook  wow zoomIn" data-wow-delay = '.5s'></i>
    </a>
    <a 
        data-type="vk"
        href="https://vk.com/share.php?url={{url()->current()}}" 
        target='_blank'><i class="fab fa-vk  wow zoomIn" 
        data-wow-delay='1.5s'></i>
    </a>
    <a 
        data-type='ok'
        href="https://www.ok.ru/share.php?url={{url()->current()}}" 
        target='_blank'>
        <i class="fab fa-odnoklassniki  wow zoomIn" data-wow-delay='2s'></i>
    </a>
</div>