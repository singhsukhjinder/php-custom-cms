
<script type="text/javascript">
    pagePathName= window.location.pathname;
    console.log(pagePathName);
    Link = pagePathName.substring(pagePathName.lastIndexOf("/") + 1);

    $('#sidebar li').removeClass('active');
    $('#sidebar li a[href= "'+ Link +'"]').parent().addClass('active');
</script>